
<?php
  // Create database connection
  $db = mysqli_connect("localhost", "root", "", "testing");
  // include 'connection.php';

  // Initialize message variable
  // $msg = "";


  // If upload button is clicked ...
  if (isset($_POST['upload'])) {

    $username1 = mysqli_real_escape_string($db, $_POST['username']);
    $user_review1 = mysqli_real_escape_string($db, $_POST['user_review']);
    // $user_rating1 =  $_POST['user_rating'];
 

    $category= $_POST['category'];
    
    $category1 =implode(",",$category );
    
    // $user_rating = $_POST['user_rating'];
   

  	

    

  	$sql = "INSERT INTO `review_table` (`user_name`, `user_rating`, `user_review`, `datetime`) VALUES ('$username1','  $category1','$user_review1',NOW())";

    // mysqli_query($con, "INSERT INTO  nefr_recipeupload (title, ingredients, image, category,state,recipe_id)
    // VALUES ('".$title1."','".$ingredients1."', '".$img_des."','".$category1."', '".$state1."','".$recipe_name1."')");

  	// execute query
  	mysqli_query($db, $sql);
	  header("Location:index.php");
  }
  $query="SELECT * FROM review_table";
  $result = mysqli_query($db,  $query);

  // $result1 = mysqli_fetch_assoc($result);
  // $category  = $result1['category'];
  // $category1 = explode(",",$category);

?>



<!DOCTYPE html>
<html>
<head>
<title>Image Upload</title>
<!-- <link
      rel="stylesheet"
      href="https://unpkg.com/swiper@8/swiper-bundle.min.css"
    /> -->
    
<link rel = "stylesheet" href="style.css"/>
</head>
<body>
 <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">  -->
<!-- <div id="content"> -->


  <!-- <a href = "userPage.html">Go back home </a> -->
  




 
<button class="show-modal">Add Recipe</button>
    <!-- upload session -->
    <div class="overlay hidden"></div>
    <div class="add-recipe-window hidden">
      <button class="btn--close-modal">&times;</button>

	  

  <form action="" method="POST"  enctype="multipart/form-data">
 
 


 
  <div class="upload__column">
          <h1 class="upload__heading">Recipe data</h1>


  	<input type="hidden" name="size" value="1000000">
	 
	 <div> 
	 <label>Name </label>
	  <input type = "username" name = "username" placeholder="Fill up the tile" >
</div>


<h3>Choose your category</h3>
                            <!-- <input type="checkbox" id="text" name="category[]" value="vegeterians"> 
                              <label for="vegeterians">vegeterians</label><br> -->
                                     
                                     
                              <input type="checkbox" id="text" name="category[]" value="⭐">  
                              <label for="⭐">⭐</label><br>
                                     
                              <input type="checkbox" id="text" name="category[]" value="⭐⭐">  
                              <label for="⭐⭐">⭐⭐</label><br>                 
                                 
                              <input type="checkbox" id="text" name="category[]" value="⭐⭐⭐">  
                              <label for="⭐⭐⭐">⭐⭐⭐</label><br>
                                 
                              <input type="checkbox" id="text" name="category[]" value="⭐⭐⭐⭐">      
                              <label for="⭐⭐⭐⭐">⭐⭐⭐⭐</label><br>
                               
                              <input type="checkbox" id="text" name="category[]" value="⭐⭐⭐⭐⭐">    
                              <label for="⭐⭐⭐⭐⭐">⭐⭐⭐⭐⭐</label><br>



<!-- 
<label>⭐</label><br>
<input type="checkbox" name="user_rating[]"><br>

<label>2</label><br>
<input Type="checkbox" name="user_rating[]"><br>

<label>⭐⭐⭐</label><br>
<input type="checkbox" name="user_rating[]"><br>

<LABEL>⭐⭐⭐⭐</LABEL><br>
<input type="checkbox" name="user_rating[]"><br>

<label>⭐⭐⭐⭐⭐</label><br>
<input type="checkbox" name="user_rating[]"><br> -->






        <div>
            <label>User Review</label>
               <textarea 
                    id="text" 
      	              cols="100" 
                   	rows="4" 
      	        name="user_review" 
            placeholder="Please fill up your ingredients details..."></textarea>
  	  </div>	  









    <!-- category -->
  	
    <!-- <h3>Choose your rating</h3>
        <label for="R1">⭐</label><br>
<input type="Radio" name="user_rating"><br>

<label for="R2">⭐⭐</label><br>
<input Type="Radio" name="user_rating"><br>

<label FOR="R2">⭐⭐⭐</label><br>
<input type="Radio" name="user_rating"><br>

<LABEL for="R2">⭐⭐⭐⭐</LABEL><br>
<input type="Radio" name="user_rating"><br>

<label for="R2">⭐⭐⭐⭐⭐</label><br>
<input type="Radio" name="user_rating"><br>  -->
                            
 
<!-- ************************************* ************************************* ************************************* -->


<!-- state part -->

  <!-- <h3>State</h3>
          <label for="state">State</label>
              <select name="state" >
                  <option value="meghalaya">Meghalaya</option>
                           <option value="manipur" >Manipur</option>
                  
                           <option value="mizoram">Mizoram</option>
              <option value="nagaland">Nagaland</option>
          </select>
  <br><br> -->



 


  <!-- <h3>Choose your category</h3>
                            <input type="checkbox" id="text" name="user_rating[]" value="vegeterians"> 
                              <label for="vegeterians">vegeterians</label><br>
                                                      
                                 
                              <input type="checkbox" id="text" name="user_rating[]" value="non-vegeterians">  
                              <label for="non_vegeterians">non-vegeterians</label><br>
                                 
                              <input type="checkbox" id="text" name="user_rating[]" value="chicken">      
                              <label for="chicken">Chicken</label><br>
                               
                              <input type="checkbox" id="text" name="user_rating[]" value="pork">    
                              <label for="pork">Pork</label><br> -->
                            



<!-- ************************************************************************** ************************************* -->

  	<div class = "button">
  		<button type="submit" name="upload">POST</button>
  	</div>
  </form>


</div>
</div>
</div>


<?php
include 'connection.php';


$query=mysqli_query($con,"SELECT * FROM review_table");
  // $result = mysqli_query($query);

    while ($row = mysqli_fetch_array($query)) 

  



           
      echo " 
      <h3>User Name</h3>$row[user_name]<br>
      <h2>User Rating</h2>$row[user_rating]
       
      <h2>User Review</h2><td>$row[user_review]</td><br>

      <h2>Date Time</h2>$row[datetime]
     
      </div>";
    
// else{
//   echo $mysqli_query->error;
// }
    
?>
<!-- </tbody>
<!-- </table>  -->


<script src="myRecipe.js"></script>




</body>
</html>