
<?php
include 'connection.php';
session_start();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nefr home</title>

    <!-- font awesome cdn link  -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <!-- custom css file link  -->
    <link rel="stylesheet" href="css_page/viewPages.css" />
  </head>
  <body>
    <!-- header section starts  -->

   <?php
   include 'heading.php';
   ?>
<h1 class = "text-center">Search result for <em><?php $result=$_POST["search"]; echo "$result"; ?></em></h1>
<br><br>

<?php
$con = mysqli_connect("localhost", "root", "", "nefrdatabase");

if(isset($_POST['submit']))

  {
    


$search = mysqli_real_escape_string($con, $_POST['search']);

$query = "select *from nefr_recipeupload where title like  '%$search%' or ingredients like '%$search' or state like '%$search'";
$record=mysqli_query($con,$query);

$result = mysqli_query($con,$query);
$row = mysqli_fetch_assoc($result);
$_SESSION['id'] = $row['recipe_id'];
// echo $_SESSION['id'] ;
// $_SESSION['userid'] = $row['user_id'];
$_SESSION['image']=$row['image'];
$_SESSION['title']=$row['title'];
$_SESSION['ingredients']=$row['ingredients'];
$_SESSION['category']=$row['category'];
$_SESSION['state']=$row['state'];


$noresult = true;
// $result = msyqli_query($con, $sql);
?>
<div class='container-box'>
  <?php
while($row=mysqli_fetch_array($record))
    {
        $noresult = false;
     echo "
     <div class='card' style='width: 20rem;'>
  <img src='$row[image]' class='img-card' alt='food_image'>
  <div class='card-body'>
    <h5 class='card-title'>$row[title]</h5>
    <p class='card-text'></p>
    <a href='product.php?pid=$row[recipe_id]' class='btn btn-primary'>Show more</a>
   
  </div>
</div>";

      //   echo "
      //   <div class='grid-item'>
      //   <br>
      //   <img src ='$row[image]' height = '300px' width = '400px'></td><br>
      //  <h2>Title</h2>$row[title]<br>
      
      //  <a href='product.php' class='btn btn-info'>Show more</a>
      //  <a href = 'nefrPage.php' class='btn btn-success'>Add Page</a>
         
      //    </div>";
 
    }
    ?>
    </div>
    <?php
    
   
}
   
?>

</head>
<body>


<!-- <script src="app/myRecipe.js"></script> -->




<script src="js/script.js"></script>
</body>
</html>
