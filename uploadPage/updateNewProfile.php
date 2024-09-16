<?php

include '../connection.php';



  if (isset($_POST['update'])) {
     
      $id= $_POST['user_id'];
      echo $id;
    $username =  $_POST['name'];
    $useremail = $_POST['email'];
    $pass = md5($_POST['password']);
    // $userpassword = $_POST['password'];
    
   
  mysqli_query($con,"update nefrlogin set name='$username',email='$useremail',password='$pass' where user_id = '$id'");

  	
    
  echo "<script>alert('You have Succesfully Updated your account'); window.location.href='userAccount.php';</script>";
 
	  
  }      

  ?>
