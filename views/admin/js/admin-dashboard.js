$(document).ready(function(){
    adminDeletePost = function (value) {
        // e.preventDefault();
        // console.log(value);
        let postId = value;
        $.ajax({
            method: "POST",
            url: "../controller/AdminViewController.php",
            data: {option: 'adminDeletePost', postId: postId }
        })
        .done(function(data){
            alert(data);
        })
        .fail (function(error){
            console.log(error);
        })
    }
})