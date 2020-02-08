<?php include "template/header.php"?>
<?php include "template/nav.php"?>
      
     
    
     
      
      <div class="content mt-5 mb-5">
        <div class="row">
          
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">All Users</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        Name
                      </th>
                      <th>
                        Email
                      </th>
                      <th>
                        Phone
                      </th>
                      <th>
                        Address
                      </th>
                   
                    </thead>
                    <tbody>
                     <?php
                      if(isset($_GET['id'])){
                        $id = $_GET['id'];
                       
                   
                        $query="SELECT * FROM users WHERE id='$id'";
                        $result = $conn->query($query);
                        if($result){
                            while($res = $result->fetch_assoc()){
                                
                        ?>
                      <tr>
                        <td>
                          <?php echo $res['name'] ?>
                        </td>
                        <td>
                            <?php echo $res['email'] ?>
                        </td>
                        <td>
                            <?php echo $res['phone'] ?>
                        </td>
                        <td>
                            <?php echo $res['address'] ?>
                        </td>
                      
                      </tr>
                <?php 
                            } }
                        }?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          
          
        </div>
      </div>
      <?php include 'template/footer.php' ?>
                 

                 
                 
                 
     