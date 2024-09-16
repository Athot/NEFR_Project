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
    <link rel="stylesheet" href="css_page/footer.css" />
  </head>
  <body>


<section class="footer">
      <div class="share">
        <a href="https://www.facebook.com/" class="fab fa-facebook-f"></a>
        <a href="https://x.com/login?mx=2" class="fab fa-twitter"></a>
        <a href="https://www.instagram.com/accounts/login/" class="fab fa-instagram"></a>
        <a href="https://www.linkedin.com/feed/" class="fab fa-linkedin"></a>
        <a href="https://in.pinterest.com/login/" class="fab fa-pinterest"></a>
      </div>

      <div class="links">
        <?php
        if(!isset($_SESSION['userid']))
        {
          echo "<a href='./nefrhome.php'>Home</a>";
          echo "<a href='./nefrhome.php'>About</a>"; 
          echo "<a href='./allItem.php'>Menu</a>";
          echo "<a href='./allItem.php'>Items</a>";
          echo "<a href='./login.php'>Blogs</a>";
        }else{

          echo "<a href='userPage.php'>Home</a>";
          echo "<a href='userPage.php'>About</a>";
          echo "<a href='allItem.php'>Menu</a>";
          echo "<a href='allItem.php'>Items</a>";
          echo "<a href='./Blogger/index.php'>Blogs</a>";
        }

      ?>
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