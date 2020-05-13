// #### Validate Signup ####
let signup = document.getElementById('signup');

signup.onsubmit = validateSignup;

function validateSignup(event) {
    let fullname = document.getElementById('fullname');
    let email = document.getElementById('email');
    let password = document.getElementById('password');

    if(fullname.value.match(/^([a-zA-Z]+)$/)){
        // console.log("True - fullname");
        fullname.style.border = "2px solid green";
    }else{
        fullname.style.border = "2px solid red";
        // console.log("False - fullname");
        event.preventDefault();
    }

    let checkEmail = /[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/;
    if(email.value.match(checkEmail)){
        email.style.border = "2px solid green";
        // console.log("True - email");
    }else{
        // console.log("False - email");
        email.style.border = "2px solid red";
        event.preventDefault();
    }

    if(password.value == ""){
        password.style.border = "2px solid red";
        // console.log("False - pwd");
        event.preventDefault();
    }else{
        // console.log("True - pwd");
        password.style.border = "2px solid green";
    }

}

// #### Validate Signin ####
let signin = document.getElementById('signin');

signin.onsubmit = validateSignin;

function validateSignin(event) {
    let email = document.getElementById('signin-email');
    let password = document.getElementById('signin-password');

    let checkEmail = /[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/;
    if(email.value.match(checkEmail)){
        // console.log("True - email");
        email.style.border = "2px solid green";
        
    }else{
        console.log("False - email");
        email.style.border = "2px solid red";
        event.preventDefault();
    }

    if(password.value == ""){
        password.style.border = "2px solid red";
        // console.log("False - pwd");
        event.preventDefault();
    }else{
        // console.log("True - pwd");
        password.style.border = "2px solid green";
    }

}
