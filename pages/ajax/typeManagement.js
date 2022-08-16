$(document).ready(function () {
  $("#sideBarTypeManagement").addClass(" active");
  listSelectGroup();
  listType("all");

  $("#groupSelect").change(function (e) {
    e.preventDefault();
    listType(e.currentTarget.value);
  });
  $("#from").submit(function (e) {
    e.preventDefault();
    e.currentTarget.submit.value === "add" ? addType() : editType();
  });
});

const listSelectGroup = () => {
  $.ajax({
    type: "GET",
    url: "query/listGroups",
    data: {
      dropdown: "yes",
    },
    success: function (response) {
      const { groupObj } = JSON.parse(response);
      let html = `<option value="all">ทั้งหมด</option>`;
      if (!!groupObj) {
        groupObj.forEach((element) => {
          html += `<option value="${element.id}">${element.groupName}</option>`;
        });
      }
      $("#groupSelect").append(html);
    },
  });
};
const listModalSelectGroup = (groupId) => {
  $.ajax({
    type: "GET",
    url: "query/listGroups",
    data: {
      dropdown: "yes",
    },
    success: function (response) {
      const { groupObj } = JSON.parse(response);
      $("#modalSelectGroup").children().remove();
      let html = ``;
      if (!!groupObj) {
        groupObj.forEach((element) => {
          html += `<option value="${element.id}" `;
          if (groupId != "add") {
            if (groupId == element.id) {
              html += `selected`;
            }
          }
          html += `>${element.groupName}</option>`;
        });
      }
      $("#modalSelectGroup").append(html);
    },
  });
};

const listType = (group) => {
  $.ajax({
    type: "GET",
    url: "query/listType",
    data: {
      group,
    },
    success: function (response) {
      const { typeObj } = JSON.parse(response);
      $("#tableType").DataTable().destroy();
      $("#tbody").children().remove();
      let html = ``;
      if (typeObj) {
        typeObj.forEach((element, index) => {
          html += `
         <tr>
         <th scope="row">${++index}</th>
         <td>${element.groupName}</td>
         <td>${element.typeName}</td>
         <td data-order="${element.typeActive}">
         <div class="custom-control custom-switch">
         <input type="checkbox" class="custom-control-input" id="activeSwitch${
           element.typeId
         }"
     `;
          html += element.typeActive === "1" ? "checked" : "";
          html += `
    >
         <label class="custom-control-label" for="activeSwitch${element.typeId}"> </label>
       </div>
     </td>
     <td><button type="button" class="btn btn-warning" onclick="openModalEdit('${element.typeId}')">แก้ไข</button></td>
   </tr>
    `;
        });
      } else {
      }
      $("tbody").append(html);
      $("#tableType").DataTable();
      $(".custom-control-input").change(function (e) {
        e.preventDefault();
        updateActiveType(
          e.currentTarget.id.split("activeSwitch")[1],
          this.checked ? true : false
        );
      });
    },
  });
};

const updateActiveType = (id, active) => {
  $.ajax({
    type: "POST",
    url: "query/updateActiveType",
    data: {
      id,
      status: active,
    },
    success: function (response) {
      const { status, message } = JSON.parse(response);
      if (status)
        return tata.success("Update successfully.", message, configTata);
      tata.error("Update Failed.", message, configTata);
      $(`#activeSwitch${id}`).prop("checked", !active);
    },
  });
};

const openModalEdit = (id) => {
  $("#from")[0].reset();
  $.ajax({
    type: "GET",
    url: "query/showTypeDetail",
    data: {
      id,
    },
    success: function (response) {
      const { id, typeName, groupId } = JSON.parse(response);
      $("#submit").val("edit");
      $("#typeId").val(id);
      $("#typeManagementModalLabel").text("แก้ไขประเภทเวชภัณฑ์");
      $("#typeName").val(typeName);
      $("#typeManagementModal").modal("show");
      listModalSelectGroup(groupId);
    },
  });
};

const closeModal = () => {
  $("#typeManagementModal").modal("hide");
  $("#typeName").val("");
  $("#typeId").val(null);
};

const openModalAdd = () => {
  $("#from")[0].reset();
  $("#submit").val("add");
  $("#typeManagementModalLabel").text("เพิ่มกลุ่มเวชภัณฑ์");
  $("#typeManagementModal").modal("show");
  listModalSelectGroup("add");
};

const addType = () => {
  let form = $("#from")[0];
  let data = new FormData(form);
  $.ajax({
    type: "POST",
    enctype: "multipart/form-data",
    url: "query/addType",
    data,
    processData: false,
    contentType: false,
    cache: false,
    success: function (response) {
      const { status, message } = JSON.parse(response);
      if (!status) return tata.error("Add Failed.", message, configTata);
      tata.success("Add successfully.", message, configTata);
      closeModal();
      listType("all");
    },
  });
};

const editType = () => {
  let form = $("#from")[0];
  let data = new FormData(form);
  $.ajax({
    type: "POST",
    enctype: "multipart/form-data",
    url: "query/editType",
    data,
    processData: false,
    contentType: false,
    cache: false,
    success: function (response) {
      const { status, message } = JSON.parse(response);
      if (!status) return tata.error("Edit Failed.", message, configTata);
      tata.success("Edit successfully.", message, configTata);
      closeModal();
      listType("all");
    },
  });
};