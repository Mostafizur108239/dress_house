<?php include_once 'template/header.php';?>
<?php include_once 'template/nav.php';?>

    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
           <?php 
          
    if(isset($_GET['shifted'])){
        $id = $_GET['shifted'];
        $query = "UPDATE tbl_order SET status='1' WHERE id='$id'";
        $result = $conn->query($query);
        if($result){
             echo "<p class='text-success text-center'>Product Is Shifting..</p>";
              $pd= $_SESSION['pid'];
               $qt= $_SESSION['qty'];
             $pqq = "SELECT * FROM product WHERE id='$pd'";
             $pddr=$conn->query($pqq);
             if($pddr){
               while($prr = $pddr->fetch_assoc()){
                 $pdtq = $prr['quet'];
                 $dttt =$pdtq - $qt;
                $qs="UPDATE product SET quet='$dttt' WHERE id='$pd'";
                $conn->query($qs);
               }
             }
           
        }
    }
    if(isset($_GET['delete'])){
      $id = $_GET['delete'];
                    $query = "DELETE FROM tbl_order WHERE id='$id'";
                    
                    $result = $conn->query($query);
                    if($result){
                        echo "<p class='text-success text-center'>Product Deleted Successfully</p>"; 
                     
                    }
    }
          
          ?>
	       
<div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">All Orders</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      
                          <th>Sl No</th>
                          <th>Product Name</th>
                          <th>Quantity</th>
                          <th>Price</th>
                          <th>Address</th>
                          <th>Status</th>
                          <th>Action</th>
                      
                      
                    </thead>
                    <tbody>
                      <?php
                    
                          
                            $query = "SELECT * FROM tbl_order";
                            $result = $conn->query($query);
                            if($result){
                                $i = 0;
                               while($res = $result->fetch_assoc()){
                                   $i++;
                                  $_SESSION['pid']=$res['pid'];
                                  $_SESSION['qty']=$res['quentity'];
                                  
                                  
                    ?>
                        <tr>
                          <th><?php echo $i; ?></th>
                          <td><?php echo $res['pname'] ?></td>
                          <td><?php echo $res['quentity'] ?></td>
                          <td><?php echo $res['total'] ?></td>
                          <td><a href="cmaddress.php?id=<?php echo $res['cid'] ?>">Show</a></td>
                         
                         
                          <td>
                           <?php if($res['status']==0){  echo "Ordered";
                           }elseif($res['status']==1){
                             echo "Shifting"; 
                             }else{echo "Shifted";  }?>
                          </td>

                          <td>
                           <?php if($res['status']==0){ ?>
                          <a class="btn btn-warning" href="?shifted=<?php echo $res['id'] ?>">Shift</a>
                          <?php }elseif($res['status']==1){?>
                           <a class="btn btn-warning" href="">Waiting</a>
                           <?php }else{?>
                              <a class="btn btn-danger" href="?delete=<?php echo $res['id'] ?>">Delete</a>
                           <?php }?>
                          </td>
                        </tr>
                    <?php }}else{
                                 echo("Error description: " . mysqli_error($conn));
                            }?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>



          </div> <!-- .col-md-8 -->
        </div>
      </div>
    </section>


<?php include_once 'template/footer.php';?>