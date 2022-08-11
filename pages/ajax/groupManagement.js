$(document).ready(function () {
  $("#sideBarGroupManagement").addClass(" active");
  listGroup();

  $("#from").submit(function (e) {
    e.preventDefault();
    e.currentTarget.submit.value === "add" ? addGroup() : editGroup();
  });
});

const closeModal = () => {
  $("#groupManagementModal").modal("hide");
  $("#startLetter").prop("readonly", false);
  $("#groupName").val("");
  $("#startLetter").val("");
  $("#groupId").val(null);
};

const listGroup = () => {
  $.ajax({
    type: "GET",
    url: "query/listGroups",
    success: function (response) {
      const { groupObj } = JSON.parse(response);
      $("#tableGroup").DataTable().destroy();
      $("#tbody").children().remove();
      let html = ``;
      groupObj.forEach((element, index) => {
        html += `
        <tr>
          <th scope="row">${++index}</th>
          <td>${element.groupName}</td>
          <td>${element.startLetter}</td>
          <td data-order="${element.active}">
            <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="activeSwitch${
              element.id
            }"
        `;
        html += element.active === "1" ? "checked" : "";
        html += `
       >
            <label class="custom-control-label" for="activeSwitch${element.id}"> </label>
          </div>
        </td>
        <td><button type="button" class="btn btn-warning" onclick="openModalEdit('${element.id}')">แก้ไข</button></td>
      </tr>
       `;
      });
      $("#tbody").append(html);
      $(".custom-control-input").change(function (e) {
        e.preventDefault();
        updateActiveGroup(
          e.currentTarget.id.split("activeSwitch")[1],
          this.checked ? true : false
        );
      });
      $("#tableGroup").DataTable();
    },
  });
};

const updateActiveGroup = (id, active) => {
  $.ajax({
    type: "POST",
    url: "query/updateActiveGroup",
    data: {
      id,
      status: active,
    },
    success: function (response) {
      const { status, message } = JSON.parse(response);
      if (status)
        return tata.success("Updated successfully.", message, configTata);
      tata.error("Update Failed.", message, configTata);
      $(`#activeSwitch${id}`).prop("checked", !active);
    },
  });
};
const openModalAdd = () => {
  $("#submit").val("add");
  $("#groupManagementModalLabel").text("เพิ่มกลุ่มเวชภัณฑ์");
  $("#groupManagementModal").modal("show");
};
const openModalEdit = (id) => {
  $.ajax({
    type: "GET",
    url: "query/showGroupDetail",
    data: {
      id,
    },
    success: function (response) {
      const { id, groupName, startLetter } = JSON.parse(response);
      $("#startLetter").val(`${startLetter}`);
      $("#groupName").val(groupName);
      $("#groupId").val(id);
      $("#submit").val("edit");
      $("#groupManagementModalLabel").text("แก้ไขกลุ่มเวชภัณฑ์");
      $("#startLetter").prop("readonly", true);
      $("#groupManagementModal").modal("show");
    },
  });
};

const addGroup = () => {
  let form = $("#from")[0];
  let data = new FormData(form);
  $.ajax({
    type: "POST",
    enctype: "multipart/form-data",
    url: "query/addGroup",
    data,
    processData: false,
    contentType: false,
    cache: false,
    success: function (response) {
      const { status, message } = JSON.parse(response);
      if (!status) return tata.error("Add Failed.", message, configTata);
      tata.success("Add successfully.", message, configTata);
      closeModal();
      listGroup();
    },
  });
};

const editGroup = () => {
  let form = $("#from")[0];
  let data = new FormData(form);
  $.ajax({
    type: "POST",
    enctype: "multipart/form-data",
    url: "query/editGroup",
    data,
    processData: false,
    contentType: false,
    cache: false,
    success: function (response) {
      const { status, message } = JSON.parse(response);
      if (!status) return tata.error("Edit Failed.", message, configTata);
      tata.success("Edit successfully.", message, configTata);
      closeModal();
      listGroup();
    },
  });
};
