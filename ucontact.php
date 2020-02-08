<?php
	session_start();
	

	
        $name = $_POST['name'];
        $email = $_POST['email'];
        $text = $_POST['text'];
        $message = $_POST['message'];
       
    

	include_once 'db.php';
	$conn = connect();

    

		$sql = "INSERT INTO contact (name,email,subject,message)
					VALUES('$name','$email','$text','$message')";
		$insert = $conn->query($sql);
		echo $insert;
		if ($insert){
			$_SESSION['msg'] = 'contact Successfull';
		header('location:contact.php');
		} else{
			echo "Something Wrong", $conn->error;
		}



?>
