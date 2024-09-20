const loginBtn = document.querySelector("#login");
const regBtn = document.querySelector("#register");
const loginForm = document.querySelector(".login_form");
const registerForm = document.querySelector(".register_form");

loginBtn.addEventListener('click',()=>{

    loginBtn.style.backgroundColor = "#21264D";
    regBtn.style.backgroundColor = "rgba(255,255,255,0.2)";

    loginForm.style.left="50%";
    registerForm.style.left="-50%";

    loginForm.style.opacity=1;
    registerForm.style.opacity=1;
})

regBtn.addEventListener('click',()=>{
    loginBtn.style.backgroundColor= "rgba(255,255,255,0.2)";
    regBtn.style.backgroundColor= "#21264D";

    loginForm.style.left="150%";
    registerForm.style.left="50%";

    loginForm.style.opacity=0;
    registerForm.style.opacity=1;
})

const loginPass = document.getElementById("passwordLog");
const loginIcon = document.getElementById("log_icon");

const regPass = document.getElementById("passwordReg");
const regIcon = document.getElementById("reg_icon");

function password_log(){
    if(loginPass.type === "password"){

            loginPass.type = "text";

            loginIcon.name = "eye-off-outline";
            loginIcon.style.cursor="pointer";

        }else{

            loginPass.type = "password";
            loginIcon.name = "eye-outline";
            loginIcon.style.cursor="pointer";

        }

}

function password_reg(){
    if(regPass.type === "password"){
        regPass.type = "text";
        
        regIcon.name = "eye-off-outline";
        regIcon.style.cursor="pointer"

        }else{

            regPass.type = "password";
            regIcon.name = "eye-outline";
            regIcon.style.cursor="pointer";

        }
}

function changeIcon(value){
    if(value.length > 0){
        loginIcon.name="eye-outline";
        regIcon.name="eye-outline";
    }else{
        loginIcon.name="lock-closed-outline";
        regIcon.name="lock-closed-outline";
    }

}