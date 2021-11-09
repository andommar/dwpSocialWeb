 
  
  $(document).ready(function() {
    loadContent = function(pageName,data) {
      // In case we are sending the page name and a param
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
      // In case we only send the page name
      else{

        if(pageName){
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
    }


    // When we click header links (match user, new post) - We only send the page Name via the id (in this case, we only send the page name "")
    $(".navbar_links i").click(function () {
      var pageName = $(this).attr("id");
      loadContent(pageName,'');
    });
    // When we click something on a post that must redirect to that specific post page > we take the post id and the page name ("showpost" page) 
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

  
  
  