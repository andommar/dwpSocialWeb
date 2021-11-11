$(document).ready(function () {
  submitNewPostForm = function () {
    // Falta pasar userID dinámicamente con la sesion
    // $(document).on('click', '#new_post-submit-btn', function(e){
    // e.preventDefault();
    var option = "create_post";
    var userId = $("#userId").val();
    var title = $("#title").val();
    var description = $("#description").val();
    var category = $("#category").val();
    var imgfile = $("#imgfile").val();

    $.ajax({
      method: "POST",
      url: "controller/ViewsController.php",
      data: {
        option: option,
        userId: userId,
        title: title,
        description: description,
        category: category,
        imgfile: imgfile,
      },
    })
      .done(function (msg) {
        alert("petición a BBDD hecha");
      })
      .fail(function (jqXHR, textStatus, errorThrown) {
        if (console && console.log) {
          alert("ajax failed: " + textStatus);
        }
      });
    // });
  };

  // function submitNewPost(){
  // alert("culorro");
  // }
});
