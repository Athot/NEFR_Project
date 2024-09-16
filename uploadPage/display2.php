<?php
include('./connect.php');
if(isset($_POST['submit']))
    {
        $username =$_POST['username'];
        $mobile = $_POST['mobile'];
        $image = $_FILES['file'];
        // echo $username;
        // echo '<br>';
        // echo $mobile;
        // echo '<br>';
        // print_r($image);
        // echo '<br>';


        $imagefilename = $image['name'];
        // print_r($imagefilename);
        // echo '<br>';
        // $imagefileerror = $image['error'];
        // print_r($imagefileerror);
        // echo '<br>';
        $imagefiletemp = $image['tmp_name'];
        print_r($imagefiletemp);
        // echo $imagefiletemp;
        // echo '<br>';
        $filename_seperate = explode('.',$imagefilename);
        print_r($filename_seperate);
        // echo '<br>';
        // to access the end-part

        // to print array we are using print_r
        $file_extension = strtolower(end($filename_seperate));
        print_r($file_extension);


        $extensions = array('jpeg','jpg','png');
        if(in_array($file_extension,$extensions))
            {
                $upload_image = 'upload/'.$imagefilename;
                move_uploaded_file($imagefiletemp,$upload_image);
                $sql ="insert into `recipe_db`(name,mobile,image) values ('$username','$mobile','$upload_image')";
                $result = mysqli_query($con,$sql);
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



?>