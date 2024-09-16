<?php

include 'connection.php';
// $msg = "";
//   $id1 = $_SESSION['userid'] ;


  if (isset($_POST['update'])) {
      echo "apple";
      $id= $_POST['recipe_id'];
    $title1 =  $_POST['title'];
    $ingredients1 =$_POST['ingredients'];
    
    $imageName = $_FILES['image'];
    $image_loc = $_FILES['image']['tmp_name'];
    $image_name = $_FILES['image']['name'];
    
    $img_des = "uploadPage/images".$image_name;
    $category = $_POST['category'];
    // $id1 = $_POST['id'];
  
    // echo $id;
    
    $category1 =implode(",",$category);
    move_uploaded_file($image_loc,"uploadPage/images/".$image_name);
   
    $state1 =$_POST['state'];

  	// $target = "../uploadPage/".basename($image1);

    
// update `nefr_recipeupload` set `title`='pasta',`ingredients`='onion',`image`='yonlo',category='vegeterian',state='meghalaya' where title='hello'
  mysqli_query($con,"update `nefr_recipeupload` set `title`='$title1',`ingredients`='$ingredients1',`image`='$img_des',category='$category1',state='$state1' where recipe_id='$id'");

  	
    
      
	  header("Location:RecipeUpload.php");
  }      

  ?>