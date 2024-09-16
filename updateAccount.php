<?php
       include "connection.php";
        
        $id=$_GET['userid'];
       // echo "$id";
      //  $sql="SELECT * FROM product WHERE P_ID='".$id."';
       $record=mysqli_query($con,"SELECT * FROM nefrlogin WHERE user_id='$id'");
       $row = mysqli_fetch_array($record);
        ?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css_page/login_update.css"/>
   <title>register form</title>

</head>

<body>
   

<?php
include "heading.php";

?>

<div class="form-container">

   <form action="updateNewProfile.php" method="post">

    
      
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      
      <h3>Update Profile</h3>
      <input type="hidden" name="user_id" value="<?php echo $row['user_id']?>">

      <input type="text" name="name" required placeholder="enter your name" value ="<?php echo $row['name']?>" >


      <input type="email" name="email" required placeholder="enter your email" value ="<?php echo $row['email']?>">


      <input type="password" name="password" required placeholder="enter your password" value ="<?php echo $row['password']?>">
     
      <input type="submit" name="update" value="login now" class="form-btn">


      <!-- <button name="update" class="btn">POST</button> -->
      <button class="form-btn2">
      <a href = "./userAccount.php">Back</a>
   </button>
      </div>
    
   </form>
  
</div>
<?php

include 'footer.php';
?>
</body>
</html>