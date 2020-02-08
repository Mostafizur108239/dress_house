

<?php include_once 'template/header.php';?>
<?php include_once 'template/nav.php';?>

<?php
if($_POST){//If it is a post request
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
		
		echo "<h3 class='text-warning text-center'>Registration First!</h3>";
	
		
		}
	} ?>


  <div class="container login_form">
  	<div class="d-flex justify-content-center h-100">
  		<div class="card login-card">
  			<div class="card-header">
  				<h3>User LogIn</h3>

 <p class="text-center text-success" style="margin-top:20px; font-size:16px;">  <?php

				//echo $_GET['msg'];
				if(isset($_SESSION['msg'])){
					echo $_SESSION['msg'];
					unset($_SESSION['msg']);
				}
			  ?></p>
  			</div>
  			<div class="card-body">
  				<form method="POST" action="">
  					<div class="input-group form-group">
  						<div class="input-group-prepend">
  							<span class="input-group-text"><i class="fas fa-user"></i></span>
  						</div>
  						<input name="name" type="text" class="form-control" placeholder="Enter Name">

  					</div>
  					<div class="input-group form-group">
  						<div class="input-group-prepend">
  							<span class="input-group-text"><i class="fas fa-key"></i></span>
  						</div>
  						<input name="pass" type="password" class="form-control" placeholder="password">
  					</div>
  					<div class="row align-items-center remember">
  						<input type="checkbox">Remember Me
  					</div>
  					<div class="form-group">
  						<input type="submit" value="Login" class="btn float-right login_btn">
  					</div>
  				</form>
  			</div>
  			<div class="card-footer">
  				<div class="d-flex justify-content-center links">
  					Don't have an account?<a href="reg_form.php">Registration</a>
  				</div>
  				<div class="d-flex justify-content-center">
  					<a href="#">Forgot your password?</a>
  				</div>
  			</div>
  		</div>
  	</div>
  </div>

<?php include_once 'template/footer.php';?>