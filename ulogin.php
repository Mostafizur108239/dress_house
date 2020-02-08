<?php
if($_POST){//If it is a post request
	session_start();
	if(!isset($_SESSION['attempt'])){
		$_SESSION['attempt'] = 0;
	}
	$name = $_POST['name'];
	$pass = $_POST['pass'];
	$pass = md5($pass);

	include_once 'db.php';
	$conn = connect();

	$sql = "select * from users where name='$name' AND pass='$pass'";
	$result = $conn->query($sql);

	if($result->num_rows > 0){
		foreach($result AS $row){
			$_SESSION['user_name'] = $row['name'];
			$_SESSION['role'] = $row['userRole'];
			
			$_SESSION['uId'] = $row['id'];
            
		}
		$_SESSION['loggedin'] = true;
       header('location:shop.php');

	}else{
		
		echo "<h2>registration first</h2>";
	
		
		}
	}

	
