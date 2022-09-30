$(document).ready(function () {
  const orderId = $("#orderId").val();
  $("#cardHeader").text(`รายละเอียดการเบิก #${orderId}`);
  listDetail(orderId)
});

const listDetail = (id) =>{
  $("#detailTable").DataTable().destroy();
$.ajax({
  type: "GET",
  url: "query/orderDetail",
  data: {
    orderId:id
  },
  success: function (response) {
    const { detailObj } = JSON.parse(response)
    if(detailObj){
    detailObj.forEach((element,index) => {
      $("#tbody").append(`
      <tr>
      <th scope="row">${++index}</th>
      <td>${element.itemName}</td>
      <td>${element.quantity}</td>
    </tr>
      `)
    });
  }
    $("#detailTable").DataTable();
  }
});
}