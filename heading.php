<?php
include 'connection.php';
// if()
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
    <link rel = "stylesheet" href="styles.css">
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <!-- custom css file link  -->
    <link rel="stylesheet" href="css_page/heading.css" />
  </head>
  <body>
    <!-- header section starts  -->

    <header class="header">
   
      <!-- <a href="nefrhome.php" class="logo">
        <img src="./Image/logo.png" alt="" />
      </a> -->
<!-- userPage.php -->
      <nav class="navbar">
      <a href="<?php 
          if(!isset($_SESSION['userid'])){
            echo 'nefrhome.php';
          }else{
            echo 'userPage.php';
          }  
        ;?>">Home</a>
      <!-- RecipeUpload.php -->
        <a href="<?php 
          if(!isset($_SESSION['userid'])){
            echo 'login.php';
          }else{
            echo 'RecipeUpload.php';
          }  
        ;?>">My Recipe</a>
        <a href="<?php 
          if(!isset($_SESSION['userid'])){
            echo 'login.php';
          }else{
            echo 'userAccount.php';
          }  
        ;?>">User Profile</a>
        <!-- Blogger/index.php -->
        <a href="<?php 
          if(!isset($_SESSION['userid'])){
            echo 'login.php';
          }else{
            echo 'Blogger/index.php';
          }  
        ;?>">User Stories</a>
        
        <a href="<?php 
          if(!isset($_SESSION['userid'])){
            echo 'login.php';
          }else{
            echo 'logout.php';
          }  
        ;?>"><?php 
        if(!isset($_SESSION['userid'])){
          echo '';
        }else{
          echo 'LogOut';
        }
        ?></a>
        
      </nav>
      <div class='cart'>
        <?php
       
        if(!isset($_SESSION['userid']))
        {
          echo "";
          
        }else{
          $id1 = $_SESSION['userid'];
   $select_whistlist = mysqli_query($con, "SELECT * FROM `nefraddpage` WHERE userid = '$id1'")or die('query failed');
        $whistlist_num_rows = mysqli_num_rows($select_whistlist);
     
        ?>
      <a href="./viewpage.php"><img src='./Image/empty-cart.svg' /><span class='rows'><?php echo $whistlist_num_rows; ?></a>
</div>
<?php

        }?>
      <div class="icons">
        <div class="fas fa-search" id="search-btn"></div>
      
        <div class="fas fa-bars" id="menu-btn"></div>
      </div>
      
      <div class="search-form">
        <form action = "product_list.php" method="POST"> 
        <input type="search" name = "search" id="search-box" placeholder="search here..." />
     
     
        <button  name ="submit" value = "search" type="submit">Click</button>
      </form>
      
      </div>
     
      </div>
    </header>
    <script src="app/myRecipe.js"></script>
</body>
</html>
