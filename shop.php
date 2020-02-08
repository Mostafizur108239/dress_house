<?php include_once 'template/header.php';?>
	

	    <?php include_once 'template/nav.php';?>

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Products</span></p>
            <h1 class="mb-0 bread">Collection Products</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section bg-light">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-8 col-lg-10 order-md-last">
    				<div class="row">
    				<div class="sidebar-box">
              <form action="search.php" class="search-form" method="post">
                <div class="form-group">
                  <span class="icon ion-ios-search"></span>
                  <input type="text" class="form-control" name="search" placeholder="Type a keyword and hit enter">
                </div>
              </form>
            </div>
            <?php
                    include_once 'db.php';
	                $conn = connect();
                    $query = "SELECT * FROM product ORDER By id DESC";
                    $result = $conn->query($query);
                     
                    if($result){
                    while($res = $result->fetch_assoc()){ ?>
		    			<div class="col-sm-6 col-md-6 col-lg-4 ftco-animate">
		    				<div class="product">
		    					<a href="#" class="img-prod"><img class="img-fluid" src="images/products/<?php echo $res['image'] ?>" alt="Colorlib Template">
		    						<div class="overlay"></div>
		    					</a>
		    					<div class="text py-3 px-3">
		    						<h3><a href="#"><?php echo $res['name'] ?></a></h3>
		    						<div class="d-flex">
		    							<div class="pricing">
				    						<p class="price"><span class="price-sale">$<?php echo $res['price'] ?></span></p>
				    					</div>
				    					
			    					</div>
			    					<p class="bottom-area d-flex px-3">
									
										
		    							<a href="product-single.php?id=<?php echo $res['id'] ?>" class="buy-now text-center py-2">Buy now<span><i class="ion-ios-cart ml-1"></i></span></a>
		    						</p>
		    					</div>
		    				</div>
		    			</div>
		    			<?php }}?>
		    			
		    			
		    			
		    			
		    			
		    		</div>
		    		
		    	</div>

		    	
    		</div>
    	</div>
    </section>

   <?php include_once 'template/footer.php';?>
 