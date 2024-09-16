<!-- <?php
include 'connection.php';
$id=0;

  if (isset($_POST['upload'])) {

    $username1 = $_POST['username'];
    $user_review1 = $_POST['user_review'];
    $category = $_POST['user_rating'];
    $id=$_POST['r_id'];
 
    

  	$sql = "INSERT INTO `review_table` (`user_name`, `user_rating`, `user_review`, `datetime`,`recipe_id`) VALUES ('$username1','$category','$user_review1',NOW(),$id)";

  	mysqli_query($con, $sql);
      header('Location:product.php');


  }


?> -->



<?php
include 'connection.php';
session_start(); // Start session if needed

if (isset($_POST['upload'])) {
    // Sanitize inputs to prevent SQL injection
    $username1 = mysqli_real_escape_string($con, $_POST['username']);
    $user_review1 = mysqli_real_escape_string($con, $_POST['user_review']);
    $category = mysqli_real_escape_string($con, $_POST['user_rating']);
    $id = intval($_POST['r_id']); // Ensure $id is an integer

    // Check if the id is valid
    if ($id > 0) {
        $sql = "INSERT INTO `review_table` (`user_name`, `user_rating`, `user_review`, `datetime`, `recipe_id`) VALUES ('$username1', '$category', '$user_review1', NOW(), $id)";
        if (mysqli_query($con, $sql)) {
            // Redirect with the recipe ID to maintain context
            header('Location: product.php?pid=' . $id);
            exit(); // Ensure no further code is executed after the redirect
        } else {
            echo "Error: " . mysqli_error($con);
        }
    } else {
        echo "Invalid recipe ID.";
    }
}
?>
