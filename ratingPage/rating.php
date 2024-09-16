<?php
include '../connection.php';
session_start();


if (isset($_POST['upload'])) {
	
	

    $username1 = $_POST['username'];
    $user_review1 =$_POST['user_review'];
    $user_rating1=$_POST['user_rating'];
    $uid =$_SESSION['id'];	
  
    
echo $uid;


$query = "INSERT INTO review_table (`user_name`, `user_rating`, `user_review`, `datetime`,`recipe_id`) VALUES ('$username1','$user_rating1','$user_review1',NOW(),$uid)";

$result = mysqli_query($con,$query);

}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</h1>Hello</h1>



<form action='rating.php' method='POST'>
      
      
     
     
      
    <div class='upload__column'>
            <h1 class='upload__heading'>Recipe data</h1>
  
  
      <input type='hidden' name='size' value='1000000'>
     

     
     <div> 
     <label>Name </label>
      <input type = 'username' name = 'username' placeholder='Fill up the tile'>
  </div>
  
  


  <input type='radio' name='user_rating' value='HTML'>
  <label for='html'>1</label><br>
  <input type='radio' name='user_rating' value='CSS'>
  <label for='css'>2</label><br>
  <input type='radio' name='user_rating' value='JavaScript'>
  <label for='javascript'  >3</label>
  
  
  
  
          <div>
              <label>User Review</label>
                 <textarea 
                      id='text' 
                        cols='100' 
                       rows='4' 
                  name='user_review' 
              placeholder='Please fill up your ingredients details...'></textarea>
        </div>	  
  
  
  
  
  
  
      <div class = 'button'>
        <button type='upload' name='upload'>POST</button>
        
      </div>
    </form>




</head>
<body>
    
</body>
</html>