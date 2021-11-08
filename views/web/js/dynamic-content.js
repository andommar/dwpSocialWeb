 
  
  $(document).ready(function() {
    loadContent = function(pageName,data) {
      if(data){
        $.ajax({
          url: "controller/PageController.php",
          method: "POST",
          data: { pageName: pageName, data:data },
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

    // Scrolls to top when clicking Header Button
    $("#scrollTop").click(function () {
      // Scrolls to the top of the page
      $( "html,body" ).animate({
        scrollTop: $("body").offset().top
        }, 200, function() {
        // Animation complete.
      });
    });
    

  });

  
  
  