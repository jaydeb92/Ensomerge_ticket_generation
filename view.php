
<?php
include 'header.php' ;
 ?>


 <style>
   .float-right{
    margin-right: 20px;
   
   }
 </style>



<div class="content-wrapper">

	<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>View Tickets</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item ">View Tickets</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <?php
    $id=$_GET['id'];
     ?>


    <section class="content-header">
      <div class="container-fluid">

  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">

       <?php 
                   $sql="SELECT a.`ticket_no`,a.`request_on`,a.`client_name`,a.`request_status`,a.`discipline`,a.`request_type`,b.`updates`,a.`au_officer`,a.`request_update` FROM details a,updates b WHERE b.`id` IN (SELECT MAX(b.`id`) FROM updates b GROUP BY ticket_no) AND a.`ticket_no`=b.`ticket_no` AND b.`ticket_no`='$id'   ";
                   $result=mysqli_query($conn,$sql);
                   ?>
                   <?php while($row = mysqli_fetch_array($result)) :
                   $ticket_no=$row['ticket_no'];
                    ?> 

      <div class="col-12">
        <h5 class="page-header">
           <b>Ticket NO:</b> <td><?php echo $ticket_no; ?></td>
          <small class="float-right"><h5> <b>Date:</b> <td><?php echo $row['request_on'];  ?></td><br></h5></small>
        </h5>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->

     
              
                  
                    

    <div class="row invoice-info">


    	     
                     
      


      	

                   
        <div class="col-sm-4 invoice-col">
        <address>
         
         <b>Client Name:</b><td><?php echo $row['client_name']; ?></td><br>
           <b>Request Status:</b><td><?php echo $row['request_status']; ?></td><br>
           <b>Recruitment Status:</b><td><?php echo $row['updates']; ?></td><br>
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <address>
          <b>Discipline:</b> <td><?php echo $row['discipline']; ?></td><br>
          <b>Request Type:</b><td><?php echo $row['request_type']; ?></td><br>
           
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <address>
          <b>AU offshore owner:</b> <td><?php echo $row['au_officer']; ?></td><br>
           <b>Request update:</b><td><?php echo $row['request_update']; ?></td><br>
        </address>
      </div>
<?php endwhile ?>
     
      <!-- /.col -->
    </div>
    <!-- /.row -->
</div>

   
 


    <!-- Table row -->
    <div class="row">
      <div class="col-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
          
            <th>Date</th>
            <th>Updates</th>
          </tr>
          </thead>
          <tbody>

          	<?php 
                   $sql="SELECT date,updates FROM updates WHERE ticket_no='$id' ORDER BY date DESC";
                   $result=mysqli_query($conn,$sql);
                   ?>
                   <?php while($row = mysqli_fetch_array($result)) : ?>
 
                    
                   
                  <tr>
                    
                     <td><?php echo $row['date']; ?></td>
                     <td><?php echo $row['updates']; ?></td>
                     </tr>
               <?php endwhile ?>
          
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    
      
   


</section>
</div>

<!-- <script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script> -->













  <?php
include 'footer.php' ;
 ?>










