<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$dbName = 'dresshouse';

$con = new mysqli($host,$user,$pass);

$sql = "CREATE DATABASE $dbName";
$con->query($sql);

$con = new mysqli($host,$user,$pass,$dbName);
	
$sql="CREATE TABLE `users` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `address` text COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `pass` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `userRole` varchar(1) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;";
if ($con-> query($sql)){
echo'users created successfully<br>';
}


$sql="CREATE TABLE `product` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `name` varchar(60) NOT NULL,
  `Category` varchar(30) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `quet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
if ($con-> query($sql)){
echo'product created successfully<br>';
}

$sql= "CREATE TABLE `admin` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `name` varchar(60) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
if ($con-> query($sql)){
echo'admin created successfully<br>';
}

$sql= "CREATE TABLE `blog` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `text` varchar(1000) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
if ($con-> query($sql)){
echo'blog created successfully<br>';
}



$sql= "CREATE TABLE `tbl_order` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `pid` int(11) NOT NULL,
  `pname` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `cid` int(11) NOT NULL,
  `cname` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `total` int(11) NOT NULL,
  `quentity` int(11) NOT NULL,
  `sid` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;";
if ($con-> query($sql)){
echo'tbl_order created successfully<br>';
}

$sql= "CREATE TABLE `cart` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `pid` int(11) NOT NULL,
  `sid` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(80) COLLATE utf8mb4_general_ci NOT NULL,
  `size` int(11) NOT NULL,
  `quentity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;";
if ($con-> query($sql)){
echo'cart created successfully<br>';
}

$sql= "CREATE TABLE `comment` (
  `id` int(10) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Text` varchar(500) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp(),
  `Blog_Id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_general_ci;";
if ($con-> query($sql)){
echo'comment created successfully<br>';
}

?>