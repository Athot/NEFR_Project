<?php
     include ('connection.php');
    //  if(isset($_POST))
     $id=$_GET['recipe_id'];
     echo $id;
    mysqli_query($con,"DELETE FROM `nefr_recipeupload` WHERE recipe_id=$id ");
    echo "<script>alert('Deleted successful.'); window.location.href='RecipeUpload.php';</script>";
    // echo "delete";
    
?>

