<?php
require 'dbconnect.php';
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
    
<div id="container">
    <h1>CRUD Practice System</h1>
</div>

<div class="table_data">
    <a href="add_new.php" class="add">Add</a>
    <table>
        <tr>
            <th width="16%">ID</th>
            <th width="16%">Name</th>
            <th width="16%">Email</th>
            <th width="16%">Contact</th>
            <th width="16%">Address</th>
            <th width="16%">Action</th>
        </tr>
     <?php
     // fetch table data
     $sql ="SELECT * FROM clients";
     $result = $conn->query($sql);

     if ($result->num_rows > 0) 
     {
    // show data to table
         while ($row = $result->fetch_assoc()){
     ?>
         <tr >
         <td ><?= $row['id']?></td>
         <td><?= $row['name']?></td>
         <td><?= $row['email']?></td>
         <td><?= $row['contact']?></td>
         <td ><?= $row['address']?></td>
         <td class="action">
        <a href="edit_clients.php?id=<?=$row['id']?>" class="edit">Edit</a>
        <form action="delete.php" method="post">
        <button type="submit" value="<?= $row['id']?>" name="delete_data" class="delete">Delete</button>
        </form>
    </td>
   </tr>
<?php
     }
    }
?>

    </table>
</div>
</body>
</html>