<?php
     include ('connection.php');
     $id=$_GET['page_id'];
    mysqli_query($con,"DELETE FROM `nefraddpage` WHERE page_id=$id ");
    echo "<script>alert('Deleted successful.'); window.location.href='viewpage.php';</script>";
    
?>