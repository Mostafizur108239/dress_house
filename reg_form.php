

<?php include_once 'template/header.php';?>
<?php include_once 'template/nav.php';?>



  <!-- Masthead -->

  <div class="container login-form">
    <div class="card">
  <article class="card-body mx-auto" style="max-width: 400px;">
  	<h4 class="card-title mt-3 text-center">Create Account</h4>

 <p class="text-center text-success" style="margin-top:20px; font-size:16px;">  <?php

				//echo $_GET['msg'];
				if(isset($_SESSION['msg'])){
					echo $_SESSION['msg'];
					unset($_SESSION['msg']);
				}
			  ?></p>
  	<form action="reg.php" method="POST">
  	<div class="form-group input-group">
  		<div class="input-group-prepend">
  		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
  		 </div>
          <input name="name" class="form-control" placeholder="Full name" type="text">
      </div> <!-- form-group// -->

      <div class="form-group input-group">
      	<div class="input-group-prepend">
  		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
  		 </div>
          <input name="phone" class="form-control" placeholder="Enter Phone Number" type="text">
      </div> <!-- form-group// -->
      <div class="form-group input-group">
      	<div class="input-group-prepend">
  		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
  		 </div>
          <input name="email" class="form-control" placeholder="Email address" type="email">
      </div> <!-- form-group// -->
	<div class="form-group input-group">
      	<div class="input-group-prepend">
  		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
  		 </div>
          <input name="address" class="form-control" placeholder="Enter address" type="text">
      </div> 
      <div class="form-group input-group">
      	<div class="input-group-prepend">
  		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
  		</div>
          <input class="form-control" name="pass" placeholder="Create password" type="password">
      </div> <!-- form-group// -->
      <div class="form-group input-group">
      	<div class="input-group-prepend">
  		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
  		</div>
          <input class="form-control" name="pass" placeholder="Repeat password" type="password">
      </div> <!-- form-group// -->
      <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block"> Create Account</button>
      </div> <!-- form-group// -->
      <p class="text-center">Have an account? <a href="login-form.php">Log In</a> </p>
  </form>
  </article>
  </div> <!-- card.// -->
  </div>

<?php include_once 'template/footer.php';?>