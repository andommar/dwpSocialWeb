
$(document).ready(function(){
    $("comment-form").submit(function(event){
        var formData = {
            formtype = "comment",
            description = $("#description").val(),
            image = $("#imgupload").val()
        };

        $.ajax({
            method: "POST",
            url:"controller/ViewsController.php",
            data: formData,
            dataType: "json",
            enconde: true,
        }).done (function(data) {
            console.log(data);
        });

        event.preventDefault();
    })



    
});