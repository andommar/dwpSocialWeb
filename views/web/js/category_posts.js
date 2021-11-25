
function sendUsrCategoryPostId(){ 
    // Scrolls to the top of the page
    $( "html,body" ).animate({
        scrollTop: $("body").offset().top
        }, 200, function() {
        // Animation complete.
    });
    getUserPostsRate();
}
