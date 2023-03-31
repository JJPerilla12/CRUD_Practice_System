<?php
require 'dbconnect.php';

if(isset($_POST['save'])){
$name =$_POST["name"];
$email =$_POST["email"];
$contact =$_POST["contact"];
$address =$_POST["address"];

$sql ="INSERT INTO `clients`(`name`, `email`, `contact`, `address`) 
VALUES ('$name','$email','$contact','$address')";

if(mysqli_query($conn,$sql)){
   ?>
   <div class="notif_Success" id="notif_Success">
    <p>Client Information Added Successfully!</p>
    <button onclick="myFunction()" class="close">X</button>

   </div>
<script>
    function myFunction() {
  var x = document.getElementById("notif_Success");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
} 
</script>

   <?php
}else{
    echo "Error found: " . mysqli_connect_error();
}
mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>CRUD System Practice</title>
</head>
<body>
   
  
    <div class="addNewInfo">
    
    <form action="" method="POST" class="add_form">
    <h1>Add New Information</h1>
    <div class="text_box">
        <label>Name:</label>
        <input type="text" name="name" id="" class="inputText" required>
    </div>
    <div class="text_box">
        <label>Email:</label>
        <input type="email" name="email" id="" class="inputText" required>
    </div>
    <div class="text_box">
        <label>Contact:</label>
        <input type="text" name="contact" id="" class="inputText" required>
    </div>
    <div class="text_box">
        <label>Address:</label>
        <input type="text" name="address" id="" class="inputText" required>
    </div>
    <div class="saveCancel">
    <input type="submit" name="save" value="Save" class="saveBtn">
    <a href="index.php" class="cancelBtn">Cancel</a>
    </div>
    </form>
    </div>
</body>
</html>