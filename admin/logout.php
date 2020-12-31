<!-- it destroy the session and redirect to login page -->

<?php

session_start();
session_destroy();
header('location:adminlogin.php');

?>