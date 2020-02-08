<?php include_once 'template/header.php';?>
	

	    <?php include_once 'template/nav.php';?>

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-0 bread">Search Products</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section bg-light">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-12 col-lg-12 order-md-last">
    				<div class="row">
    			<?php
                          include_once 'db.php';
	                $conn = connect();
                if($_POST){
                  
                    $search = $_POST['search'];
                    $query = "SELECT * FROM product WHERE name LIKE '%".$search."%' or Category LIKE '%".$search."%' or price LIKE '%".$search."%'";
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
									
										
		    							<a href="#" class="buy-now text-center py-2">Buy now<span><i class="ion-ios-cart ml-1"></i></span></a>
		    						</p>
		    					</div>
		    				</div>
		    			</div>
		    			<?php }}else{
                       echo "<h2>Search Product Is Not Available</h2>";
                    }
                }?>
		    			
		    			
		    			
		    			
		    			
		    			
		    			
		    		</div>
		    	</div>

		    	
    		</div>
    	</div>
    </section>

   <?php include_once 'template/footer.php';?>
 