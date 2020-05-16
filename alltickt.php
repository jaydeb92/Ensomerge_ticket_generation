
<?php 
 include 'header.php';
  ?>

 
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All Tickets</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item ">All Tickets</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<section class="content-header">
<div class="container-fluid">
<div class="row">
          <div class="col-12">
            <div class="card" style="height: 30rem;">
             
              <div class="card-body table-responsive p-0" style="height: 300px; ">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>Ticket no</th>
                      <th>Client name</th>
                      <th>Request status</th>
                      <th>Discipline</th>
                      <th>Request type</th>
                      <th>Recruitment status</th>
                      <th>AU offshore owner</th>
                      <th>Request update</th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php 

                   $conn=mysqli_connect("localhost","root","","ticket");
                   $sql="SELECT a.`ticket_no`,a.`client_name`,a.`request_status`,a.`discipline`,a.`request_type`,b.`updates`,a.`au_officer`,a.`request_update` FROM details a,updates b WHERE b.`id` IN (SELECT MAX(b.`id`) FROM updates b GROUP BY ticket_no) AND a.`ticket_no`=b.`ticket_no`  ";
                   //$sql="";
                   $result=mysqli_query($conn,$sql);
                   ?>
                   <?php while($row = mysqli_fetch_array($result)) :
                   $ticket_no=$row['ticket_no'];
                    ?>
                   
                  <tr>
                    <td><?php echo "<a href='view.php?id=$ticket_no'>".$ticket_no."</a>" ; ?></td>
                    
                    <td><?php echo $row['client_name']; ?></td>
                     <td><?php echo $row['request_status']; ?></td>
                     <td><?php echo $row['discipline']; ?></td>
                     <td><?php echo $row['request_type']; ?></td>
                      <td><?php echo $row['updates']; ?></td>
                      <td><?php echo $row['au_officer']; ?></td>
                      <td><?php echo $row['request_update']; ?></td> 

                  </tr>
               <?php endwhile ?>
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>

      </div>
   
  </div>
    </section>





    <?php 
include 'footer.php';
 ?>