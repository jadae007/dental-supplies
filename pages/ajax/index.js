$(document).ready(function () {
  const configTata = {
    position: 'tr',
    progress: true,
    duration:2000,
  }
  $("#loginFrom").submit(function (e) { 
    e.preventDefault();
    let data = new FormData(e.target)
    $.ajax({
      type: "POST",
      enctype:"multipart/form-data",
      url: "query/auth/login",
      data: data,
      processData: false,
      contentType: false,
      cache: false,
      success: function (response) {
      const { loginObj } = JSON.parse(response)
      if(!!loginObj.status) return window.location.href = 'main'
      tata.error('Sign in failed', loginObj.message, configTata)
      }
    });
  });
});