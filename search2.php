<?php
include 'connection.php';
session_start();
?>

<?php

/*$query = "SELECT *FROM nefr_recipeupload ";

$result = mysqli_query($con,$query);
$row = mysqli_fetch_assoc($result);
 
$_SESSION['recipe_id'] = $row['recipe_id']; 

$id=$_SESSION['recipe_id'];	
//echo $id;
*/


$id=0;

  if (isset($_POST['upload'])) {

    $username1 = $_POST['username'];
    $user_review1 = $_POST['user_review'];
    $category = $_POST['user_rating'];
    $id=$_POST['r_id'];
    //$id=$_SESSION['recipe_id'];	
     
    // $category1 =implode(",",$category );

    

  	$sql = "INSERT INTO `review_table` (`user_name`, `user_rating`, `user_review`, `datetime`,`recipe_id`) VALUES ('$username1','$category','$user_review1',NOW(),$id)";
    echo "coco";

  	// execute query
  	mysqli_query($con, $sql);
	//   header("Location:search2.php");

  }



?>



<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <title>Review & Rating System in PHP & Mysql using Ajax</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="css_page/print.css" media="print">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   
</head>
<body>

  
<button id="print-btn"><a href = "nefrhome.php">Home</a></button><br><br>

<button id="print-btn"><a href = "userPage.php">User Home</a></button>
<br><br>
<?php
include 'connection.php';



?>





<?php
$con = mysqli_connect("localhost", "root", "", "nefrdatabase");
// session_start();


if(isset($_POST['submit']))

  {
    

    $search = mysqli_real_escape_string($con, $_POST['search']);

    $query = "select *from nefr_recipeupload where title like  '%$search%' or ingredients like '%$search' or state like '%$search'";
$record=mysqli_query($con,$query);

$query = "SELECT *FROM nefr_recipeupload";
$_SESSION['id'] = $row['recipe_id'];


$result = mysqli_query($con,$query);
$row = mysqli_fetch_assoc($result);
 
// $_SESSION['recipe_id'] = $row['recipe_id']; 




$noresult = true;
// $result = msyqli_query($con, $sql);
while($row=mysqli_fetch_array($record))
    {
       
        $noresult = false;
       // $_SESSION['recipe_id'] = $row['recipe_id']; 
       $id=$row['recipe_id'];	

        echo "<br><tr>
        <td><img src ='$row[image]' height = '300px' width = '400px'></td><br>
       <h2>Title</h2><td>$row[title]</td><br>
       <h2>Ingredients</h2><td>$row[ingredients]</td><br>
      
       <h2>Category😁</h2><td>$row[category] </td><br>
       <h2>State</h2><td>$row[state]</td><br>
      
        </tr>

       
    

         <button class='show-modal'>Add Recipe</button>
   
         <div class='overlay hidden'></div>
         <div class='add-recipe-window hidden'>
           <button class='btn--close-modal'>&times;</button>
     
         
     
       <form action='search2.php' method='POST'  enctype='multipart/form-data'>
      
      
     
     
      
       <div class='upload__column'>
               <h1 class='upload__heading'>Recipe data</h1>
     
     
         <input type='hidden' name='size' value='1000000'>
         <input type='hidden' name='r_id' value='$id'>

        
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
     
     
     </div>
     </div>
     </div>
             ";










    
        
      
    }
   
  }
   
?>
<!-- <link rel = "stylesheet" href="css_page/style.css"/> -->

</head>
<body>


<div class="text-center">
        <button onclick="window.print();" class="btn btn-primary" id="print-btn">Print</button>
      </div>



      <?php

$query = "SELECT *FROM review_table";
$result = mysqli_query($con,$query);
$row = mysqli_fetch_array($result);
// echo $query;


while($row=mysqli_fetch_array($result))
{
  echo "
            <div class = 'design'>
           <h3>User Name</h3>$row[user_name]<br>
           <h2>User Rating</h2>$row[user_rating]
            
           <h2>User Review</h2><td>$row[user_review]</td><br>

           <h2>Date Time</h2>$row[datetime]
           <h2>Recipe ID</h2>$row[recipe_id]<br><br><br>
           </div>
         ";
}


         
       

?>


<!-- <?php

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
    


         
       

?> -->



<script src="app/myRecipe.js"></script>




</body>
</html>

</html>
