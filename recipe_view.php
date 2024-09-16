
<?php
include 'connection.php';
// session_start();
$recipe_id1 =$_GET['recipe_id'];
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <title>Review & Rating System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" type="text/css" href="css_page/print.css" media="print">

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel = "stylesheet" href="styles.css">
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel = "stylesheet" href="css_page/product.css"/>
   
</head>
<body>
 <?php
include 'heading.php';

?>
<?php
include 'connection.php';

// $record=mysqli_query($con,$query);
$query = "SELECT *FROM nefr_recipeupload where recipe_id='".$recipe_id1."'";

$result = mysqli_query($con,$query);
while($row=mysqli_fetch_array($result))
    {
    echo "
       <div class='box-container'>
          <img src ='$row[image]' height = '300px' width = '400px'><br>
          <div class='sub-container'>
       <h2>Title</h2>$row[title]<br>
    

     
       <h2>Ingredients</h2>$row[ingredients]<br>
       <h2>Serving</h2>$row[serve]<br>
       <h2>Total Time to cook</h2>$row[Time]<br>
      
       <h2>Category</h2>$row[category] <br>
       <h2>State</h2>$row[state]<br>
      </div>
       </div>
       ";


    }
   
  
   
?>
 
<div class="review-box">
<form action='rating.php' method='POST'>
          <h1 class='upload__heading'>Recipe data</h1>
          <br>
          <input type='hidden' name='size' value='1000000'/>
        <label>Name </label>
        <input type = 'username' name = 'username' placeholder='Name'>
    <br/>
    
    <h3 class="text">Thanks for rating us!</h3>
 
    <div class="star-widget">
    <span class='fa fa-star' data-rating='1'></span>
      <input type="radio" name='user_rating' value="⭐">
      <label for="rate-5" class="fas fa-star"></label>
      <input type="radio" name='user_rating' value="⭐⭐">
      <label for="rate-4" class="fas fa-star"></label>
      <input type="radio" name='user_rating' value="⭐⭐⭐">
      <label for="rate-3" class="fas fa-star"></label>
      <input type="radio" name='user_rating' value="⭐⭐⭐⭐">
      <label for="rate-2" class="fas fa-star"></label>
      <input type="radio" name='user_rating' value="⭐⭐⭐⭐⭐">
      <label for="rate-1" class="fas fa-star"></label>
    </div>

      
        <p>User Review</p>
          <textarea 
                id='text' 
                  cols='100' 
                rows='4' 
            name='user_review' 
         placeholder='Please fill up your ingredients details...'></textarea>
         	  <br>

      <button type='upload' name='upload' class="btn btn-outline-success">POST</button> 

      <button onclick="window.print();" class="btn btn-primary" id ="print-btn" >Print</button> 
      </form>
      
  </div>
  



<?php

$query = "SELECT *FROM review_table where recipe_id='".$recipe_id1."'";
$result = mysqli_query($con,$query);



while($row=mysqli_fetch_array($result))
{
  echo "
            <div class = 'design' id = 'print-btn'>
           <h3>User Name</h3>$row[user_name]<br>
           <h2>User Rating</h2>$row[user_rating]
            
           <h2>User Review</h2><td>$row[user_review]</td><br>

           <h2>Date Time</h2>$row[datetime]
           
           </div>
         ";
}


         
  include 'footer.php';     

?>

<script src="app/myRecipe.js"></script>


</body>
</html>
