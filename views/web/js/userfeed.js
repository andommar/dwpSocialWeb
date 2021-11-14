
$(document).ready(function() {
    // When we click something on a post that must redirect to that specific post page > we take the post id and the page name ("showpost" page) 
    sendPostId = function(id){
        loadContent('show_post',id);
    }
    // we take the user Id for the first time that the page will be loaded
    var userId = $("#usr").val();
    
     // We retrieve the data and refresh the posts
    loadPosts = function(value,userId){ 
    
        var userfeedFilter = value;
        $.ajax({
            url: "controller/ViewsController.php",
            method: "POST",
            data: { option:"userfeed", userfeedFilter: userfeedFilter, userId:userId }
        })
        .done(function(data) {
            var filteredPosts = $.parseJSON(data);
            $.ajax({
                url: "controller/PageController.php",
                method: "POST",
                data: { pageName:'posts_filtered', data:filteredPosts },
                success: function (data) {
                  $('#filtered-posts').html(data);
                  // We load the rates in each post
                  getUserPostsRate(userId);
                },
              });
        });
    };

    getUserPostsRate = function(userId){ 
        $.ajax({
            url: "controller/ViewsController.php",
            method: "POST",
            data: { option:"user_votes", userId:userId}
        })
        .done(function(data) {
            fillVotesWhenLoadedPost($.parseJSON(data));
        });
        
    };
    getPostTotalVotes = function(postId){
        $.ajax({
            url: "controller/ViewsController.php",
            method: "POST",
            data: { option:"post_votes", postId:postId}
        })
        .done(function(data) {
            updatePostTotalVotes(postId, $.parseJSON(data));
        });
    };

    updatePostTotalVotes = function(postId, totalVotes){
       $("#"+postId+" .total_upvotes").html(totalVotes[0]['up_votes']);
       $("#"+postId+" .total_downvotes").html(totalVotes[0]['down_votes']);
    };

    // First thing that will be loaded. We send the user Id and the default query type that we'll execute
    loadPosts('latest',userId);
    

    // When user clicks on a post voting icon
    ratePost = function(userId, postId, isPositive){ 
        if(isPositive || !isPositive){
            $.ajax({
                url: "controller/ViewsController.php",
                method: "POST",
                data: { option:"rate_post", userId:userId, postId:postId, isPositive:isPositive }
            })
            .done(function(data) {
                var rate = data;
                fillVoteWhenClicked(postId,rate);
                getPostTotalVotes(postId);
            });
        }
        
    };
    fillVotesWhenLoadedPost = function(ratedPosts){ 
        for (let i = 0; i < ratedPosts.length; i++) {
            // upvote
            if(parseInt(ratedPosts[i]['is_positive'])){
                $("#"+ratedPosts[i]['post_id']+" .upvote_button").removeClass( "upvote_default" ).addClass( "upvote_filled" );
            }
            //downvote
            else{
                $("#"+ratedPosts[i]['post_id']+" .downvote_button").removeClass( "downvote_default" ).addClass( "downvote_filled" );
            }
        }
    };
    // When the post is rated, this applies the css to the selected vote button 
    fillVoteWhenClicked = function(postId,rate){ 
        // unfill all votes
        if(rate==-1){
            if($("#"+postId+" .upvote_button").hasClass("upvote_filled")){
                $("#"+postId+" .upvote_button").removeClass( "upvote_filled" ).addClass( "upvote_default" );
            }
            if($("#"+postId+" .downvote_button").hasClass("downvote_filled")){
                $("#"+postId+" .downvote_button").removeClass( "downvote_filled" ).addClass( "downvote_default" );
            }
        }
        // fill upvote
        else if(rate==2){
            if($("#"+postId+" .upvote_button").hasClass("upvote_default")){
                $("#"+postId+" .upvote_button").removeClass( "upvote_default" ).addClass( "upvote_filled" );
            }
            if($("#"+postId+" .downvote_button").hasClass("downvote_filled")){
                $("#"+postId+" .downvote_button").removeClass( "downvote_filled" ).addClass( "downvote_default" );
            }
        
        }// fill downvote
        else if(rate==3){
            if($("#"+postId+" .downvote_button").hasClass("downvote_default")){
                $("#"+postId+" .downvote_button").removeClass( "downvote_default" ).addClass( "downvote_filled" );
            }
            if($("#"+postId+" .upvote_button").hasClass("upvote_filled")){
                $("#"+postId+" .upvote_button").removeClass( "upvote_filled" ).addClass( "upvote_default" );
            }
        }
    };


});