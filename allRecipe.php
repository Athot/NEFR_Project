
<!-- product -->
<?php
include 'connection.php';
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>Image Upload</title>
    
<link rel = "stylesheet" href=  "./css_page/allRecipe.css"/>
</head>

<body>
<?php
  include 'heading.php';


$id1 = $_SESSION['userid'];
$query=mysqli_query($con,"SELECT *FROM nefr_recipeupload where user_id=$id1");


  // $result = mysqli_query($query);

    while ($row = mysqli_fetch_array($query)) 

      echo "
      <div class='allRecipe-container'>
      <table class='styled-table'>
      <tbody>
      <tr>
      <th>Title:</th>
      <td>$row[title]</td>
      </tr>

      <tr>
      <th>Recipe Image:</th>
      <td><img src ='$row[image]' height='100px' width='150px'/></td>
      </tr>

      <tr>
      <th>Serving</th>
      <td>$row[serve]</td>
      </tr>

      <tr>
      <th>Ingredients</th>
      <td>$row[ingredients]</td>
      </tr>

      
      <tr>
      <th>Total time to cook </th>
      <td>$row[Time]</td>
      </tr>

      
      <tr>
      <th>Category</th>
      <td>$row[category]</td>
      </tr>

      
      <tr>
      <th>State</th>
      <td>$row[state]</td>
      </tr>

      <tr>
      <td class='up-de'>

       <button class='delete'><a href='delete.php?recipe_id=$row[recipe_id]'>Delete</a>

       </td>
       <td>
       <button class= 'update'><a href='update.php?recipe_id=$row[title]'>Update Page</a>
       </button>
       
        </td>
         
          </tr>
      </tr>

      </table>
      </tbody>
      </div>
      ";
      
    
?>

<script src="app/myRecipe.js"></script>

</body>
</html>
    
