<?php

@include 'connnection.php';

session_start();
session_unset();
session_destroy();
echo "<script>alert('Logout successful.'); window.location.href='nefrhome.php';</script>";

// header('location:nefrhome.php');

?>