$(document).ready(function () {
  sendUsrPostId = function (userId,postId){
    getUserSinglePostRate(userId,postId);
  };
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
        var post_id = $('.votes_comments_area .icons').attr('id');
        // We reload the page by calling again the function that loaded the page the first time (on userfeed)
        loadContent('show_post',post_id);
      })
      .fail(function (jqXHR, textStatus, errorThrown) {
        console.log(textStatus);
      });
  };
  getUserSinglePostRate = function(userId,postId){  
    $.ajax({
        url: "controller/ViewsController.php",
        method: "POST",
        data: { option:"singlepost_user_votes", userId:userId, postId:postId}
    })
    .done(function(data) {
      var parsedData = $.parseJSON(data);
      // it returns false if the user didn't vote that post before
        if(parsedData) fillSinglePostVotes(parsedData);
    });  
  };
  fillSinglePostVotes= function(ratedPost){ 
        // upvote
        console.log(parseInt(ratedPost['is_positive']));
        if(parseInt(ratedPost['is_positive'])){
            $("#"+ratedPost['post_id']+" .upvote_button").removeClass( "upvote_default" ).addClass( "upvote_filled" );
        }
        //downvote
        else{
            $("#"+ratedPost['post_id']+" .downvote_button").removeClass( "downvote_default" ).addClass( "downvote_filled" );
        }
    // }
  };

});
