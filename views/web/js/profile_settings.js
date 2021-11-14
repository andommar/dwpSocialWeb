$(document).ready(function () {
  submitUserSettingsForm = function () {
    resetErrorMessages();
    //Files can be sent through AJAX using the FormData object.
    //The AJAX call must specify contentType and psrocessdata otherwise it won't work.
    let formData = {
      option: "profile_form",
      email: $("#email-profile").val(),
      password: $("#password-profile").val(),
      password1: $("#password1-profile").val(),
      password2: $("#password2-profile").val(),
    };
    console.log(formData);
    $.ajax({
      method: "POST",
      url: "controller/ViewsController.php",
      data: formData,
      dataType: "json",
    })
      .done(function (data) {
        console.log(data);

        if (!data.success) {
          if (data.errors.email) {
            $("#email-error").text(data.errors.email);
          }
          if (data.errors.password) {
            $("#password-error").text(data.errors.password);
          }
          if (data.errors.password1) {
            $("#password1-error").text(data.errors.password1);
          }
          if (data.errors.password2) {
            $("#password2-error").text(data.errors.password2);
          }
        } else {
          $("#success-msg").text(
            "Information successfully updated. Refreshing in 2 seconds."
          );
          setTimeout(function () {
            location.reload();
          }, 2000);
        }
      })
      .fail(function (jqXHR, textStatus, errorThrown) {
        if (console && console.log) {
          alert("ajax failed: " + textStatus);
        }
      });
    // });
  };

  uploadUserAvatar = function () {
    resetErrorMessages();

    let mydata = $("#new-avatar-form")[0];
    let formData = new FormData(mydata);
    formData.append("option", "new_avatar_form");
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
          if (data.errors.avatar) {
            $("#avatar-error").text(data.errors.avatar);
          }
        } else {
          $("#avatar-msg").text("Avatar uploaded.Refreshing in 2 seconds.");
          setTimeout(function () {
            location.reload();
          }, 2000);
        }
      })
      .fail(function (jqXHR, textStatus, errorThrown) {
        if (console && console.log) {
          alert("ajax failed: " + textStatus);
        }
      });
  };

  function resetErrorMessages() {
    $("#email-error").text("");
    $("#avatar-error").text("");
    $("#password-error").text("");
    $("#password1-error").text("");
    $("#password2-error").text("");
  }
});
