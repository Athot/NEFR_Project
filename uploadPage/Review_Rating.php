<?php
include '../connection.php';
session_start();




if (isset($_POST['upload'])) {
	$id =  $_SESSION['recipe_id'];	
	echo $id; 
	

    $username1 = $_POST['username'];
    $user_review1 =$_POST['user_review'];
    $id1=$_SESSION['recipe_id'];	
  
 

    $category= $_POST['category'];
    
    $category1 =implode(",",$category );

    

  	$sql = "INSERT INTO `review_table` (`user_name`, `user_rating`, `user_review`, `datetime`,`recipe_id`) VALUES ('$username1','$category1','$user_review1',NOW(),$id)";

  	// execute query
  	mysqli_query($con, $sql);
	  header("Location:search2.php");
  }



?>

























 <!-- <?php
 $connect = new PDO("mysql:host=localhost;dbname=nefrdatabase","root","");

 session_start();
  $id1=$_SESSION['recipe_id'];	
 echo $id1;
 
 
 if(isset($_POST["rating_data"]))
 {
	 
	 $data = array(
		 ':user_name'		=>	$_POST["user_name"],
		 ':user_rating'		=>	$_POST["rating_data"],
		 ':user_review'		=>	$_POST["user_review"],
		 
			 
	 );
	 
				 $query = "INSERT INTO `review_table`(`user_name`, `user_rating`, `user_review`,`datetime`,`recipe_id`) VALUES (:user_name, :user_rating, :user_review, NOW() ,$id1)";
	 
				 // echo $query;
				 $statement = $connect->prepare($query);
				 $statement->execute($data);
 
				 echo "Your Review & Rating Successfully Submitted";
 }
 
 
 
 ?>  -->






