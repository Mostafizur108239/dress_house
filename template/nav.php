<?php include_once 'template/header.php'; ?>
   <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">Dress House</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
	          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
              	<a class="dropdown-item" href="shop.php">Shop</a>
                <a class="dropdown-item" href="cart.php">Cart</a>
                <a class="dropdown-item" href="checkout.php">Checkout</a>
              </div>
            </li>
	          <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="blog.php" class="nav-link">Blog</a></li>
	          <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
	          <?php
                if(isset($_SESSION['uId'])){
									$id = $_SESSION['uId'];
									$select = "SELECT * FROM tbl_order WHERE cid='$id'";
									$sqs = $conn->query($select);
									if($sqs->num_rows>0){?>
	          <li class="nav-item"><a href="trackorder.php" class="nav-link">Check Order</a></li>
	          <?php }}?>
	          <li class="nav-item cta cta-colored"><a href="cart.php" class="nav-link"><span class="icon-shopping_cart"></span>[
             <?php 
                  $sid = session_id();
                $q = "SELECT quentity FROM cart WHERE sid='$sid'";   
                  $query = $conn->query($q);
                  if($query->num_rows>0){
                      $total = 0;
                      while($ro = $query->fetch_assoc()){
                          $row = $ro['quentity'];
                          $total = $row + $total;
                      }
                      echo $total;
                  }else{
                      echo "0";
                  }
            ?>
             
             ]</a></li>
              <?php
                if(isset($_SESSION['loggedin']) && $_SESSION['role'] != 1){?>
                     <li class="nav-item"><a href="#" class="btn btn-primary nav-link"><?php echo $_SESSION['user_name'] ?></a></li>
                     <li class="nav-item"><a href="logout.php" class="text-warning nav-link">Logout</a></li>
					 
                <?php }elseif(isset($_SESSION['loggedin']) && $_SESSION['role'] == 1){?>
                     
					<li class="nav-item dropdown">
					  <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Admin</a>
					  <div class="dropdown-menu" aria-labelledby="dropdown04">
						<a class="dropdown-item" href="pupload_form.php">Photo Upload</a>
						<a class="dropdown-item" href="order_admin.php">Check Order</a>						
						<a class="dropdown-item" href="admin-contact.php">Contact</a>
						<a class="dropdown-item" href="cart.php">Cart</a>
						<a class="dropdown-item" href="checkout.php">Checkout</a>
					  </div>
					</li>
				  <li class="nav-item"><a href="logout.php" class="text-warning nav-link">Logout</a></li>
				<?php }else{?>
                 <li class="nav-item"><a href="user_login.php" class="nav-link">Log in</a></li>
               <?php } ?>
              
	        </ul>
	      </div>
	    </div>
	  </nav>