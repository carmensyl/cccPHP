<?php
// connectivity same for each time
$servername = 'localhost';
$username = "root";
$password = ""; //default password is empty
$dbname = "shopping_cart";

//represent the connection
$conn = new mysqli($servername,$username,$password,$dbname);
// print_r($conn);
if($conn->connect_error){
    die("Failed ".$conn->connect_error);
}
?>