<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel = "stylesheet" href = "./css_page/userAccount.css">
 



    <title>Document</title>
</head>
<body>
 <div>
<?php
 include "connection.php";
 session_start();
  include 'heading.php';
 
  // session_start();
  $uid =  $_SESSION['userid'];
  // $recipe_id = $_SESSION['recipe_id'];

$query ="select *from nefrlogin where user_id='".$uid."'";
$result = mysqli_query($con,$query);

while($row=mysqli_fetch_array($result))
  {
    echo "
     <div class='userProfile'>
    <table class='styled-table'>
    <thead>
<th>User Profile</th>
    
    </thead>
    <tbody>
    <tr>
    <th>Name</th>
    <td>$row[name]</td>
    </tr> 
   
   <tr>
   <th>Email</th>
   <td>$row[email] </td>
   </tr>

   <tr>
   <td>
   <button class= 'update'><a href='updateAccount.php?userid=$row[user_id]'>Update Page</a></button>
    </td>
   <td>
   <button class='back'><a href = 'userPage.php'>Back</a>
   </td>
   </tr>
    </tbody>
   </div>";
    
   
  }
  

?>

</div>
<script src="js/script.js"></script>
</body>
</html>