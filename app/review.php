<?php
include '../connection.php';
session_start();
?>

<?php



$query = "SELECT *FROM nefr_recipeupload";

$result = mysqli_query($con,$query);
$row = mysqli_fetch_assoc($result);
 
$_SESSION['recipe_id'] = $row['recipe_id']; 

$id=$_SESSION['recipe_id'];	
echo $id;







  if (isset($_POST['upload'])) {

    $username1 = $_POST['username'];
    $user_review1 = $_POST['user_review'];
    $category = $_POST['user_rating'];
    $id=$_SESSION['recipe_id'];	
  
 

    ;
    
    // $category1 =implode(",",$category );

    

  	$sql = "INSERT INTO `review_table` (`user_name`, `user_rating`, `user_review`, `datetime`,`recipe_id`) VALUES ('$username1','$category','$user_review1',NOW(),1)";

  	// execute query
  	mysqli_query($con, $sql);
	//   header("Location:search2.php");

  }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    


<button class="show-modal">Add Recipe</button>
    <!-- upload session -->
    <div class="overlay hidden"></div>
    <div class="add-recipe-window hidden">
      <button class="btn--close-modal">&times;</button>

	  

  <form action="" method="POST">
 
 


 
  <div class="upload__column">
          <h1 class="upload__heading">Recipe data</h1>


  	<input type="hidden" name="size" value="1000000">
	 
	 <div> 
	 




        <div>
            <label>Name </label>
               <textarea 
                    id="text" 
      	              cols="100" 
                   	rows="4" 
      	        name="username" 
            placeholder="Please fill up your ingredients details..."></textarea>
  	  </div>	  



    <!-- category -->
    <input type="radio" name="user_rating" value="HTML">
<label for="html">HTML</label><br>
<input type="radio" name="user_rating" value="CSS">
<label for="css">CSS</label><br>
<input type="radio" name="user_rating" value="JavaScript">
<label for="javascript">JavaScript</label>







  	
	                          <!-- <h3>Choose your category</h3>
                              <input type="checkbox" id="text" name="category[]" value="⭐"> 
                                  <label for="⭐⭐">⭐</label><br>
                                         
                                  <input type="checkbox" id='text' name="category[]" value="⭐⭐">  
                                  <label for="⭐⭐">⭐⭐</label><br>                 
                                     
                                  <input type="checkbox" id="text" name="category[]" value="⭐⭐⭐">  
                                  <label for="⭐⭐⭐">⭐⭐⭐</label><br>
                                     
                                  <input type="checkbox" id="text" name="category[]" value="⭐⭐⭐⭐">      
                                  <label for='⭐⭐⭐⭐'>⭐⭐⭐⭐</label><br>
                                   
                                  <input type="checkbox" id="text" name="category[]" value="⭐⭐⭐⭐⭐">    
                                  <label for="⭐⭐⭐⭐⭐">⭐⭐⭐⭐⭐</label><br> -->
                            
 
<!-- ************************************* ************************************* ************************************* -->

<div>
            <label>user review </label>
               <textarea 
                    id="text" 
      	              cols="100" 
                   	rows="4" 
      	        name="user_review" 
            placeholder="Please fill up your ingredients details..."></textarea>
  	  </div>	





  	<div class = "button">
  		<button type="submit" name="upload">POST</button>
  	</div>
  </form>
  <?php

$query = "SELECT *FROM review_table Where recipe_id='$id'";
$result = mysqli_query($con,$query);
$row = mysqli_fetch_array($result);


while($row=mysqli_fetch_array($result))


  echo "
            <div class = 'design'>
           <h3>User Name</h3>$row[user_name]<br>
           <h2>User Rating</h2>$row[user_rating]
            
           <h2>User Review</h2><td>$row[user_review]</td><br>

           <h2>Date Time</h2>$row[datetime]
           <h2>Recipe ID</h2>$row[recipe_id]<br><br><br>
           </div>
         ";
    


         
       

?>
 


</body>
</html>