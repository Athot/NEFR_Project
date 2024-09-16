<?php

@include 'connection.php';

session_start();
if(!isset($_SESSION['userid']))
{
   // header ('location:allItem.php');
}else{
   // echo 'HELLO';
$u_id = $_SESSION['userid'];
if(isset($_POST['add_to_wishlist'])){
   $recipe_id = $_POST['recipe_id'];
   $user_id = $_POST['user_id'];
   $recipe_name = $_POST['recipe_name'];
   $recipe_image = $_POST['recipe_image'];
   $recipe_ingredients = $_POST['recipe_ingredients'];
   $recipe_time = $_POST['recipe_time'];
   $recipe_serve = $_POST['recipe_serve'];
   $recipe_state = $_POST['state'];
   
   $check_recipe_numbers = mysqli_query($con, "SELECT *FROM `nefr_recipeupload` where user_id = '$u_id'") or die ("query failed");

   if(mysqli_num_rows($check_recipe_numbers) < 0){
      $message[] = 'already added to wishlist';
   }else{   
      mysqli_query($con, "INSERT INTO `nefraddpage`(page_id, userid, title, image, ingredients, category, state) VALUES ('$recipe_id', '$u_id', '$recipe_name', '$recipe_image', '$recipe_ingredients', '$recipe_serve', '$recipe_state')");
      $message[] = 'Product added to whislist';
   }
   }
}

// $user_id = $_SESSION['user_id'];
// if(!isset($user_id)){
//    header('location:login.php');
// }


// if(!isset($user_id)){
   // header('location:login.php');
// }

// if(isset($_POST['add_to_wishlist'])){

//    $recipe_id = $_POST['product_id'];
//    $product_name = $_POST['title'];
// //    $product_price = $_POST['product_price'];
//    $product_image = $_POST['image'];
   
//    $check_wishlist_numbers = mysqli_query($con, "SELECT * FROM `wishlist` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

//    $check_cart_numbers = mysqli_query($con, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

//    if(mysqli_num_rows($check_wishlist_numbers) > 0){
//        $message[] = 'already added to wishlist';
//    }elseif(mysqli_num_rows($check_cart_numbers) > 0){
//        $message[] = 'already added to cart';
//    }else{
//        mysqli_query($con, "INSERT INTO `wishlist`(user_id, pid, name, price, image) VALUES('$user_id', '$product_id', '$product_name', '$product_price', '$product_image')")
//        or die('query failed');
//        $message[] = 'product added to wishlist';
//    }

// }

// if(isset($_POST['add_to_cart'])){

//    $product_id = $_POST['product_id'];
//    $product_name = $_POST['product_name'];
//    $product_price = $_POST['product_price'];
//    $product_image = $_POST['product_image'];
//    $product_quantity = $_POST['product_quantity'];

//    $check_cart_numbers = mysqli_query($con, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

//    if(mysqli_num_rows($check_cart_numbers) > 0){
//        $message[] = 'already added to cart🌼';
//    }else{

//        $check_wishlist_numbers = mysqli_query($con, "SELECT * FROM `wishlist` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

//        if(mysqli_num_rows($check_wishlist_numbers) > 0){
//            mysqli_query($con, "DELETE FROM `wishlist` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');
//        }

//        mysqli_query($con, "INSERT INTO `cart`(user_id, pid, name, price, quantity, image) VALUES('$user_id', '$product_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
//        $message[] = 'product added to cart';
//    }

// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="./css_page/allItems.css">

</head>
<body>
   
<?php

include 'heading.php';

?>

<section class="home">

   <div class="content">
      <p>"Brighten your day with delicious food.."</p>
      <p>Spreading joy daily is now possible with a nearby restaurant</p>
   </div>

</section>

<section class="products">

   <h1 class="title">latest Recipes</h1>

   <div class="box-container">
   <!-- LIMIT 6 -->
      <?php
         $select_products = mysqli_query($con, "SELECT * FROM `nefr_recipeupload`") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
      <form action="" method="POST" class="box">
         <img src="<?php echo $fetch_products['image']; ?>" alt="" class="image">
         <div class="name"><?php echo $fetch_products['title']; ?></div>
         <input type="hidden" name="recipe_id" value="<?php
         echo $fetch_products['recipe_id']; ?>">
         <input type="hidden" name="user_id" value="<?php
         echo $fetch_products['user_id']; ?>">
         <input type="hidden" name="recipe_name" value="<?php
         echo $fetch_products['title']; ?>">
         <input type="hidden" name="recipe_image" value="<?php
         echo $fetch_products['image']; ?>">
          <input type="hidden" name="recipe_time" value="<?php
         echo $fetch_products['Time']; ?>">
          <input type="hidden" name="recipe_ingredients" value="<?php
         echo $fetch_products['ingredients']; ?>">
          <input type="hidden" name="recipe_serve" value="<?php
         echo $fetch_products['serve']; ?>">
         <input type="hidden" name="state" value="<?php
         echo $fetch_products['state']; ?>">

        <?php
         if(!isset($_SESSION['userid'])){
            echo "";
         }else{

            echo "<input type='submit' value='check later' name='add_to_wishlist'  class='btn btn-info'>";
         }
        ?>
        <a href="product.php?pid=<?php echo $fetch_products['recipe_id']; ?>" class='btn btn-success'>View</a>

     

      </form>
      <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
      ?>

   </div>


</section>



<?php @include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>