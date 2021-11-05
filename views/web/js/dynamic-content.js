$(document).ready(function () {
  function loadContent(id) {
    $.ajax({
      url: "controller/PageController.php",
      method: "POST",
      data: { id: id },
      success: function (data) {
        $("#content").html(data);
      },
    });
  }

  $(".navbar_links i").click(function () {
    var pageId = $(this).attr("id");
    loadContent(pageId);
  });
});
