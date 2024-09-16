<?php
include 'connection.php';
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>Image Upload</title>
<!-- <link
      rel="stylesheet"
      href="https://unpkg.com/swiper@8/swiper-bundle.min.css"
    /> -->
    
<link rel = "stylesheet" href=  "css_page/recipeUploads.css"/>
</head>

<body>
<?php
  include 'heading.php';
?>

<div  class="recipeupload-container"> 
  
    <form action="RecipeIndex.php" method="POST"  enctype="multipart/form-data">
    <div class="form-group">
    <h1 class="upload__heading">Recipe data</h1>
  	<input type="hidden" name="size" value="1000000">
	 <label>Title </label>
	  <input type = "title" name = "title" placeholder="Fill up the tile">
    </div>
    <div class="form-group">
    <p><b>Ingredients</b></p>

    
     <textarea id="text" 
      	      cols="100" 
              rows="4" 
      	      name="ingredients" 
              placeholder="Please fill up your ingredients details..."></textarea>
</div>
      <div class="form-group">
	  <label><b>Total time for cooking</b></label>
	  <input type = "time" name = "time" placeholder="Fill up the time"/>
    </div>
	  <label><b>Upload the image </b></label>
  	<input type="file" name="image">
  	
    <!-- category -->
    <div class="category">

	     <h3>Choose your category</h3>
       
       <input type="checkbox" id="text" name="category[]" value="vegeterians" class = "category1">      
       <label for="vegeterians">vegeterians</label><br>

       <!-- <input type="checkbox" id="text"name="category[]"value="vegeterians" class = "category1"> 
       <label for="vegeterians">Vegeterians<label><br> -->
  
      <input type="checkbox" id="text" name="category[]" value="Green" class = "category1">      
      <label for="chicken">Green Leafy vegetables</label><br>

      <input type="checkbox" id="text" name="category[]" value="egg" class = "category1">      
      <label for="chicken">Egg</label><br>



          
      <input type="checkbox" id="text" name="category[]" value="non-vegeterians">  
      <label for="non_vegeterians">non-vegeterians</label>
      <br>
                                 
      <input type="checkbox" id="text" name="category[]" value="chicken">      
      <label for="chicken">Chicken</label>
        
      <input type="checkbox" id="text" name="category[]" value="pork">    
      <label for="pork">Pork</label>
      <br>
      <br>
	  <label><b>Serving</b></label>
	  <input type = "serve" name = "serve" placeholder="Fill up for serving">
    <br>
</div>
                            
 
<!-- ************************************* ************************************* ************************************* -->


<!-- state part -->

  <h3>State</h3>
              <select name="state" >
                  <option value="meghalaya">Meghalaya</option>
                           <option value="manipur" >Manipur</option>
                  
                           <option value="mizoram">Mizoram</option>
              <option value="nagaland">Nagaland</option>
          </select>
  <br><br>

  <button class="btn btn-success me-md-2" type="submit" name="upload">POST</button>
      </button>
      <button type="button" class="btn btn-danger"><a href="allRecipe.php" class='upload'>Uploaded Recipes</a></button>
  </form>

</div>
<?php


$id1 = $_SESSION['userid'];
$count = 0;
// $query=mysqli_query($con,"SELECT *FROM nefr_recipeupload where user_id=$id1");


  

//     while ($row = mysqli_fetch_array($query)) 
    
include "footer.php";    
?>

<script src="app/myRecipe.js"></script>

</body>
</html>
    
