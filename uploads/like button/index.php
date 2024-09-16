<?php
session_start();
$_SESSION['user_id'] = (int)1;
$connect=mysqli_connect("localhost","root","","users");
$query="select articles.id, articles.title, count(article_likes.id) as likes from articles left join article_likes on article_likes.article=articles.id group by articles.id";
echo '$connect';
$result = mysqli_query($connect,$query);

while($row=mysqli_fetch_array($result))
    {
        echo '<h3>'.$row["title"].'</h3>';
        echo'<a href = "index.php?type=article&id='.$row["id"].'">Like</a>';
       
    }
if(isset($_GET["type"], $_GET["id"]))
    {
        $type = $_GET["type"];
        $id = (int)$_GET["id"];
        echo 'apple';

        if($type == "article")
        {
            echo '$connect';
            $query="insert into article_likes (user, article) 
            select {$_SESSION['user_id']}, {$id} from articles 
            where exists
            (select id from articles where id = {$id}) and not exists(select id from article_like where user = {$_SESSION['user_id']} and id = {$id}) limit 1";


            echo '<p>'.$row["likes"].'people like this</p>';
            mysqli_query($connect,$query);
            header("Location:index.php");

        }
    }

?>