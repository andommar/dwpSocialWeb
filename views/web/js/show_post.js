$(document).ready(function () {
  
  if($("#userId").val()){
    console.log($("#userId").val());
  };
  // getUserPostsRate(userId);
  submitNewComment = function (userId,postId) {
    var formData = {
      formtype: "comment",
      description: $("#description").val(),
      image: $("#imgupload").val(),
    };
    $.ajax({
      method: "POST",
      url: "controller/ViewsController.php",
      data: {formData:formData, userId:userId, postId:postId, option:"submit_post_comment"},
      encode: true,
    })
      .done(function (data) {
        // We clean the textarea input after the comment is made
        $('#comment-form textarea').val('');
        $('#comment-form textarea').text("");
      })
      .fail(function (jqXHR, textStatus, errorThrown) {
        console.log(textStatus);
      });
  };

});
