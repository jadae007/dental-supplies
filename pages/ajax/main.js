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

$("#quantity").keyup(function (e) {
  let maxQuantity = Number($("#maxQuantity").val());
  if (Number(e.currentTarget.value) > maxQuantity ) return $("#quantity").addClass("is-invalid")
  $("#quantity").removeClass("is-invalid")
});

  $("#btnAddCart").click(function (e) {
    e.preventDefault();
    let id = $("#idCart").val();
    let quantity = $("#quantity").val();
    let itemName = $("#itemName").val();
    let maxQuantity = Number($("#maxQuantity").val());
    let userId = $("#navUserId").val()
    if(maxQuantity >= quantity && quantity > 0){
      let cartObj = {
        id,
        itemName,
        quantity,
        userId,
      };
      addToCart(cartObj);
    }else{
      $("#quantity").addClass("is-invalid")
    }

  });
});

const addToCart = (cartObj) => {
  let id = cartObj.id;
  let cart = sessionStorage.getItem("cart") ? JSON.parse(sessionStorage.getItem("cart")) : null;
  if (cart) {
    if (cart.some((x) => x.id == cartObj.id)) {
      let arrFilter = cart.filter(function (cart) {
        return cart.id !== id;
      });
      arrFilter.push(cartObj);
      saveCart(arrFilter);
    } else {
      cart.push(cartObj);
      saveCart(cart);
    }
  } else {
    cart = [];
    cart.push(cartObj);
    saveCart(cart);
  }
  countCart()
  $("#addModal").modal("hide");
};

const saveCart = (cart) => {
  sessionStorage.setItem("cart", JSON.stringify(cart));
};

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
      if (!!itemsObj) {
        itemsObj.forEach((element, index) => {
          html += `
        <tr>
          <th scope="row">${++index}</th>
          <td>${element.itemName}</td>
          <td style="display: none ;">${element.productBarcode}</td>
          <td>${element.groupName}</td>
          <td>${element.typeName}</td>
          <td>${element.unitCount}</td>
          <td>${Number(element.amount)}</td>
          <td>${Number(element.price)}</td>
          <td data-order="${moment(element.expireDate).unix()}" style="minwidth:90px">${moment(element.expireDate).format('LL')}</td>
          <td class="text-center"><button type="button" class="btn btn-warning" onclick="openModalAdd('${
            element.id
          }','${element.itemName}','${element.amount}')"><i class="fas fa-cart-arrow-down"></i></button></td>
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
const openModalAdd = (id,itemName,maxQuantity) => {
  $("#quantity").val("");
  $("#itemName").val(itemName);
  $("#maxQuantity").val(maxQuantity);
  $("#idCart").val(id);
  $("#quantity").removeClass("is-invalid")
  $("#addModal").modal("show");
};
