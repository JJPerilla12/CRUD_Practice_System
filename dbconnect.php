<?php
$host ="localhost";
$username ="root";
$password ="";
$dbname ="clients";

// Connect db
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check Connection
if(!$conn){
    die("Connection Error:" . mysqli_connect_error());
}

?>