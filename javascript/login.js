const form = document.querySelector(".login form");
const continueBtn = document.querySelector(".button input");
const errorText = document.querySelector(".error-text");

form.addEventListener("submit", e=>{
    e.preventDefault();
})

continueBtn.addEventListener("click", async () =>{
    let formData = new FormData(form);
    console.log(form);
   const response = await fetch("api/login.php",{
    method: "POST",
    body: formData
   });

   const data = await response.text();
   if(data ===  "success"){
    location.href = "users.php";
   }else{
    errorText.style.display = "block";
    errorText.textContent = data;
   }

})