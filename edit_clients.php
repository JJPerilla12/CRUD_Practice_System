<?php
include 'dbconnect.php';
//fetch ID
if (isset($_GET['id'])) {
    $id=$_GET["id"];
}

// fetch data to textbox
$sql_get = "SELECT * FROM `clients` WHERE id=$id";
$result = $conn->query($sql_get);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $namedb =$row['name'];
    $emaildb =$row['email'];
    $contactdb =$row['contact'];
    $addressdb =$row['address'];
  }
}

// save edit
if(isset($_POST['save'])){
    $name =$_POST["name"];
    $email =$_POST["email"];
    $contact =$_POST["contact"];
    $address =$_POST["address"];

$sql ="UPDATE `clients` SET 
`name`='$name',`email`='$email',`contact`='$contact',`address`='$address' WHERE id=$id";
if(mysqli_query($conn,$sql)){
    ?>
    <div class="notif_Success" id="notif_Success">
    <p>Client Information Updated Successfully!</p>
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

    //fetch data to textbox
    $sql_get = "SELECT * FROM `clients` WHERE id=$id";
    $result = $conn->query($sql_get);
    
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $namedb =$row['name'];
        $emaildb =$row['email'];
        $contactdb =$row['contact'];
        $addressdb =$row['address'];
      }
    }
}

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
    
    <form action="" method="POST">
    <h1>Edit Information</h1>
    <div class="text_box">
        <label>Name:</label>
        <input type="text" value="<?=$namedb?>" name="name" id="" class="inputText" required>
    </div>
    <div class="text_box">
        <label>Email:</label>
        <input type="email" name="email" value="<?=$emaildb?>" id="" class="inputText" required>
    </div>
    <div class="text_box">
        <label>Contact:</label>
        <input type="text" name="contact" value="<?=$contactdb?>" id="" class="inputText" required>
    </div>
    <div class="text_box">
        <label>Address:</label>
        <input type="text" name="address" id="" value="<?=$addressdb?>" class="inputText" required>
    </div>
    <div class="saveCancel">
    <input type="submit" name="save" value="Save" class="saveBtn">
    <a href="index.php" class="cancelBtn">Cancel</a>
    </div>
    </form>
    </div>
</body>
</html>