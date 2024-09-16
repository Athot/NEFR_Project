<?php
include ('connection.php');
session_start();


$userid=$_SESSION['userid'];
$recipeid=$_SESSION['id'];
$image=$_SESSION['image'];
$title=$_SESSION['title'];
$ingredient1=$_SESSION['ingredients'];
$category=$_SESSION['category'];
$state=$_SESSION['state'];
echo $userid;
echo'<br>';
echo  $_SESSION['id'];
echo'<br>';
echo  $_SESSION['image'];
echo'<br>';
echo $_SESSION['title'];
echo'<br>';
echo $category;
echo'<br>';
echo $state;


mysqli_query($con,"INSERT INTO nefraddpage(`userid`,`title`,`ingredients`,`image`,`category`,`state`) VALUES ('$userid','$title','$ingredient1','$image','$category','$state')");
 header('Location:viewpage.php');


// $result = mysqli_query($con,$query);


$query = "select *from nefraddpage where user_id='".$userid."'";
$record=mysqli_query($con,$query);




// $result = msyqli_query($con, $sql);
while($row=mysqli_fetch_array($record))

    


        echo "<br><tr>
        <td><img src ='$row[image]' height = '300px' width = '400px'></td><br>
       <h2>Title</h2><td>$row[title]</td><br>
       <a href='product.php'?>Remove</a>
       
         </tr>";
?>