$(document).ready(function () {
  $("#sideBarOrder").addClass(" active");
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
      let html = ``;
      if(!!itemsObj){
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
          <td>${element.expireDate}</td>
          <td><button type="button" class="btn btn-warning">แก้ไข</button></td>
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
