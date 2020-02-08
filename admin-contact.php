<?php include_once 'template/header.php';?>
<?php include_once 'template/nav.php';?>

    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">

	       
<div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">admin contact</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      
                          
                          <th>Name</th>
                          <th>email</th>
                          <th>subject</th>
                          <th>message</th>
                         
                      
                      
                    </thead>
                    <tbody>
                      <?php
                    
                          
                            $query = "SELECT * FROM contact";
                            $result = $conn->query($query);
                            foreach ( $result AS $msg){
                    ?>
                        <tr>
                         
                          <td><?php echo $msg['name'] ?></td>
                          <td><?php echo $msg['email'] ?></td>
                          <td><?php echo $msg['subject'] ?></td>
                          <td><?php echo $msg['message'] ?></td>
                          
                         
							<?php } ?>
                          
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