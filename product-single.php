<?php include_once 'template/header.php';?>
    <?php include_once 'template/nav.php';?>

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span class="mr-2"><a href="index.html">Product</a></span> <span>Product Single</span></p>
            <h1 class="mb-0 bread">Product Single</h1>
          </div>
        </div>
      </div>
    </div>
<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    
    
   

$q = "SELECT * FROM product WHERE id='$id'";
$res = $conn->query($q);
if($res){
    while($row = $res->fetch_assoc()){
        
    if(isset($_POST['addtocart'])){
        $sid = session_id();
        $id = $row['id'];
        $image = $row['image'];
        $name = $row['name'];
        $size = $_POST['size'];
        $price = $row['price'];
        $qut = $_POST['quantity'];
        
        $query = "INSERT INTO cart (pid,sid,name,size,quentity,price,image) VALUES('$id','$sid','$name','$size','$qut','$price','$image')";
        $res = $conn->query($query);
        if($res){
            echo "<script type='text/javascript'>
    window.location.href = 'cart.php';
</script>";
        }else{
            echo("Add To Cart Error: " . mysqli_error($conn));
        }
    }
?>
    <section class="ftco-section">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-6 mb-5 ftco-animate">
    				<a href="" class="image-popup"><img src="images/products/<?php echo $row['image']?>" class="img-fluid" alt="Colorlib Template"></a>
    			</div>
    			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
    			
    			<form action="" method="post">
    				<h3><?php echo $row['name']?></h3>
    				
    				<p class="price"><span>$<?php echo $row['price']?>.00</span></p>
    				<p><?php echo $row['name']?></p>
						<div class="row mt-4">
							<div class="col-md-6">
								<div class="form-group d-flex">
		              <div class="select-wrap">
	                  <div class="icon"><span class="ion-ios-arrow-down"></span></div>
	                  <select name="size" class="form-control">
	                  	<option value="1">small</option>
	                  	<option value="2">Medium</option>
	                  	<option value="3">Large</option>
	                  	<option value="4">Extra Large</option>
	                   
	                  </select>
	                </div>
		            </div>
							</div>
							<div class="w-100"></div>
							<div class="input-group col-md-6 d-flex mb-3">
	             	<span class="input-group-btn mr-2">
	                	<button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">
	                   <i class="ion-ios-remove"></i>
	                	</button>
	            		</span>
	             	<input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
	             	<span class="input-group-btn ml-2">
	                	<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
	                     <i class="ion-ios-add"></i>
	                 </button>
	             	</span>
	          	</div>
	          	<div class="w-100"></div>
	          	<div class="col-md-12">
	          		<p style="color: #000;"><?php echo $row['quet']?> piece available</p>
	          	</div>
          	</div>
          	<p>
          	<button name="addtocart" style="color:black" type="submit" class="btn btn-primary">Add To Cart</button>
          	</p>
          	</form>
          	
    			</div>
    		</div>
    	</div>
    </section>
<?php }}
} ?>
    

     <?php include_once 'template/footer.php';?>

  <script>
		$(document).ready(function(){

		var quantitiy=0;
		   $('.quantity-right-plus').click(function(e){
		        
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		            
		            $('#quantity').val(quantity + 1);

		          
		            // Increment
		        
		    });

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		      
		            // Increment
		            if(quantity>0){
		            $('#quantity').val(quantity - 1);
		            }
		    });
		    
		});
	</script>
    
  </body>
</html>