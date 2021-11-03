
function validate()
{
    // Reset errors and info message
    $('#username-error').val('');
    $('#username-error').text("");
    $('#password-error').val('');
    $('#password-error').text("");
    $('#info-msg').val('');
    $('#info-msg').text("");

    var error="";
    var username =$('#username').val();
    var password =$('#password').val();

    if( isEmptyOrSpaces(username) ){
        $('#username-error').text("Username cannot be empty");
        return false;
    }

    if( isEmptyOrSpaces(password) ){
        $('#password-error').text("Password cannot be empty");
        // We clear password input for security purposes
        $('#password').val('');
        return false;
    }

    else
    {
    return true;
    }
}

function isEmptyOrSpaces(str){
    return str === null || str.match(/^ *$/) !== null;
}

