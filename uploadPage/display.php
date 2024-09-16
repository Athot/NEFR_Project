<?php
include('./connect.php');
if(isset($_POST['submit']))
    {
        $username =$_POST['username'];
        // $mobile = $_POST['mobile'];
        $image = $_FILES['file'];
        
        // $img_size = $_FILES['image']['size'];
       
        // echo $username;
        // echo '<br>';
        // echo $mobile;
        // echo '<br>';
        // print_r($image);
        // echo '<br>';
        // $text = mysqli_real_escape_string($con, $_POST['text']);

        $imagefilename = $image['name'];
        print_r($imagefilename);
       
        echo '<br>';
        $imagefileerror = $image['error'];
        print_r($imagefileerror);
        // echo '<br>';\


        $imagefiletemp = $image['tmp_name'];
        print_r($imagefiletemp);


        $textfiletemp = $text['tmp_name'];
        print_r($textfiletemp);
        
        // echo $imagefiletemp;
        // echo '<br>';
        $filename_seperate = explode('.',$imagefilename);
        print_r($filename_seperate);
        // echo '<br>';
        // to access the end-part

        // to print array we are using print_r
        $file_extension = strtolower(end($filename_seperate));
        print_r($file_extension);

        if($imagefileerror === 0)
        {
            if($img_size > 125000)
                {
                    $em = "Your file is too large🔶";
    
                    header("Location:RecipeUpload.php?error = $em");
                }else{






        $extensions = array('jpeg','jpg','png');
                }
        if(in_array($file_extension,$extensions))
            {
                $upload_image = 'images/'.$imagefilename;
                
                move_uploaded_file($imagefiletemp,$upload_image);
                $sql ="insert into `project_image1` (image,text) values ('$upload_image','$upload_text')";
                $result = mysqli_query($con,$sql);
                header("Location:display.php");
                // echo ''

                if($result)
                    {
                        echo'<div class="alert alert-success" role="alert">
                        <strong> Data inserted successfully</strong>
                      </div>';
                    }else{
                        die(mysqli_error($con));
                    }
            }

        }
      }



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Page</title>
    
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
   <h1  class = "text-center my-4">User Data</h1>

   <div class="container mt-5 d-flex ">
   <table class="table table-bodered w-50 justify-content-center"> 
 <thead class = "table-dark">
    <tr>
      <th scope="col">SL NO </th>
      <!-- <th scope="col"></th> -->
      <th scope="col">Image</th>
      <th scope="col">Ingredients</th> 
   </tr> 
 </thead> 
   <tbody>

 <?php

        $sql = "SELECT *FROM `project_image1`";
        $result = mysqli_query($con,$sql);
        
    
        
        while($row=mysqli_fetch_assoc($result))
            {
          
              $id = $row['id'];
                // $name = $row['name'];
                $image = $row['image'];
                $text = $row['text'];
                echo'<tr>
                <td>'.$id.'</td>
               
                 <img src ='.$image.'/>
                
             
              </tr>';
            }

?> 
    
    
  <!-- </tbody> -->
<!-- </table> -->
   </div>
</body>
</html>
