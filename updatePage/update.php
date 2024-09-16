
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color:LightGray;">
    

  
  <form action="" method="POST"  enctype="multipart/form-data">
 
 


 
 <div class="upload__column">
         <h1 class="upload__heading">Recipe data</h1>
    
    <div> 
    <label>Title </label>
     <input type = "title" name = "title" placeholder="Fill up the tile" ><br><br>
</div>







       <div>
           <label>Ingredients </label><br>
              <textarea 
                   id="text" 
                       cols="100" 
                      rows="4" 
                 name="ingredients" value = "<?php echo ''" 
           placeholder="Please fill up your ingredients details..."></textarea>
       </div>	  






             <div>
                <label>Upload the image </label>
                   <input type="file" name="image">
               </div>




   <!-- category -->
     
                             <h3>Choose your category</h3>
                           <input type="checkbox" id="text" name="category[]" value="vegeterians"> 
                             <label for="vegeterians">vegeterians</label><br>
                                                     
                                
                             <input type="checkbox" id="text" name="category[]" value="non-vegeterians">  
                             <label for="non_vegeterians">non-vegeterians</label><br>
                                
                             <input type="checkbox" id="text" name="category[]" value="chicken">      
                             <label for="chicken">Chicken</label><br>
                              
                             <input type="checkbox" id="text" name="category[]" value="pork">    
                             <label for="pork">Pork</label><br>
                           

<!-- ************************************* ************************************* ************************************* -->


<!-- state part -->

 <h3>State</h3>
         <label for="state">State</label>
             <select name="state" >
                 <option value="meghalaya">Meghalaya</option>
                          <option value="manipur" >Manipur</option>
                 
                          <option value="mizoram">Mizoram</option>
             <option value="nagaland">Nagaland</option>
         </select>
 <br><br>


<!-- ************************************************************************** ************************************* -->

     <!-- <div class = "button"> -->
         <button name="update" classs="btn">POST</button>
         <a href = '../RecipeUpload.php'>Home</a>
     <!-- </div> -->
</form>


<?php

include '../connection.php';

  if (isset($_POST['update'])) {
      echo "apple";
      $id= $_POST['recipe_id1'];
    $title1 =  $_POST['title'];
    $ingredients1 =$_POST['ingredients'];
    
    $imageName = $_FILES['image'];
    $image_loc = $_FILES['image']['tmp_name'];
    $image_name = $_FILES['image']['name'];
    
    $img_des = "../uploadPage/images".$image_name;
    $category = $_POST['category'];
    // $id1 = $_POST['id'];
  
    // echo $id;
    
    $category1 =implode(",",$category);
    move_uploaded_file($image_loc,"../uploadPage/images/".$image_name);
   
    $state1 =$_POST['state'];

  	// $target = "../uploadPage/".basename($image1);

    
// update `nefr_recipeupload` set `title`='pasta',`ingredients`='onion',`image`='yonlo',category='vegeterian',state='meghalaya' where title='hello'
  mysqli_query($con,"update `nefr_recipeupload` set `title`='$title1',`ingredients`='$ingredients1',`image`='$img_des',category='$category1',state='$state1' where title='$title1'");

  	
    
      
	  header("Location:../RecipeUpload.php");
  }      

  ?>



     </body>
</html>
