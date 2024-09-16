<?php
  
  $db = mysqli_connect("localhost", "root", "", "nefrdatabase");
  session_start();
  $msg = "";
  $id1 = $_SESSION['userid'];

  if (isset($_POST['upload'])) {

    $title1 = mysqli_real_escape_string($db, $_POST['title']);
    $ingredients1 = mysqli_real_escape_string($db, $_POST['ingredients']);
    // $recipe_name1 =$_POST['recipe_id'];
    $image1 = $_FILES['image']['name'];
    $category = $_POST['category'];
    
    $category1 =implode(",",$category);
    // echo $category1;
   
    $state1 = mysqli_real_escape_string($db, $_POST['state']);

  	$target = "upload/".basename($image1);

    

  	$sql = "INSERT INTO `nefr_recipeupload` (`title`,`user_id`, `ingredients`, `image`, `category`, `state`) VALUES ('$title1','$id1','$ingredients1','$image1','$category1','$state1')";

  	mysqli_query($db, $sql);
	  header("Location:RecipeUpload.php");

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
  ?>