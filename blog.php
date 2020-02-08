<?php include_once 'template/header.php';?>
	
     <?php include_once 'template/nav.php';?>
	 <?php
if(!isset($_SESSION['loggedin'])){
    echo "<script type='text/javascript'>
    window.location.href = 'user_login.php';
</script>";
}

?>
	 <?php if(!isset($_SESSION)) {session_start();}  ?>

	<html>
	<body>
    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Blog</span></p>
            <h1 class="mb-0 bread">Blog</h1>
          </div>
        </div>
      </div>
    </div>

		

			
	<?php 
			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset ($_SESSION['msg']);
			}
		  
		  ?>
	
<section class="ftco-section">
  <div class="container">
	<div class="row justify-content-center">
	  <div class="col-xl-8 ftco-animate">
	  
		<form action="blog_input.php" method="POST" class="billing-form" enctype="multipart/form-data">
				<h3 class="mb-4 billing-heading">Write blog</h3>

				<div class="col-md-6">
					<div class="form-group">
						<textarea name="text" cols="40" rows="4" placeholder="please say something about your blog"></textarea>
					</div>
				</div>
				<div class="col-md-6">
				 <div class="form-group ">
					<label for="fileToUpload"><b>Image</b></label>
					<input type="file" name="fileToUpload" class="form-control-file" id="fileToUpload">
				 </div>
				</div>
			  <div class="">
				<button type="submit" class="btn msg btn-primary"><b>Upload file</b></button>
			  </div>
			</div>
			</div>
		  </form>

  </div> 
</div>

</section>	

		<section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 ftco-animate">
						<div class="row">
					<?php include_once 'db.php';
							$conn=connect();
					
							$sql = "SELECT * FROM blog";
							$result = $conn->query($sql);
							foreach ($result as $blog){
								
					?>
							<div class="col-md-12 d-flex ftco-animate">
		            <div class="blog-entry align-self-stretch d-md-flex">
		              <img href="blog-single.php" class="block-20" src = "images/blog/<?=$blog['image']?>">
		              <div class="text d-block pl-md-4">
		              	<div class="meta mb-3">
		                  <div><a href="#"><?=$blog['Date']?></a></div>
		                  
		                  
		                </div>
		                <h3 class="heading"><a href="#">Customer blog</a></h3>
		                <p><?=$blog['text']?></p>
		                <p><a href="blog_single.php?blog_id=<?php echo $blog['id'];?>" class="btn btn-primary py-2 px-3">Read more</a></p>
		              </div>
		            </div>
		          </div>
							<?php } ?> 
        </div>
      </div>
    </section> <!-- .section -->
	

	<section class="ftco-section ftco-degree-bg">
			</div>

    </section> <!-- .section -->

      <?php include_once 'template/footer.php';?>
   