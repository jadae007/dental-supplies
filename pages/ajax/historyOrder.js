$(document).ready(function() {
  $("#sideBaristoryOrder").addClass(" active");
  $("#startDate").val(moment().startOf('month').format('YYYY-MM-DD'))
  $("#endDate").val(moment().endOf('month').format('YYYY-MM-DD'))
  let startDate = $("#startDate").val()
  let endDate = $("#endDate").val()
  listHistoryOrder(startDate,endDate)

  $("#changeDate").click(function (e) { 
    e.preventDefault();
    let startDate = $("#startDate").val()
    let endDate = $("#endDate").val()
    listHistoryOrder(startDate,endDate)
    
  });
});

const listHistoryOrder = (startDate,endDate) =>{
  $("#historyTable").DataTable().destroy();
  $("#tbody").children().remove()
$.ajax({
  type: "GET",
  url: "query/listTableHistoryOrder",
  data: {
    startDate,
    endDate
  },
  success: function (response) {
    const { historyObj } = JSON.parse(response)
    const html = historyObj.map((element)=>{
      return(
        `
        <tr style="cursor:pointer" onclick="showDetail('${element.orderId}')">
          <th scope="row">${element.orderId}</th>
          <td>${element.firstName}</td>
          <td>${element.lastName}</td>
          <td>${element.itemCount}</td>
          <td data-order="${moment(element.orderDate).unix()}">${moment(element.orderDate).format('LL')}</td>
        </tr>
        `
      )
    })
    $("#tbody").append(html)
    $("#historyTable").DataTable();
  }
});
}

const showDetail =(orderId) =>{
window.location.href= `orderDetail?orderId=${orderId}`
}