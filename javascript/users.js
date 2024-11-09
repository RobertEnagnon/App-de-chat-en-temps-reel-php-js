const searchBar = document.querySelector(".search input");
const searchIcon = document.querySelector(".search button");
const usersList = document.querySelector(".users-list");



// async function fetchUsers() {

//     const response = await fetch("api/users.php");
//     const data = await response.text();
//     if (!searchBar.classList.contains("active")) {
//         usersList.innerHTML = data;
//     }
// }

setInterval(async () => {
    const response = await fetch("api/users.php");
    const data = await response.text();
    if (!searchBar.classList.contains("active")) {
        usersList.innerHTML = data;
    }
}, 500);

searchIcon.addEventListener('click', ()=>{
    searchBar.classList.toggle('show');
    searchIcon.classList.toggle("active");
    searchBar.focus();
    // console.log(searchBar.classList.contains('active'));
    if(searchBar.classList.contains('active')){
    // if(searchBar.classList.contains('show')){
        searchBar.value = "";
        searchBar.classList.remove("active")
    }
})

searchBar.addEventListener('keyup', async () =>{
    const searchValue = searchBar.value;
    let formData = new FormData();
    formData.append('searchTerm', searchValue);
    if(searchValue != ""){
        searchBar.classList.add("active");
    }else{
        searchBar.classList.remove("active");
    }
    console.log("searchValue: ", searchValue);
    const response = await fetch("api/search.php",{
        method: "POST",
        body: formData
    });

    const data = await response.text();
    usersList.innerHTML = data;

})