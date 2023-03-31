<?php
require 'dbconnect.php';

if(isset($_POST['delete_data'])){

    $info_id = mysqli_real_escape_string($conn, $_POST['delete_data']);

    $query = "DELETE FROM `clients` WHERE id='$info_id'";
    $query_run = mysqli_query($conn, $query);
}

if(mysqli_query($conn,$query)){
    header('Location: index.php');
}


?>
