
function validate()
{
    var username =$('#username').val();
    var email =$('#email').val();
    var password =$('#password').val();
    var password2 =$('#password2').val();
    
    console.log('username: ',username,'\n');
    console.log('email: ',email,'\n');
    console.log('password: ',password,'\n');
    console.log('password2: ',password2,'\n');

    // if( isEmptyOrSpaces(username) ){
    //     $('#username-error').text("Username cannot be empty");
    //     return false;
    // }

    if(!$('#termsofuse').prop('checked')){
        $('#termsofuse-error').text("You must accept our Terms of Use");
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

// if($("#info-msg").hasClass("username")){

// }
