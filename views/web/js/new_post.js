$(document).ready(function () {
  submitNewPostForm = function () {

    var frontValidationOk = true;
    resetErrorMessages();
    // $(document).on('click', '#new_post-submit-btn', function(e){
    // e.preventDefault();
    //Files can be sent through AJAX using the FormData object.
    //The AJAX call must specify contentType and psrocessdata otherwise it won't work.
    let mydata = $("#new-post-form")[0];
    let formData = new FormData(mydata);
    formData.append("option", "new_post_form");

    if(isEmptyOrSpaces(formData.get('title'))){
      $("#title-error").text('Title cannot be empty');
      frontValidationOk=false;
    }
    else if(formData.get('title').length<4){
      $("#title-error").text('Title must have at least 4 characters');
      frontValidationOk=false;
    }
    else if(formData.get('category')=="Category"){
      $("#category-error").text('Category cannot be empty');
      frontValidationOk=false;
    }
    else if(isEmptyOrSpaces(formData.get('description'))){
      $("#description-error").text('Description cannot be empty');
      frontValidationOk=false;
    }
    else if(formData.get('description').length<4){
      $("#description-error").text('Description must have at least 4 characters');
      frontValidationOk=false;
    }

    if(frontValidationOk){
      $.ajax({
        method: "POST",
        url: "controller/ViewsController.php",
        contentType: false, // to tell jQuery to not set any content type header.
        processData: false, //  to send a DOMDocument, or other non-processed data it has to be set to false
        data: formData,
        dataType: "json",
      })
        .done(function (data) {
          if (!data.success) {
            if (data.errors.title) {
              $("#title-error").text(data.errors.title);
            }
            else if (data.errors.category) {
              $("#category-error").text(data.errors.category);
            }
            else if (data.errors.description) {
              $("#description-error").text(data.errors.description);
            }
            else if (data.errors.image) {
              $("#image-error").text(data.errors.image);
            }
          } else {
            location.reload();
          }
        })
        .fail(function (jqXHR, textStatus, errorThrown) {
          if (console && console.log) {
            alert("ajax failed: " + textStatus);
          }
        });
     }
  };

  function resetErrorMessages() {
    $("#title-error").text("");
    $("#category-error").text("");
    $("#description-error").text("");
    $("#image-error").text("");
  }
});
