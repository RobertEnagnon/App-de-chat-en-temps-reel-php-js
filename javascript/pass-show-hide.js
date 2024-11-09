const pwdField = document.querySelector(".form input[type='password']");
const toggleIcon = document.querySelector(".form .field i");

toggleIcon.addEventListener("click", ()=>{
    if(pwdField.type === "password"){
        pwdField.type = "text";
        toggleIcon.classList.add("active");
        }else{
            pwdField.type = "password";
            toggleIcon.classList.remove("active");
        }
})