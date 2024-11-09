<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "tuto_chatapp";

$conn = mysqli_connect($hostname,$username,$password,$database);
if(!$conn){
    die("Database Connection failed: " . mysqli_connect_error());
}
?>