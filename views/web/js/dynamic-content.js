  // When we want to send the page id
  function loadContent(pageName,id) {
    // If we send an extra parameter
    if(id){
      $.ajax({
        url: "controller/PageController.php",
        method: "POST",
        data: { pageName: pageName, id:id },
        success: function (data) {
          $("#content").html(data);
        },
      });
    }
    // If we only send the page name
    else{
      $.ajax({
        url: "controller/PageController.php",
        method: "POST",
        data: { pageName: pageName },
        success: function (data) {
          $("#content").html(data);
        },
      });
    }
   
  }
  // // When we want to send the page id and a parameter
  // function loadContentById(pageName,id) {
  //   $.ajax({
  //     url: "controller/PageController.php",
  //     method: "POST",
  //     data: { pageName: pageName, id:id },
  //     success: function (data) {
  //       $("#content").html(data);
  //     },
  //   });
  // }

  $(".navbar_links i").click(function () {
    var pageName = $(this).attr("id");
    loadContent(pageName,'');
  });
  
 function sendPostId(id){
    loadContent('show_post',id);
  }