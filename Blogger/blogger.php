<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	 




    <title>Blogger Page</title>
    
<body>
<h1>Hi, there Write your beautiful stories here</h1>
    <form action="upload.php" method ="POST" enctype="multipart/form-data">

    <div class = "form-group">
    <label for = "user">Username</label>
    <input type = "text" name = "username" id="user" class = "form-control">
</div>


    <div class = "form-group">
                <label for = "file"> Profile Pic </label>
                <input type ="file"name="file"id="file"class ="form-control">
    </div>


    <div class = "form-group">
                <label for = "user">Title</label>
                <input type = "text" name = "title" id="user" class = "form-control">
    </div>


    <div class = "form-group">
                <label for = "user">Content</label>
                <input type = "text" name = "content" id="user" class = "form-control">
    </div>

        <input type = "submit" name="submit" value = "submit" class = "btn btn-success">
    </head> 
  

    </body>
</html>