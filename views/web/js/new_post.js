$(document).ready(function () {
  submitNewPostForm = function () {
    hideGeneralMessage();   // Hides general messages div every time the function is launched
    var frontValidationOk = true;
    resetErrorMessages();
    // $(document).on('click', '#new_post-submit-btn', function(e){
    // e.preventDefault();
    //Files can be sent through AJAX using the FormData object.
    //The AJAX call must specify contentType and psrocessdata otherwise it won't work.
    let mydata = $("#new-post-form")[0];
    let formData = new FormData(mydata);
    formData.append("option", "new_post_form");

    // //Title
    // if(isEmptyOrSpaces(formData.get('title'))){
    //   $("#title-error").text('Title cannot be empty');
    //   frontValidationOk=false;
    // }
    // else if(formData.get('title').length<4){
    //   $("#title-error").text('Title must have at least 4 characters');
    //   frontValidationOk=false;
    // }
    // // Category
    // else if(formData.get('category')=="Category"){
    //   $("#category-error").text('Category cannot be empty');
    //   frontValidationOk=false;
    // }
    // // Image
    // // Posts must have an image or a description: Posts with photo can have a description or not | Posts without photo must have a description
    // else if(isEmptyOrSpaces(formData.get('description')) && !imgfile){
    //   $('#general').text("A post must have a description or an image.");
    //   showGeneralMessage();
    //   frontValidationOk=false;
    // }
    // // Description
    // else if(!isEmptyOrSpaces(formData.get('description'))){
    //   // Description is not empty but has less than 4 characters
    //   if(formData.get('description').length<4){
    //     $("#description-error").text('Description must have at least 4 characters');
    //     frontValidationOk=false;
    //   } // We check the total bytes of the description
    //   else if(byteCount(formData.get('description'))>15000){
    //     $("#description-error").text('Description is too long');
    //     frontValidationOk=false;
    //   }
    // }
    

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
            else if(data.errors.general){
              $('#general').text(data.errors.general);
              showGeneralMessage();
            }
          } else { // Post successfully created
            // Redirect to the specific category page to see the created new post 
            redirectToCategoryPage(formData.get('category'));
            // location.reload();
          }
        })
        .fail(function (jqXHR, textStatus, errorThrown) {
          if (console && console.log) {
            alert("ajax failed: " + textStatus);
          }
        });
     }
  };
  // TEXT type on DB has a maximum size, we must check that the input description doesn't exceed it
  function byteCount(s) {
    let lengthOfText = encodeURI(s).split(/%..|./).length - 1;
      return lengthOfText;
  }
  function resetErrorMessages() {
    $("#title-error").text("");
    $("#category-error").text("");
    $("#description-error").text("");
    $("#image-error").text("");
  }

  function redirectToCategoryPage(categoryName){
    loadSpecificCategory(categoryName);
  }
});
