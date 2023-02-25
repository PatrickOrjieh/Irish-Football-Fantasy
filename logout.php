<?php 
//to make the user log out 
session_start();
session_destroy();
header("Location: index.php");
?>
