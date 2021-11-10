
$(document).ready(function() {
    
    // we take the user Id for the first time that the page will be loaded
    userId = $("#usr").val();
    // We retrieve the data and refresh the posts
    loadPosts = function(value,userId){ 
    
        var userfeedFilter = value;
        $.ajax({
            url: "controller/ViewsController.php",
            method: "POST",
            data: { option:"userfeed", userfeedFilter: userfeedFilter, userId:userId }
        })
        .done(function(data) {
            $filteredPosts = $.parseJSON(data);
            //alert($.parseJSON(data));
            console.log($filteredPosts);
            $.ajax({
                url: "controller/PageController.php",
                method: "POST",
                data: { pageName:'posts_filtered', data:$filteredPosts },
                success: function (data) {
                  $('#filtered-posts').html(data);
                },
              });
            //Print object as string
            // $("#filteredPosts").html(JSON.stringify($filteredPosts));
        })
        .fail(function( jqXHR, textStatus, errorThrown ) {
            console.log("ajax false");
        });
    };
    // First thing that will be loaded. We send the user Id and the default query type that we'll execute
    loadPosts('latest',userId);

    ratePost = function(userId, postId, isPositive){ 

        // Upvote button (click)
        if(isPositive){
            // If they already rated the post and they click again on the button
            if($(".upvote_button").hasClass("upvote_filled")){
                $(".upvote_button").removeClass( "upvote_filled" ).addClass( "upvote_default" );
            }
            else {
                // Apply this if everything goes ok, otherwise, set again default upvote style
                $(".upvote_button").removeClass( "upvote_default" ).addClass( "upvote_filled" );
            }
        }
        // Downvote button (click)
        else{
            // If they already rated the post and they click again on the button
            if($(".downvote_button").hasClass("downvote_filled")){
                $(".downvote_button").removeClass( "downvote_filled" ).addClass( "downvote_default" );
            }
            else{
                // Apply this if everything goes ok, otherwise, set again default downvote style
                $(".downvote_button").removeClass( "downvote_default" ).addClass( "downvote_filled" );
            }
        }
        
        
        
        
    };

    // Vote buttons hover
    // Upvote button
    // $(document).on("mouseenter", ".upvote_button", function(e) {
    //     $(this).removeClass( "upvote_default" ).addClass( "upvote_filled" );
    // });
    // $(document).on("mouseleave", ".upvote_button", function(e) {
    //     $(this).removeClass( "upvote_filled" ).addClass( "upvote_default" );
    // });
    

});