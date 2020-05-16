<?php include 'header.php'  ?>

<div class="content-wrapper">
<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fa fa-user"></i></span>

              <?php 
                   $sql="SELECT COUNT(company) AS client from book5";
                   $result=mysqli_query($conn,$sql);
                   ?>
                   <?php while($row = mysqli_fetch_array($result)) :
                    $client=$row['client'];
                    ?>
                    <?php endwhile ?> 


              <div class="info-box-content">
                <span class="info-box-text">Total no of clients</span>
                <span class="info-box-number">
                 <?php echo $client ; ?>
                  
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-ticket"></i></span>

              <?php 
                   $sql="SELECT COUNT(DISTINCT ticket_no) AS ticket from details";
                   $result=mysqli_query($conn,$sql);
                   ?>
                   <?php while($row = mysqli_fetch_array($result)) :
                    $ticket=$row['ticket'];
                    ?>
                    <?php endwhile ?> 

              <div class="info-box-content">
                <span class="info-box-text">Total no of tickets</span>
                <span class="info-box-number"><?php echo $ticket ; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fa fa-ticket"></i></span>

               <?php 
                   $sql="SELECT COUNT(DISTINCT recruitment_status) AS solved from details WHERE recruitment_status IN ('Offer Letter Rolled out' ,'Candidates Acceptance' , 'Candidates Rejection' , 'Lost the Deal' , 'Resolved - Ticket Closed' , 'Cannot be Worked - Ticket Closed' , 'EM Reject - Not Feasible' , 'Not Applicable')";
                   $result=mysqli_query($conn,$sql);
                   ?>
                   <?php while($row = mysqli_fetch_array($result)) :
                    $solved=$row['solved'];
                    ?>
                    <?php endwhile ?> 

              <div class="info-box-content">
                <span class="info-box-text">Total no of solved tickets</span>
                <span class="info-box-number"><?php echo $solved ; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-ticket"></i></span>

              <?php 
                   $sql="SELECT COUNT( recruitment_status) AS pending from details WHERE recruitment_status IN ('Awaiting Information from Internal','Awaiting Information from Client','Offer Letter Pending','Not Started','EM will not Continue - Client Issue','Yet to start','JD Not received','Client T&C not suitable','CTC too low')";
                   $result=mysqli_query($conn,$sql);
                   ?>
                   <?php while($row = mysqli_fetch_array($result)) :
                    $pending=$row['pending'];
                    ?>
                    <?php endwhile ?>

              <div class="info-box-content">
                <span class="info-box-text">Total no of pending tickets</span>
                <span class="info-box-number"><?php echo $pending ; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
      </div>
        <!-- /.row -->

    
       
        <div class="row">
          <!-- left column -->
          <div class="col-md-8">
            <!-- TABLE: LATEST ORDERS -->
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Latest Tickets Details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>Ticket no</th>
                      <th>AU offshore</th>
                  
                      <th>Client name</th>
                          <th>Ticket Status</th>
                    </tr>
                    </thead>
                    <tbody>

                        <?php
            /*$servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "ticket";*/

         
            // echo "Connected successfully";
             $sql="SELECT a.`ticket_no`,a.`au_officer`,b.`status`,a.`client_name` FROM details a,updates b WHERE b.`id` IN (SELECT MAX(b.`id`) FROM updates b GROUP BY ticket_no) AND a.`ticket_no`=b.`ticket_no` order by ticket_no desc limit 10 ";
            $result = $conn->query($sql);



          if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                            $ticket_no=$row['ticket_no'];
          ?> 
          <tr>
                        <td><?php echo "<a href='view.php?id=$ticket_no'>".$ticket_no."</a>" ; ?></td>

                        <td><?php echo $row['au_officer']; ?></td>

                         <td><button id="myBtnx" name="<?php echo $row['client_name'];?>" class="btn" data-modal="myModalx"><?php echo $row['client_name'];?></button></td>
                       
                    
                      
                           <?php
                           if ($row['status'] == 'Candidate On Board' || $row['status'] == 'Sourcing in Process' || $row['status'] == 'On Going') {
                          echo "<td> <span class='badge badge-warning'>".$row['status']."</span></td>";
                        }

                         else if ($row['status'] == 'Offer Letter Rolled out' or $row['status'] == 'Candidates Acceptance' or $row['status'] == 'Candidates Rejection' or $row['status'] == 'Lost the Deal' or $row['status'] == 'Resolved - Ticket Closed' or $row['status'] == 'Cannot be Worked - Ticket Closed' or $row['status'] == 'EM Reject - Not Feasible' or $row['status'] == 'Not Applicable' ) {
                          echo "<td> <span class='badge badge-success'>".$row['status']."</span></td>";

                        }
                        else
                        {
                          echo "<td> <span class='badge badge-info'>".$row['status']."</span></td>";                        }
                        
                      

            ?>

                        
                        
                        
          </tr> 
          <?php
            }
            }
          ?> 
                   
                  
                    
                      
                  
                   
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
               
                <a href="alltickt.php" class="btn btn-sm btn-info float-right">View All Tickets</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        

          

          

          <div class="col-md-4">
            <!-- PRODUCT LIST -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Pending tickets</h3>
              </div>
              <?php 
                   $sql="select username from users order by username asc";
                     $result=mysqli_query($conn,$sql);

                           while ($row=mysqli_fetch_array($result)) {
                                $row1[]=$row['username'];
                                 }
                               ?>

                     <!--  quer for pending tickets -->

                               <?php 
                   $sql="SELECT COUNT( recruitment_status) AS pending from details WHERE recruitment_status IN ('Awaiting Information from Internal','Awaiting Information from Client','Offer Letter Pending','Not Started','EM will not Continue - Client Issue','Yet to start','JD Not received','Client T&C not suitable','CTC too low') AND au_officer='$row1[0]' ";
                   $result=mysqli_query($conn,$sql);
                   ?>
                   <?php while($row = mysqli_fetch_array($result)) :
                    $pending=$row['pending'];
                    ?>
                    <?php endwhile ?>

                    <!-- for second user -->

                                <?php 
                   $sql="SELECT COUNT( recruitment_status) AS pending2 from details WHERE recruitment_status IN ('Awaiting Information from Internal','Awaiting Information from Client','Offer Letter Pending','Not Started','EM will not Continue - Client Issue','Yet to start','JD Not received','Client T&C not suitable','CTC too low') AND au_officer='$row1[1]'";
                   $result=mysqli_query($conn,$sql);
                   ?>
                   <?php while($row = mysqli_fetch_array($result)) :
                    $pending2=$row['pending2'];
                    ?>
                    <?php endwhile ?>


                    <!-- for third user -->

                                <?php 
                   $sql="SELECT COUNT( recruitment_status) AS pending3 from details WHERE recruitment_status IN ('Awaiting Information from Internal','Awaiting Information from Client','Offer Letter Pending','Not Started','EM will not Continue - Client Issue','Yet to start','JD Not received','Client T&C not suitable','CTC too low') AND au_officer='$row1[2]'";
                   $result=mysqli_query($conn,$sql);
                   ?>
                   <?php while($row = mysqli_fetch_array($result)) :
                    $pending3=$row['pending3'];
                    ?>
                    <?php endwhile ?>

                    <!-- for fourth user -->

                                <?php 
                   $sql="SELECT COUNT( recruitment_status) AS pending4 from details WHERE recruitment_status IN ('Awaiting Information from Internal','Awaiting Information from Client','Offer Letter Pending','Not Started','EM will not Continue - Client Issue','Yet to start','JD Not received','Client T&C not suitable','CTC too low') AND au_officer='$row1[3]'";
                   $result=mysqli_query($conn,$sql);
                   ?>
                   <?php while($row = mysqli_fetch_array($result)) :
                    $pending4=$row['pending4'];
                    ?>
                    <?php endwhile ?>

                    <!-- for fifth user -->

                                <?php 
                   $sql="SELECT COUNT( recruitment_status) AS pending5 from details WHERE recruitment_status IN ('Awaiting Information from Internal','Awaiting Information from Client','Offer Letter Pending','Not Started','EM will not Continue - Client Issue','Yet to start','JD Not received','Client T&C not suitable','CTC too low') AND au_officer='$row1[4]'";
                   $result=mysqli_query($conn,$sql);
                   ?>
                   <?php while($row = mysqli_fetch_array($result)) :
                    $pending5=$row['pending5'];
                    ?>
                    <?php endwhile ?>

                    <!-- for sixth user -->

                                <?php 
                   $sql="SELECT COUNT( recruitment_status) AS pending6 from details WHERE recruitment_status IN ('Awaiting Information from Internal','Awaiting Information from Client','Offer Letter Pending','Not Started','EM will not Continue - Client Issue','Yet to start','JD Not received','Client T&C not suitable','CTC too low') AND au_officer='$row1[5]'";
                   $result=mysqli_query($conn,$sql);
                   ?>
                   <?php while($row = mysqli_fetch_array($result)) :
                    $pending6=$row['pending6'];
                    ?>
                    <?php endwhile ?>




  

              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                  <li class="item">
                    <div class="product-img">
                      <img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                    </div>
                    <div class="product-info">
                      <a href="javascript:void(0)" class="product-title"><?php echo "<a href='pendingticket.php?username=$row1[0]'>".$row1[0]."</a>" ; ?>
                        <span class="badge badge-warning float-right"><?php echo $pending  ?></span></a>
                      <span class="product-description">
                        pending <b><?php echo $pending  ?></b> tickets
                      </span>
                    </div>
                  </li>
                  <!-- /.item -->
                  <li class="item">
                    <div class="product-img">
                      <img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                    </div>
                    <div class="product-info">
                      <a href="javascript:void(0)" class="product-title"><?php echo "<a href='pendingticket.php?username=$row1[1]'>".$row1[1]."</a>" ; ?>
                        <span class="badge badge-info float-right"><?php echo $pending2  ?></span></a>
                      <span class="product-description">
                         pending <b><?php echo $pending2  ?></b> tickets
                      </span>
                    </div>
                  </li>
                  <!-- /.item -->
                  <li class="item">
                    <div class="product-img">
                      <img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                    </div>
                    <div class="product-info">
                      <a href="javascript:void(0)" class="product-title">
                        <?php echo "<a href='pendingticket.php?username=$row1[2]'>".$row1[2]."</a>" ; ?> <span class="badge badge-danger float-right">
                        <?php echo $pending3  ?>
                      </span>
                      </a>
                      <span class="product-description">
                         pending <b><?php echo $pending3  ?></b> tickets
                      </span>
                    </div>
                  </li>
                  <!-- /.item -->
                  <li class="item">
                    <div class="product-img">
                      <img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                    </div>
                    <div class="product-info">
                      <a href="javascript:void(0)" class="product-title"><?php echo "<a href='pendingticket.php?username=$row1[3]'>".$row1[3]."</a>" ; ?>
                        <span class="badge badge-success float-right"><?php echo $pending4 ?></span></a>
                      <span class="product-description">
                        pending <b><?php echo $pending4  ?></b> tickets
                      </span>
                    </div>
                  </li>
                  <!-- /.item -->

                    <li class="item">
                    <div class="product-img">
                      <img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                    </div>
                    <div class="product-info">
                      <a href="javascript:void(0)" class="product-title">
                        <?php echo "<a href='pendingticket.php?username=$row1[4]'>".$row1[4]."</a>" ; ?> <span class="badge badge-danger float-right">
                        <?php echo $pending5  ?>
                      </span>
                      </a>
                      <span class="product-description">
                         pending <b><?php echo $pending5  ?></b> tickets
                      </span>
                    </div>
                  </li>

                  <li class="item">
                    <div class="product-img">
                      <img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                    </div>
                    <div class="product-info">
                      <a href="javascript:void(0)" class="product-title"><?php echo "<a href='pendingticket.php?username=$row1[5]'>".$row1[5]."</a>" ; ?>
                        <span class="badge badge-success float-right"><?php echo $pending6  ?></span></a>
                      <span class="product-description">
                        pending <b><?php echo $pending6  ?></b> tickets
                      </span>
                    </div>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
              <div class="card-footer text-center">
                <a href="allpendingtickets.php" class="uppercase">View All Pending Ticket</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>

         </div>
          
        </div>

      </section>
    </div>
       


  <?php include 'footer.php'  ?>
