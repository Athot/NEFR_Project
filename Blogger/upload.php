<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
<h1?>User page</h1>


<?php 
session_start();

include '../connection.php';
// $con = mysqli_connect('localhost','root');
mysqli_select_db($con,'nefrdatabase');

if(isset($_POST['submit']))
    {
        $username = $_POST['username'];
        $files = $_FILES['file'];

       $title = $_POST['title'];
       $content = $_POST['content'];
        echo "<br>";

        $filename = $files['name'];
        $fileeror = $files['error'];
        $filetmp = $files['tmp_name'];

        $fileext = explode('.',$filename);
        $filecheck = strtolower(end($fileext));
 
        $fileexstored = array('png','jpg','jpeg');

        if(in_array($filecheck,$fileexstored))
            {
                $destinationfile = '../app/'.$filename;
                move_uploaded_file($filetmp,$destinationfile);

                $q = "insert into `nefr_blogger`(`username`,`image`,`title`,`content`)values ('$username','$destinationfile','$title','$content')";
                
                $query = mysqli_query($con,$q);

                $displayquery = "select *from nefr_blogger";
                $querydisplay = mysqli_query($con,$displayquery);

                // $row = mysqli_num_rows($querydisplay);
                while($result = mysqli_fetch_array($querydisplay ))
                    {
                        ?>
                        <tr>
                            <td> <?php echo $result['id']?></td><br>
                            <td> <?php echo $result['username']?></td><br>
                            <td><img src=" <?php echo $result['image'];?>" height = "200px" width = "300px"></td>
                            <td> <?php echo $result['title']?></td><br>
                            <td> <?php echo $result['content']?></td><br>
<?php
                    }

            }
    }
?>

</head>
<body>
    
</body>
</html>