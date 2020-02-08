<?php include_once 'template/header.php';?>
	
      <?php include_once 'template/nav.php';?>
	  <?php
if(!isset($_SESSION['loggedin'])){
    echo "<script type='text/javascript'>
    window.location.href = 'user_login.php';
</script>";
}

?>
    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Blog</span></p>
            <h1 class="mb-0 bread">Single Blog</h1>
          </div>
        </div>
      </div>
    </div>

		<section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
		<?php 

			if(isset($_GET['blog_id'])){
			$blog_id=$_GET['blog_id'];
		}
		
		include_once 'db.php';
		$conn=connect();

		$sql = "SELECT * FROM blog WHERE id=$blog_id";
		$result = $conn->query($sql);
			foreach ($result as $single){
				$_SESSION['Blog_Id'] = $single['id'];
		?>
          <div class="col-lg-8 ftco-animate">
            <p>
              <img src="images/blog/<?=$single['image']?>" alt="" class="img-fluid">
            </p>
            <p><?=$single['text']?></p>
   
			<?php } ?>
            <div class="pt-5 mt-5">
        
              <ul class="comment-list">
                <li class="comment">
			<?php 

				$sql = "SELECT * FROM comment WHERE Blog_Id = $blog_id";
				$result = $conn->query($sql);
					foreach ($result as $comment){
					
				?>
                  <div class="comment-body">
                    <h3><?php echo $comment['Name']?></h3>
                    <div class="meta"><?=$comment['Date']?></div>
                    <p><?=$comment['Text']?></p>
                    
                  </div>
					<?php } ?>
                </li>
              </ul>
              <!-- END comment-list -->
              
              <div class="comment-form-wrap pt-5">
                <h3 class="mb-5">Leave a comment</h3>
				<form action="comment.php" method="POST">
					<div class="form-group input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"> <i class="fa fa-user"></i> </span>
						 </div>
						  <input name="cname" class="form-control" placeholder="Full name" type="text">
					  </div> <!-- form-group// -->

					   <!-- form-group// -->
					  <div class="form-group input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
						 </div>
						  <input name="cemail" class="form-control" placeholder="Email address" type="email">
					  </div> <!-- form-group// -->

					   <!-- form-group// -->
					  <div class="form-group input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"> <i class="fa fa-lock"></i> </span>
						</div>
						  <!-- <input class="form-control" name="ccomment" placeholder="Type here your comment" type="text"> -->
						  <textarea name="ccomment" class="form-control" placeholder="Type here your comment" cols="30" rows="3"></textarea>
					  </div> <!-- form-group// -->
					  <div class="form-group">
						  <button type="submit" class="btn btn-primary btn-block">Submit your comment</button>
					  </div> <!-- form-group// -->
      
				</form>
                
              </div>
            </div>
          </div> <!-- .col-md-8 -->
          

        </div>
      </div>
    </section> <!-- .section -->

      <?php include_once 'template/footer.php';?>
    
  </body>
</html>