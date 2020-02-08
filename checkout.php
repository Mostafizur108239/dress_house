


<?php include_once 'template/header.php';?>
	
     <?php include_once 'template/nav.php';?>
     <?php
if(!isset($_SESSION['loggedin'])){
    echo "<script type='text/javascript'>
    window.location.href = 'user_login.php';
</script>";
}

?>

   <?php 
    if(isset($_POST['ordernow'])){
    $sid = session_id();
    $getdataq = "SELECT * FROM cart WHERE sid='$sid'";
    $getres = $conn->query($getdataq);
        if($getres){
            while($getre=$getres->fetch_assoc()){
                $pid = $getre['pid'];
                $pname = $getre['name'];
                $totalprice = $getre['price']*$getre['quentity'];
                $qyt = $getre['quentity'];
                $image = $getre['image'];
                $cid = $_SESSION['uId'];
                $cname = $_SESSION['user_name'];
                 $sid = session_id();
                $query = "INSERT INTO tbl_order (pid,pname,cid,cname,total,quentity,sid) VALUES('$pid','$pname','$cid','$cname','$totalprice','$qyt','$sid')";
                $orderes = $conn->query($query);
               
            }
             if(isset($orderes)){
                    echo "<p class='text-center text-success pt-4'>Order Placed Successfully. <a href='trackorder.php'>Track Order</a>  </p>";
                 
                    $carquery = "DELETE FROM cart WHERE sid='$sid'";
                    $carddel = $conn->query($carquery);
                    echo "<script>
                        var timer = setTimeout(function() {
                            window.location='cart.php'
                        }, 10000);
                    </script>";
                }
        }
}
    
?>
   
   
   
	
	
    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Checkout</span></p>
            <h1 class="mb-0 bread">Checkout</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-8 ftco-animate">

							<h3 class="mb-4 billing-heading">Billing Details</h3>
             <?php if(isset($_SESSION['uId'])){
        $id =  $_SESSION['uId'];
    $cquery = "SELECT * from users WHERE id='$id'";
    $cres = $conn->query($cquery);
    if($cres){
        while($cr = $cres->fetch_assoc()){
            
                            ?>
	          	<div class="row align-items-end">
	          		<div class="col-md-12">
	                <div class="form-group">
	                	<label for="firstname">Name</label>
	                  <input type="text" class="form-control" value="<?php echo $cr['name']?>">
	                </div>
	              </div>
                <div class="w-100"></div>
		          
		            <div class="col-md-12">
		            	<div class="form-group">
	                	<label for="streetaddress">Street Address</label>
	                  <input  value="<?php echo $cr['address']?>" type="text" class="form-control" placeholder="House number and street name">
	                </div>
		            </div>
		            
		            <div class="w-100"></div>
		            
		            
		            <div class="col-md-6">
	                <div class="form-group">
	                	<label for="phone">Phone</label>
	                  <input  value="<?php echo $cr['phone']?>" type="text" class="form-control" placeholder="">
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                	<label for="emailaddress">Email Address</label>
	                  <input  value="<?php echo $cr['email']?>" type="text" class="form-control" >
	                </div>
                </div>
                <div class="w-100"></div>
                
	            </div>
	       <?php }}} ?>



	          <div class="row mt-5 pt-3 d-flex">
	          	<div class="col-md-6 d-flex">
	          		<div class="cart-detail cart-total bg-light p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Cart Total</h3>
	          			<?php 
                                
                                $sid = session_id();
                                $pqr = "SELECT * FROM cart WHERE sid='$sid'";
                                $pqres = $conn->query($pqr);
                                if($pqres->num_rows>0){
                                    $total = 0;
                                    while($pr = $pqres->fetch_assoc()){ 
                                ?>

		    					<?php $t = $pr['price'] * $pr['quentity']; $total = $t + $total; ?>
								<?php  } ?>
                                <p class="d-flex">
		    						<span>Subtotal</span>
		    						<span>$<?php echo $total ;?></span>
		    					</p>
		    					<p class="d-flex">
		    						<span>Delivery</span>
		    						<span>$0.00</span>
		    					</p>

		    					<hr>
		    					<p class="d-flex total-price">
		    						<span>Total</span>
		    						<span>$<?php echo $total; ?></span>
		    					</p>
		    					<?php  } ?>
								</div>
	          	</div>
	          	<div class="col-md-6">
	          		<div class="cart-detail bg-light p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Payment Method</h3>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" name="optradio" class="mr-2">Cash On Delivery</label>
											</div>
										</div>
									</div>
									
									<div class="form-group">
										<div class="col-md-12">
											<div class="checkbox">
											   <label><input type="checkbox" value="" class="mr-2"> I have read and accept the terms and conditions</label>
											</div>
										</div>
									</div>
									<p>
									<form action="" method="POST">
									<button type="submit" name="ordernow" class="btn btn-primary">Place An Order</button>
									</form>
									</p>
								</div>
	          	</div>
	          </div>
          </div> <!-- .col-md-8 -->
        </div>
      </div>
    </section> <!-- .section -->

     <?php include_once 'template/footer.php';?>
    
  </body>
</html>