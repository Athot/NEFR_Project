<?php
  // Create database connection
include 'connection.php';


session_start();


// $_SESSION['recipe_id'] = $row['recipe_id'];
$user_id =$_SESSION['userid'];
$id =  $_SESSION['recipe_id'];	
// echo $id;
  
  if (isset($_POST['upload'])) {


    $title1 = $_POST['title'];
    $time1 = $_POST['time'];
    $serve1 = $_POST['serve'];
    $ingredients1 =$_POST['ingredients'];
    // $recipe_name1 = $_POST['recipe_id'];
    $imageName = $_FILES['image'];
    $image_loc = $_FILES['image'] ['tmp_name'];
    $image_name = $_FILES['image'] ['name'];
    $img_des = "uploadPage/images/".$image_name;
    $category = $_POST['category'];
    
    $category1 =implode(",",$category);
    
    $state1 =  $_POST['state'];

    move_uploaded_file($image_loc,"uploadPage/images/".$image_name);
  mysqli_query($con, "INSERT INTO nefr_recipeupload (user_id,title,time, serve,ingredients, image, category, state) VALUES ('$user_id','$title1','$time1','$serve1','$ingredients1','$img_des','$category1','$state1')");

	  header("location:RecipeUpload.php");

  	
  }

?>