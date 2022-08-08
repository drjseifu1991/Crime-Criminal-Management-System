<?php 
session_start();
unset($_SESSION['uname']);
unset($_SESSION['role_id']);
header("location: index.php");
?>