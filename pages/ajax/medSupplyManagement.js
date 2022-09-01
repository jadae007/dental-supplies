$(document).ready(function () {
  $("#sideBarmedSupplyManagement").addClass(" active");
  listItems("all", "all");
  showSelectGroup();
  showSelectType("all");
  showModalSelectGroup();
  showModalSelectType();
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

  $("#modalSelectGroup").change(function (e) {
    e.preventDefault();
    showModalSelectType(e.currentTarget.value)
  });

  $("#form").submit(function (e) {
    e.preventDefault();
    e.currentTarget.submit.value === "add" ? addSupply() : editSupply();
  });
});

const listItems = (group, type) => {
  $.ajax({
    type: "GET",
    url: "query/listItem",
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
          let active = Number(element.itemActive) ==1 ? `<span class="badge badge-success" onclick="updateActive('${element.id}','${element.itemActive}')" style="cursor:pointer">Active</span>` : `<span class="badge badge-danger"  onclick="updateActive('${element.id}','${element.itemActive}')"  style="cursor:pointer">Disabled</span>`;
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
          <td data-order="${element.itemActive}">${active}</td>
          <td><button type="button" class="btn btn-warning" onclick="openModalEdit('${
            element.id
          }')">แก้ไข</button></td>
        </tr>
        `;
        });
      }
      $("#tbody").append(html);
      $("#supplyTable").DataTable();
    },
  });
};

const updateActive = (id, status) => {
  let active = Number(status) ? 0 : 1 ;
  let group = $("#groupSelect").val();
  let type = $("#typeSelect").val();
  $.ajax({
    type: "POST",
    url: "query/updateActiveItem",
    data: {
      id,
      active
    },
    success: function (response) {
      const { status, message } = JSON.parse(response);
      if (!status)
        return  tata.error("Update Failed.", message, configTata);
      tata.success("Update successfully.", message, configTata);
      listItems(group,type)
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

const openModalAdd = () => {
  $("#form")[0].reset();
  $("#submit").val("add");
  $("#medSupplyManagementModalLabel").text("เพิ่มเวชภัณฑ์");
  $("#medSupplyManagementModal").modal("show");
};

const closeModal = () => {
  $("#medSupplyManagementModal").modal("hide");
  $("#typeName").val("");
  $("#typeId").val(null);
};

const addSupply = () => {
  let form = $("#form")[0];
  let data = new FormData(form);
  let group = $("#groupSelect").val()
  let type = $("#typeSelect").val()
  $.ajax({
    type: "POST",
    enctype: "multipart/form-data",
    url: "query/addSupply",
    data,
    processData: false,
    contentType: false,
    cache: false,
    success: function (response) {
      const { status, message } = JSON.parse(response);
      if (!status) return tata.error("Add Failed.", message, configTata);
      tata.success("Add successfully.", message, configTata);
      closeModal();
      listItems(`${group}`,`${type}`);
    },
  });
};

const editSupply = (id) => {
  console.log("edit");
};

const openModalEdit = (id) => {
  $("#form")[0].reset();
  $.ajax({
    type: "GET",
    url: "query/showSupplyDetail",
    data: {
      id,
    },
    success: function (response) {
      const {
        id,
        productBarcode,
        itemName,
        typeId,
        groupId,
        itemBrand,
        itemDetail,
        sellerCompany,
        unitCount,
        price,
        lowerLimit,
        upperLimit,
        storageLocation,
        amount,
        expireDate,
        expireNotice,
        itemActive
      } = JSON.parse(response);
      $("#submit").val("edit");
      $("#supplyId").val(id);
      $("#medSupplyManagementModalLabel").text("แก้ไขเวชภัณฑ์");
      $("#productBarcode").val(productBarcode);
      $("#itemName").val(itemName);
      $("#itemDetail").val(itemDetail);
      $("#itemBrand").val(itemBrand);
      $("#sellerCompany").val(sellerCompany);
      $("#unitCount").val(unitCount);
      $("#price").val(price);
      $("#lowerLimit").val(lowerLimit);
      $("#upperLimit").val(upperLimit);
      $("#storageLocation").val(storageLocation);
      $("#amount").val(amount);
      $("#expireDate").val(expireDate);
      $("#expireNotice").val(expireNotice);
      $(`#modalSelectGroup option[value='${groupId}']`).prop("selected", true);
      $(`#modalSelectType option[value='${typeId}']`).prop("selected", true);
      $("#medSupplyManagementModal").modal("show");
    },
  });
};

const showModalSelectGroup = () => {
  $.ajax({
    type: "GET",
    url: "query/listGroups",
    data: {
      dropdown: "yes",
    },
    success: function (response) {
      let html = ``;
      const { groupObj } = JSON.parse(response);
      groupObj.forEach((element) => {
        html += `<option value="${element.id}">${element.groupName}</option>`;
      });
      $("#modalSelectGroup").append(html);
    },
  });
};

const showModalSelectType = (groupId) => {
  $.ajax({
    type: "GET",
    url: "query/listType",
    data: {
      group: groupId,
    },
    success: function (response) {
      $("#modalSelectType").prop("disabled", false);
      const { typeObj } = JSON.parse(response);
      let html = '<option value="">None</option>';
      $("#modalSelectType").children().remove();
      if (!!typeObj) {
        typeObj.forEach((element) => {
          html += ` <option value="${element.typeId}">${element.typeName}</option>`;
        });
      }
      $("#modalSelectType").append(html);
    },
  });
};