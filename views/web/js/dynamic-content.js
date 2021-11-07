 
  
  $(document).ready(function() {
    loadContent = function(pageName,id) {
      if(id){
        $.ajax({
          url: "controller/PageController.php",
          method: "POST",
          data: { pageName: pageName, id:id },
          success: function (data) {
            $('#content').html(data);
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
            $('#content').html(data);
          },
        });
      }
    }



    $(".navbar_links i").click(function () {
      var pageName = $(this).attr("id");
      loadContent(pageName,'');
    });
    // Show post page - we send the selected post id
    sendPostId = function(id){
        loadContent('show_post',id);
    }
  });

  
  
  