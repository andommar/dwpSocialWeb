$(document).ready(function () {
  submitNewPostForm = function () {
    resetErrorMessages();
    // $(document).on('click', '#new_post-submit-btn', function(e){
    // e.preventDefault();
    //Files can be sent through AJAX using the FormData object.
    //The AJAX call must specify contentType and psrocessdata otherwise it won't work.
    let mydata = $("#new-post-form")[0];
    let formData = new FormData(mydata);
    formData.append("option", "new_post_form");
    console.log(formData);
    console.log(mydata);

    $.ajax({
      method: "POST",
      url: "controller/ViewsController.php",
      contentType: false, // to tell jQuery to not set any content type header.
      processData: false, //  to send a DOMDocument, or other non-processed data it has to be set to false
      data: formData,
      dataType: "json",
    })
      .done(function (data) {
        console.log(data);

        if (!data.success) {
          if (data.errors.title) {
            $("#title-error").text(data.errors.title);
          }
          if (data.errors.category) {
            $("#category-error").text(data.errors.category);
          }
          if (data.errors.description) {
            $("#description-error").text(data.errors.description);
          }
          if (data.errors.image) {
            $("#image-error").text(data.errors.image);
          }
        } else {
          $("#error-msg").text("New post successfuly created");
        }
      })
      .fail(function (jqXHR, textStatus, errorThrown) {
        if (console && console.log) {
          alert("ajax failed: " + textStatus);
        }
      });
    // });
  };

  function resetErrorMessages() {
    $("#title-error").text("");
    $("#category-error").text("");
    $("#description-error").text("");
    $("#image-error").text("");
  }
});
