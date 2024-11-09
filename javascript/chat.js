const form = document.querySelector(".typing-area")
const incoming_id = form.querySelector(".incoming_id").value
const inputField = form.querySelector(".input-field")
const sendBtn = form.querySelector("button")
const chatBox = document.querySelector(".chat-box")

form.addEventListener("submit", e=>{
    e.preventDefault();
})

inputField.focus();
inputField.addEventListener("keyup", ()=>{
    if(inputField.value.trim() !== ""){
        sendBtn.classList.add("active");
    }else{
        sendBtn.classList.remove("active");
    }
})

sendBtn.addEventListener("click", async ()=>{
    const formData = new FormData(form);
    const response = await fetch("api/insert-chat.php",{
        method: "POST",
        body: formData
    });
    const data = await response.text();
    if(data === "success"){
        inputField.value = "";
        scrollToBottom()
    }
})
chatBox.addEventListener("mouseenter", ()=>{
    chatBox.classList.add("active");
})
chatBox.addEventListener("mouseleave", ()=>{
    chatBox.classList.remove("active");
})

setInterval(async () => {
    const formData = new FormData();
    formData.append("incoming_id", incoming_id);

    const response = await fetch("api/get-chat.php",{
        method: "POST",
        body: formData
    });
    const data = await response.text();
    console.log(data);
    chatBox.innerHTML = data;
    if (!chatBox.classList.contains("active")) {
        scrollToBottom()
    }
}, 500);

function scrollToBottom(){
    chatBox.scrollTop = chatBox.scrollHeight;
}