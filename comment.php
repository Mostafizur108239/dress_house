<?php 
	session_start();


		$name = $_POST['cname'];
		$email = $_POST['cemail'];
		$comment = $_POST['ccomment'];
		$BlogId = $_SESSION['Blog_Id'];
		

		
		include_once 'db.php';
		$conn=connect();
		
		$sql = "INSERT INTO `comment`( `Name`, `Email`, `Text`,`Blog_Id`) 
		VALUES ('$name','$email','$comment','$BlogId')";

		$conn->query($sql);	
		header('location:blog_single.php?blog_id='.$BlogId);
					
		?>