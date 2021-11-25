$( document ).ready(function() {
    $("#all-cats").click(function () {
        loadContent('all_categories', "");
    });

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });
});