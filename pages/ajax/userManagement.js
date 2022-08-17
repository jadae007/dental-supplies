$(document).ready(function () {
  $("#sideBarUserManagement").addClass(" active");
  const myRole = $("#myRole").val();
  listUsers(myRole);

  $("#form").submit(function (e) {
    e.preventDefault();
    e.currentTarget.submit.value === "add" ? addUser() : editUser();
  });
});

const listUsers = (role) => {
  $.ajax({
    type: "GET",
    url: "query/listUser",
    data: {
      role,
    },
    success: function (response) {
      const { usersObj } = JSON.parse(response);
      $("#usersTable").DataTable().destroy();
      $("#tbody").children().remove();
      if (usersObj) {
        let html = ``;
        usersObj.forEach((element, index) => {
          if (element.role == 0) {
            element.role = "Administrator";
          } else if (element.role == 1) {
            element.role = "Admin";
          } else {
            element.role = "User";
          }
          html += `<tr>
          <th scope="row">${++index}</th>
          <td>${element.username}</td>
          <td>${element.firstName} ${element.lastName}</td>
          <td>${element.email}</td>
          <td>${element.role}</td>
          <td>`;
          if (element.active == 1) {
            html += `<span class="badge badge-success" onclick="updateActive('${element.id}','${element.active}')" style="cursor:pointer">Active</span>`;
          } else {
            html += `<span class="badge badge-danger" onclick="updateActive('${element.id}','${element.active}')" style="cursor:pointer">Disable</span>`;
          }
          html += `</td>
          <td>
          <button type="button" class="btn btn-info mb-2" onclick="openModalEdit('${element.id}')">แก้ไข</button>
          <button type="button" class="btn btn-warning mb-2" onclick="resetPassword('${element.id}','${element.username}')">Reset</button>
          </td>
        </tr>`;
        });
        $("#tbody").append(html);
      }
      $("#usersTable").DataTable();
    },
  });
};

const updateActive = (id, status) => {
  let active = Number(status) ? 0 : 1;
  $.ajax({
    type: "POST",
    url: "query/updateActiveUser",
    data: {
      id,
      active
    },
    success: function (response) {
      const { status, message } = JSON.parse(response);
      if (!status)
        return  tata.error("Update Failed.", message, configTata);
      tata.success("Update successfully.", message, configTata);
      listUsers(myRole.value);
    },
  });
};

const openModalAdd = () => {
  $("#form")[0].reset();
  $("#submit").val("add");
  $("#userManagementModalLabel").text("เพิ่มผู้ใช้งาน");
  $("#userManagementModal").modal("show");
};
const openModalEdit = (id) => {
  $("#form")[0].reset();
  $("#userId").val(id);
  $("#submit").val("edit");
  $("#userManagementModalLabel").text("แก้ไขผู้ใช้งาน");
  $("#divForAdd").hide();
  $.ajax({
    type: "GET",
    url: "query/showUserDetail",
    data: {
      id,
    },
    success: function (response) {
      const { id, username, firstName, lastName, email, role } =
        JSON.parse(response);
      $("#username").val(username);
      $("#email").val(email);
      $("#firstname").val(firstName);
      $("#lastname").val(lastName);
      $(`#role option[value='${role}']`).prop("selected", true);
      $("#userManagementModal").modal("show");
    },
  });
};

const closeModal = () => {
  $("#userManagementModal").modal("hide");
};

const addUser = () => {
  let form = $("#form")[0];
  let data = new FormData(form);
  $.ajax({
    type: "POST",
    enctype: "multipart/form-data",
    url: "query/addUser",
    data,
    processData: false,
    contentType: false,
    cache: false,
    success: function (response) {
      const { status, message } = JSON.parse(response);
      if (!status) return tata.error("Add Failed.", message, configTata);
      tata.success("Add successfully.", message, configTata);
      closeModal();
      listUsers(myRole.value);
    },
  });
};

const editUser = () => {
  let form = $("#form")[0];
  let data = new FormData(form);
  $.ajax({
    type: "POST",
    enctype: "multipart/form-data",
    url: "query/editUser",
    data,
    processData: false,
    contentType: false,
    cache: false,
    success: function (response) {
      const { status, message } = JSON.parse(response);
      if (!status) return tata.error("Edit Failed.", message, configTata);
      tata.success("Edit successfully.", message, configTata);
      closeModal();
      listUsers(myRole.value);
    },
  });
};

const resetPassword = (id, username) => {
  SoloAlert.confirm({
    title: "Sure??",
    body: `คุณต้องการรีเซ็ตรหัสผ่านของ ${username} หรือไม่?`,
    theme: "dark",
    useTransparency: true,
    onOk: () => {
      $.ajax({
        type: "POST",
        url: "query/resetPassword",
        data: {
          id,
        },
        success: function (response) {
          const { status, message } = JSON.parse(response);
          if (!status)
            return tata.error("ResetPassword Failed.", message, configTata);
          tata.success("ResetPassword successfully.", message, configTata);
        },
      });
    },
  });
};
