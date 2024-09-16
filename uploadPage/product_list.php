
<?php
include '../connection.php';



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
$con = mysqli_connect("localhost", "root", "", "nefrdatabase");
// session_start();
$id =  $_SESSION['recipe_id'];	
echo $id;  

if(isset($_POST['submit']))

  {
    

    $search = mysqli_real_escape_string($con, $_POST['search']);

    $query = "select *from nefr_recipeupload where title like  '%$search%' or ingredients like '%$search' or state like '%$search'";
$record=mysqli_query($con,$query);
//$row = mysqli_fetch_assoc($record);
//$_SESSION['recipe_id'] = $row['recipe_id']; 	
//$id=$row['recipe_id'];	

$query = "SELECT *FROM nefr_recipeupload";
// echo $query;

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
      
        </tr>";
 
    }
   
  }
   
?>


</head>
<body>




     






<script src="app/myRecipe.js"></script>




</body>
</html>

</html>
