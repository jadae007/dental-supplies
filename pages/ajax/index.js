$(document).ready(function () {
  const configTata = {
    position: "tr",
    progress: true,
    duration: 3000,
  };
  $("#loginFrom").submit(function (e) {
    e.preventDefault();
    let data = new FormData(e.target);
    $.ajax({
      type: "POST",
      enctype: "multipart/form-data",
      url: "query/auth/login",
      data: data,
      processData: false,
      contentType: false,
      cache: false,
      success: function (response) {
        const { status, message } = JSON.parse(response);
        if (status) return (window.location.href = "main");
        tata.error("Sign in failed", message, configTata);
      },
    });
  });
});
