$( document ).ready(function() {
    // When clicking on menu > "all categories" option
    $("#all-cats").click(function () {
        loadContent('all_categories', "");
    });
    // shows tooltip content
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });
    // When clicking index logo (home)
    $("#logo-link").click(function () {
        location.reload();
    });
});