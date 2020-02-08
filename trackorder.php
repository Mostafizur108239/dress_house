<?php include_once 'template/header.php';?>
	

	    <?php include_once 'template/nav.php';?>
	    
	    <?php
if(isset($_GET['delevered'])){
  $id = $_GET['delevered'];
  $query = "UPDATE tbl_order SET status='2' WHERE id='$id'";
  $result = $conn->query($query);

}
?>

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Track Order</span></p>
            
          </div>
        </div>
      </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="container">
		
		        
		   
			<table class="table">
  <thead>
    <tr>
      <th scope="col">sl no</th>
      <th scope="col">Product Name</th>
      <th scope="col">Quentity</th>
      <th scope="col">Price</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
   <?php
      $id = $_SESSION['uId'];
      $query = "SELECT * FROM tbl_order WHERE cid='$id'";
      $result = $conn->query($query);
      if($result){
          $i=0;
          while($re=$result->fetch_assoc()){
              $i++;
      ?>
    <tr>
      <th scope="row"><?php echo $i;?></th>
      <td><?php echo $re['pname'];?></td>
      <td><?php echo $re['quentity'];?></td>
      <td><?php echo $re['total'];?></td>
      <td><?php 
          if($re['status']==0){
              echo "Waiting for Shift";
          }elseif($re['status']==1){?>
             <a class="btn btn-primary" href="?delevered=<?php echo $re['id'];?>">Got It</a>
        <?php  }else{
          echo "DONE";
        }
          ?></td>
     
     
    </tr>
    <?php }}?>
    
  </tbody>
</table>
       
		</div>
            </div>
        </div>
    </div>

   <?php include_once 'template/footer.php';?>
 