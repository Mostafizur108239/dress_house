<?php
	session_start();
    unset($_SESSION['loggedin']);
    unset($_SESSION['user_name']);
	unset($_SESSION['role']);
	header('location:index.php');
?>