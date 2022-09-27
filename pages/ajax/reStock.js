
$(document).ready(function () {
  $("#sideBarreStock").addClass(" active");
  listItems("all", "all");
  showSelectGroup();
  showSelectType("all");
  $("#groupSelect").change(function (e) {
    e.preventDefault();
    showSelectType(e.currentTarget.value);
    listItems(e.currentTarget.value, "all");
  });

  $("#typeSelect").change(function (e) {
    e.preventDefault();
    let groupId = $("#groupSelect").val();
    listItems(groupId, e.currentTarget.value);
  });
  $('#restockModal').on('shown.bs.modal', function () {
    $(this).find('#quantity').focus();
  })  
  $("#restockForm").submit(function (e) { 
    e.preventDefault();
    let form = $("#restockForm")[0];
    let userId = $("#navUserId").val()
    let data = new FormData(form);
    let group = $("#groupSelect").val()
    let type = $("#typeSelect").val()
    data.append('userId', userId)
    $.ajax({
      type: "POST",
      enctype: "multipart/form-data",
      url: "query/reStock",
      data,
      processData: false,
      contentType: false,
      cache: false,
      success: function (response) {
        const { status, message } = JSON.parse(response);
        if (!status) return tata.error("Restock Failed.", message, configTata);
        tata.success("Restock successfully.", message, configTata);
        listItems(`${group}`,`${type}`);
        $("#restockModal").modal('hide');
      }
    });
  });
});


const listItems = (group, type) => {
  $.ajax({
    type: "GET",
    url: "query/listActiveItems",
    data: {
      group,
      type,
    },
    success: function (response) {
      $("#supplyTable").DataTable().destroy();
      $("#tbody").children().remove();
      const { itemsObj } = JSON.parse(response);
      console.log(itemsObj)
      let html = ``;
      if (!!itemsObj) {
        itemsObj.forEach((element, index) => {
          html += `
        <tr>
          <th scope="row">${++index}</th>
          <td>${element.itemName}</td>
          <td>${element.groupName}</td>
          <td>${element.typeName}</td>
          <td>${element.unitCount}</td>
          <td>${Number(element.amount)}</td>
          <td>${Number(element.price)}</td>
          <td data-order="${moment(element.expireDate).unix()}">${moment(element.expireDate).format('LL')}</td>
          <td class="text-center"><button type="button" class="btn btn-success" onclick="openModalRestock('${element.id}','${element.itemName}','${element.amount}')"><i class="fas fa-plus"></i></button></td>
        </tr>
        `;
        });
      }
      $("#tbody").append(html);
      $("#supplyTable").DataTable();
    },
  });
};

const showSelectGroup = () => {
  $.ajax({
    type: "GET",
    url: "query/listGroups",
    data: {
      dropdown: "yes",
    },
    success: function (response) {
      let html = `<option value="all">ทั้งหมด</option>`;
      const { groupObj } = JSON.parse(response);
      groupObj.forEach((element) => {
        html += `<option value="${element.id}">${element.groupName}</option>`;
      });
      $("#groupSelect").append(html);
    },
  });
};

const showSelectType = (groupId) => {
  $.ajax({
    type: "GET",
    url: "query/listType",
    data: {
      group: groupId,
    },
    success: function (response) {
      $("#typeSelect").prop("disabled", false);
      const { typeObj } = JSON.parse(response);
      let html = `<option value="all">ทั้งหมด</option>`;
      $("#typeSelect").children().remove();
      if (!!typeObj) {
        typeObj.forEach((element) => {
          html += ` <option value="${element.typeId}">${element.typeName}</option>`;
        });
      } else {
        $("#typeSelect").prop("disabled", true);
      }
      $("#typeSelect").append(html);
    },
  });
};

const openModalRestock = (id,name,currentAmount) =>{
console.log(id,name,currentAmount);
$("#modalItemName").text(name)
$("#modalCurrentAmount").text(currentAmount)
$("#modalItemId").val(id)
$("#quantity").val("")
$("#restockModal").modal('show');
}