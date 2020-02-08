<?php include_once 'template/header.php';?>
<?php include_once 'template/nav.php';?>

    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-8 ftco-animate">
		  <?php 
			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset ($_SESSION['msg']);
			}
		  
		  ?>
						<form action="pupload.php" method="POST" class="billing-form" enctype="multipart/form-data">
							<h3 class="mb-4 billing-heading">Product Upload</h3>
	          	<div class="row align-items-end">
	          		<div class="col-md-6">
	                <div class="form-group">
	                	<label for="firstname">Product Name</label>
	                  <input type="text" name="pname" class="form-control" placeholder="">
	                </div>
	              </div>
	              
                <div class="w-100"></div>
		            <div class="col-md-12">
		            	<div class="form-group">
		            		<label for="country">Category</label>
		            		<div class="select-wrap">
		                  <div class="icon"><span class="ion-ios-arrow-down"></span></div>
		                  <select name="cat" id="" class="form-control">
		                  	<option value="Male">Male</option>
		                    <option value="Female">Female</option>
		                    <option value="Kids">Kids</option>
		                    
		                  </select>
		                </div>
		            	</div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                	<label for="streetaddress">Price</label>
	                  <input type="text" name="price" class="form-control" placeholder="House number and street name">
	                </div>
		            </div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                	<label for="streetaddress">Quentity</label>
	                  <input type="text" name="quet" class="form-control" placeholder="Quatation">
	                </div>
		            </div>
					<div class="col-md-6">
		            	<div class="form-group col-md-10">
						<label for="fileToUpload"><b>Image</b></label>
						<input type="file" name="fileToUpload" class="form-control-file" id="fileToUpload">
					 </div>
		            </div>
		                  <div class="">
							<button type="submit" class="btn msg btn-primary"><b>Upload file</b></button>
						  </div>
                </div>
	            </div>
	          </form><!-- END -->




          </div> <!-- .col-md-8 -->
        </div>
      </div>
    </section>


<?php include_once 'template/footer.php';?>