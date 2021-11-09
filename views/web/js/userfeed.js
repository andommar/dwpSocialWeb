
$(document).ready(function() {
    // $("#userfeed_filters").change(function(){ 

    // alert("filter changed");

    // });
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

            // ******* loadContent('test',$filteredPosts);

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

            // printPosts(){

            // }
        })
        .fail(function( jqXHR, textStatus, errorThrown ) {
            console.log("ajax false");
        });
    };

    $('#upvote_button').mouseenter(
        function () {
            $(this).removeClass( "btn-primary-deselected" ).addClass( "btn-primary-selected" );
        });

$('#upvote_button').mouseleave(       function () {
          $('#hover_tutor').show();
        $(this).hide();
        }
    ).mouseleave();


});