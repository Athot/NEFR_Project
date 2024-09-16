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

    <!-- custom css file link  -->
    <!-- <link rel="stylesheet" href="css_page/style1.css" /> -->
     <link rel="stylesheet" href="css_page/nefr_homestyle.css">
  </head>
  <body>

    <header class="header">
      <a href="#" class="logo">
        <img src="images/logo.png" alt="" />
      </a>

      <nav class="navbar">
        <a href="userPage.php">Home</a>
       
        <a href="RecipeUpload.php">My Recipe</a>
        <a href="userAccount.php">User Profile</a>
        <a href="viewpage.php">my page</a>
        
        <a href="./Blogger/index.php">User Stories</a>
        <a href="logout.php">Log out</a>
       
      </nav>

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

    <!-- header section ends -->

    <!-- home section starts  -->

    <section class="home" id="home">
      <div class="content">
        <h3>Fresh Food of North East</h3>
        <p>
          In this Websites you will get the recipes which you would like to try
          in your own kitchen. Hope you all enjoy your dream recipe😋😋
        </p>
        <a href="./allItem.php" class="btn">get yours now</a>
      </div>
    </section>

    <!-- home section ends -->

    <!-- about section starts  -->

    <section class="about" id="about">
      <h1 class="heading"><span>about</span> us</h1>

      <div class="row">
        <div class="image">
          <img src="Image/image6.jpg" alt="" />
        </div>

        <div class="content">
          <h3>what makes our food special?</h3>
          <p>
            😋😋😋😋😋😋😋😋😋😋😋😋
          </p>
          <p>
          Dishes
          </p>
          <a href="#" class="btn">learn more</a>
        </div>
      </div>
    </section>

    <?php
  include 'connection.php';



?>





    <!-- blogs section ends -->

    <!-- footer section starts  -->

    <section class="footer">

      <div class="links">
        <a href="userPage.php">home</a>
        <a href="#">about</a>
        <a href="#">menu</a>
        <a href="#">products</a>
        <a href="#">review</a>
        <a href="#">contact</a>
        <a href="#">blogs</a>
      </div>

    
    
    
      <div class="credit">
        created by <span>Thotshang Mangkung</span> 
      </div>
    </section>












    <!-- footer section ends -->

    <!-- custom js file link  -->
    <script src="js/script.js"></script>
  </body>
</html>
