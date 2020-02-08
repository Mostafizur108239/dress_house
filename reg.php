<?php
	session_start();
	
	include_once 'db.php';
	$conn = connect();
	
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
		$address = $_POST['address'];
        $pass = $_POST['pass'];
        $pass =md5($pass);


		if(empty($name)||empty($phone)||empty($email)||empty($address)||empty($pass)){
			$_SESSION['msg'] = 'Field should not be empty';
			header("Location: reg_form.php");
		}else{
			
	$sql_e= "select * from users where email='$email'";
	$res_e= $conn->query($sql_e);

	if($res_e->num_rows > 0){
		$_SESSION['msg'] = 'sorry email already taken';
		header('location:reg_form.php');
		exit;
	}
	else{
    

		$sql = "INSERT INTO users (name, phone, email,address, pass)
					VALUES('$name','$phone','$email','$address','$pass')";
		$insert = $conn->query($sql);
		echo $insert;
		if ($insert){
			$_SESSION['msg'] = 'Registration Successfull';
			header('location:user_login.php');
		} else{
			echo "Something Wrong", $conn->error;
		}



	}
		}
