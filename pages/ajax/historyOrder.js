$(document).ready(function() {
  $("#startDate").val(moment().startOf('month').format('YYYY-MM-DD'))
  $("#endDate").val(moment().endOf('month').format('YYYY-MM-DD'))
  let startDate = $("#startDate").val()
  let endDate = $("#endDate").val()
  listHistoryOrder(startDate,endDate)
});

const listHistoryOrder = (startDate,endDate) =>{
$.ajax({
  type: "GET",
  url: "query/listTableHistoryOrder",
  data: {
    startDate,
    endDate
  },
  success: function (response) {
    const { historyObj } = JSON.parse(response)
    console.log(historyObj)
    const html = historyObj.map((element)=>{
      return(
        `
        <tr style="cursor:pointer" onclick="">
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