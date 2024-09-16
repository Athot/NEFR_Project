<?php
        include ('connection.php');
        
        $id=$_GET['recipe_id'];
       // echo "$id";
      //  $sql="SELECT * FROM product WHERE P_ID='".$id."';
       $record=mysqli_query($con,"SELECT * FROM nefr_recipeupload WHERE recipe_id='$id'");
       $row = mysqli_fetch_array($record);
        ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = stylesheet href = "./css_page/updateRecipe.css">
    <title>Document</title>
</head>
<body>
    <?php
    include 'heading.php';
    ?>
  <div  class="recipeupload-container"> 
  <form action="updateImage.php" method="POST"  enctype="multipart/form-data" class = "blocktext">
  <div class="form-group">
  <h1 class="upload__heading">Recipe data</h1>
  <input type="hidden" name="recipe_id" value="<?php echo $row['recipe_id']?>">
 
     <label>Title </label><br>
     <input type = "title" name = "title" value="<?php echo $row['title']?>" placeholder="Fill up the tile" ><br><br>
</div>







<div class="form-group">
           <p><b>Ingredients</b></p>
              <textarea 
                   id="text" 
                       cols="100" 
                      rows="4" value="<?php echo $row['ingredients']?>"
                 name="ingredients" 
           placeholder="Please fill up your ingredients details..."></textarea>
       </div>	  


  


             <div class='form-group'>
                <h3>Upload the image </h3><br>    
                   <input type="file" name="image" value = "1000000000000"><br><br>
               </div>




   <!-- category -->
        <div>
        <h3>Choose your category</h3>
                            <input type="checkbox" id="text" name="category[]" value="vegeterians"> 
                              <label for="vegeterians">vegeterians</label><br>
                                                      

                              <input type="checkbox" id="text" name="category[]" value="Green" class = "category1">      
                             <label for="chicken">Green Leafy vegetables</label><br>

                             <input type="checkbox" id="text" name="category[]" value="egg" class = "category1">      
                             <label for="chicken">Egg</label><br>
                                 
                              <input type="checkbox" id="text" name="category[]" value="non-vegeterians">  
                              <label for="non_vegeterians">non-vegeterians</label><br>
                                 
                              <input type="checkbox" id="text" name="category[]" value="chicken">      
                              <label for="chicken">Chicken</label><br>
                               
                              <input type="checkbox" id="text" name="category[]" value="pork">    
                              <label for="pork">Pork</label><br>
                           
</div>

         <label for="state"><b>State</b></label>
             <select name="state" class = "select">
                 <option value="meghalaya">Meghalaya</option>
                          <option value="manipur" >Manipur</option>
                 
                          <option value="mizoram">Mizoram</option>
             <option value="nagaland">Nagaland</option>
         </select>
<br>
         <button name="update" class="btn btn-success">POST</button>
      
         
     <!-- </div> -->
</form>
</div>
<?php

include 'footer.php';
?>

     </body>
</html>
