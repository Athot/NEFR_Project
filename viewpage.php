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
    <link rel = "stylesheet" href="styles.css">
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <!-- custom css file link  -->
    <link rel="stylesheet" href="css_page/viewPages.css" />
  </head>
  <body>
    <!-- header section starts  -->

    <header>
      <?php

      ?>
    </header>


<?php
session_start();
include ('connection.php');
include 'heading.php';

$id1= $_SESSION['userid'] ;
$query = "select *from nefraddpage where userid='".$id1."'";

$record=mysqli_query($con,$query);
// header('Location:product_list.php');




// $result = msyqli_query($con, $sql);
?>
<div class='container-box'>
  <?php
while($row=mysqli_fetch_array($record))

  echo "
  
  <div class='card' style='width: 18rem;'>
<img src='$row[image]' class='img-card' alt='food recipe'>
<div class='card-body'>
  
  <p class='card-text'>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  <a href='product.php?pid=$row[page_id]' class='btn btn-primary'>Show more</a>
  <a href='delete2.php?page_id=$row[page_id]'class= 'btn btn-danger'>Delete</a>
</div>
</div>
";

?>
</div>
<?php
      //   echo "<br>
      //   <div class='recipes'>
      //   <><img src ='$row[image]' height = '300px' width = '400px'/><br>
      //  <h2>Title</h2>$row[title]<br>
      //  <a href='product.php' class='btn btn-info'>Show more</a>
       
      //  <a href='delete2.php?page_id=$row[page_id]'class= 'btn btn-danger'>Delete</a>
       
      //    </div>";
 
   
       
        




?> 
    <script src="js/script.js"></script>
</body>
</html>