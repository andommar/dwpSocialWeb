$(document).ready(function () {
  submitNewComment = function (event) {
    alert("Hola");
    var formData = {
      formtype: "comment",
      description: $("#description").val(),
      image: $("#imgupload").val(),
    };
    console.log(formData);
    $.ajax({
      method: "POST",
      url: "controller/ViewsController.php",
      data: formData,
      dataType: "json",
      enconde: true,
    })
      .done(function (data) {
        console.log(data);
      })
      // .fail(function () {
      //   console.log("Ajax failed");
      // });
      .fail(function (jqXHR, textStatus, errorThrown) {
        console.log(textStatus);
      });
  };
});
