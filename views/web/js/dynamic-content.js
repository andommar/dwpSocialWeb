  // When we want to send the page id
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
  // When we want to send the page id and a parameter
  function loadContentById(pageId,id) {
    $.ajax({
      url: "controller/PageController.php",
      method: "POST",
      data: { pageId: pageId, id:id },
      success: function (data) {
        $("#content").html(data);
      },
    });
  }

  $(".navbar_links i").click(function () {
    var pageId = $(this).attr("id");
    loadContent(pageId);
  });
  
 function sendPostId(id){
    loadContentById('show_post',id);
  }