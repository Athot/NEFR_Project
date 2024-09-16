<?php
if(isset($_POST['submit'])&& isset($_FILES['image']))

{

    include "db_conn.php";
    echo"<pre>";
    print_r($_FILES['image']);
    echo"</pre>";


    $img_name = $_FILES['image']['name'];
   
    $img_size = $_FILES['image']['size'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $error = $_FILES['image']['error'];


if($error === 0)
    {
        if($img_size > 125000)
            {
                $em = "Your file is too large🔶";

                header("Location:RecipeUpload.php?error = $em");
            }else{
                $image_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($image_ex);

                $allowed_exs = array("jpg","jpeg","png");

                if(in_array($img_ex_lc, $allowed_exs))
                    {
                        $new_img_name = uniqid("IMG-",true).'.'.$img_ex_lc;
                       
                        $img_upload_path = 'upload/'.$new_img_name;
                        move_uploaded_file($tmp_name, $img_upload_path);


                        $sql = "INSERT INTO images (image_url) VALUES('$new_img_name') ";
                        mysqli_query($conn, $sql);
                        header("Location:view.php");


                    }else{
                        $em = "You cannot upload files of this type";
                header("Location:RecipeUpload.php?error = $em");
                    }
            }
        } 
            else{
                $em = "unknown error occured🌋";
                header("Location:RecipeUpload.php?error = $em");
            }
    }


else{
    header("Location: RecipeUpload.php");
}


?>