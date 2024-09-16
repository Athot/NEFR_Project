<?php
include 'connection.php';
session_start();


if (isset($_POST['upload'])) {
	
	

    $username1 = $_POST['username'];
    $user_review1 =$_POST['user_review'];
    $user_rating1=$_POST['user_rating'];
    $uid =$_SESSION['id'];	
  
    
echo $uid;


$query = "INSERT INTO review_table (`user_name`, `user_rating`, `user_review`, `datetime`,`recipe_id`) VALUES ('$username1','$user_rating1','$user_review1',NOW(),$uid)";

$result = mysqli_query($con,$query);
header('Location:product.php');

}



?>