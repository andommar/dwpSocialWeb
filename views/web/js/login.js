
function validate()
{
    // Reset error messages
    resetErrorMessages();

    var error="";
    var username =$('#username').val();
    var password =$('#password').val();

    if( isEmptyOrSpaces(username) ){
        $('#username-error').text("Username cannot be empty");
        cleanPasswordField();
        return false;
    }

    if( isEmptyOrSpaces(password) ){
        $('#password-error').text("Password cannot be empty");
        // We clear password input for security purposes
        cleanPasswordField();
        return false;
    }

    else
    {
    return true;
    }
}

function cleanPasswordField(){
    $('#password').val('');
    $('#password').text("");
}

function resetErrorMessages(){
    $('#username-error').val('');
    $('#username-error').text("");
    
    $('#password-error').val('');
    $('#password-error').text("");
}

$(document).ready(function() {
    // When user clicks on show/hide password (eye icon)
    $("#password-parent i").on('click', function(event) {
        event.preventDefault();
        // Hide password and change icon to unsee
        if($('#password-parent input').attr("type") == "text"){
            $('#password-parent input').attr('type', 'password');
            $('#password-parent i').addClass( "fas fa-eye-slash" );
            $('#password-parent i').removeClass( "far fa-eye" );
        // Show password and change icon to see
        }else if($('#password-parent input').attr("type") == "password"){
            $('#password-parent input').attr('type', 'text');
            $('#password-parent i').removeClass( "fas fa-eye-slash" );
            $('#password-parent i').addClass( "far fa-eye" );
        }
    });

});
