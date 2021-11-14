
function validate()
{

    // Reset error messages
    resetErrorMessages();
   

    // var username = $('#username').val().replace(/\s/g, '');
    // var email =$('#email').val().replace(/\s/g, '');
    // var password =$('#password').val().replace(/\s/g, '');
    // var password2 =$('#password2').val().replace(/\s/g, '');
    
    var username = $('#username').val();
    var email =$('#email').val();
    var password =$('#password').val();
    var password2 =$('#password2').val();
    
  
    var username_regexp = /^[0-9A-Za-z\_]+$/;
    var email_regexp = /^[^0-9][A-z0-9_-]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_-]+)*[.][A-z]{2,4}$/;
    var password_regexp = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,30}$/;

    
    // USERNAME

    if( isEmptyOrSpaces(username) ){
        $('#username-error').text("Username cannot be empty");
        return false;
    }
    // Username length
    else if(username.length<4){
        $('#username-error').text("Username must have at least 4 characters");
        return false;
    }
    else if(username.length>30){
        $('#username-error').text("Username cannot exceed 30 characters");
        return false;
    }
    // Username is not the accepted type
    else if(!(username_regexp.test(username))){
        $('#username-error').text("Username can only contain letters, numbers and underscores");
        return false;
    }
    // EMAIL
    else if( isEmptyOrSpaces(email) ){
        $('#email-error').text("Email cannot be empty");
        return false;
    }
    // Email is not the accepted type
    else if(!(email_regexp.test(email))){
        $('#email-error').text("This email is not valid");
        return false;
    }
    // PASSWORD
    else if( isEmptyOrSpaces(password) ){
        $('#password-error').text("Password cannot be empty");
        return false;
    }
    // Password length
    else if(password.length<6){
        $('#password-error').text("Password must have at least 6 characters");
        return false;
    }
    else if(password.length>30){
        $('#password-error').text("Password cannot exceed 30 characters");
        return false;
    }
    // Password is not the accepted type
    else if(!(password_regexp.test(password))){
        $('#password-error').text("Password must contain at least one uppercase letter, one lowercase letter, one number and one special character");
        return false;
    }
    // PASSWORD 2
    else if( isEmptyOrSpaces(password2) ){
        $('#password2-error').text("Password cannot be empty");
        return false;
    }
    // PASSWORD VS PASSWORD  2
    // Passwords have different values
    else if(!(password===password2)){
        $('#password2-error').text("Passwords must be identical");
        return false;
    }
    // TERMS OF USE
    else if(!$('#termsofuse').prop('checked')){
        $('#termsofuse-error').text("You must accept our Terms of Use");
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
function cleanPassword2Field(){
    $('#password2').val('');
    $('#password2').text("");
}
function resetErrorMessages(){
    $('#username-error').val('');
    $('#username-error').text("");

    $('#email-error').val('');
    $('#email-error').text("");

    $('#password-error').val('');
    $('#password-error').text("");

    $('#password2-error').val('');
    $('#password2-error').text("");

    $('#termsofuse-error').val('');
    $('#termsofuse-error').text("");

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

    // When user clicks on show/hide password 2 (eye icon)
    $("#password2-parent i").on('click', function(event) {
        event.preventDefault();
        // Hide password and change icon to unsee
        if($('#password2-parent input').attr("type") == "text"){
            $('#password2-parent input').attr('type', 'password');
            $('#password2-parent i').addClass( "fas fa-eye-slash" );
            $('#password2-parent i').removeClass( "far fa-eye" );
        // Show password and change icon to see
        }else if($('#password2-parent input').attr("type") == "password"){
            $('#password2-parent input').attr('type', 'text');
            $('#password2-parent i').removeClass( "fas fa-eye-slash" );
            $('#password2-parent i').addClass( "far fa-eye" );
        }
    });
});

