<?php
if(isset($_POST['submit']) && isset($_FILES['my_image']))
    {
        echo "jeel";
    }else{
        header("Location: RecipeUpload.php");
    }


?>