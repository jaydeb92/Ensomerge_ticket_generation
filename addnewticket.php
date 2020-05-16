

<?php 
 include 'header.php';
  ?>

  <?php 


$sql = "SELECT MAX(ticket_no) as ticket FROM details";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$ticket=$row['ticket'];
$ticket1=++$ticket;


 ?>

 <!DOCTYPE html>
<html>
<head>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>
<style>
label {
    font-weight: normal !important;
}
  
</style>

<body>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add new Tickets</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item ">Add new Tickets</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <form action="general_data_input.php" method="post">
    <section class="content">
      <div class="container-fluid">

        <form role="form">

        <div class="row">
          <!-- left column -->
          <div class="col-md-4">
            <!-- general form elements -->
            <div class="card card-primary"> 
                <div class="card-body">
                  <div class="form-group">
                    <label>Ticket no</label>
                    <input type="text" class="form-control" name="ticketno" value="<?php echo $ticket1 ?>" />
                  </div>
                  <?php
                   $query = "SELECT * FROM book5 "; 
            $result = $conn->query($query);
            if($result->num_rows > 0){
              
                  ?>
                   <div class="form-group">
                    <label>Client name</label>
                    <strong style="color: red;">*</strong>

                    <select class="form-control" name="clientname" required>
                      <?php while($row = $result->fetch_assoc()){  ?>
                       
                      <option><?php echo $row['company'];}} ?></option>
                     
                    
                    </select>
                   
                  </div>

                      <div class="form-group">
		    <label>Reference received by</label>
                    <strong style="color: red;">*</strong>
                    <input type="text" class="form-control" name="reference" required>
                  </div>

                    <div class="form-group">
                    <label for="exampleInputPassword1">Discipline</label>
                     <strong style="color: red;">*</strong>
                    <select class="form-control" name="discipline" id="country" required>
                    <option></option> 
                    <option value="1">Human Resource</option>
                    <option value="2">Finance</option>
                    <option value="3">Operation team</option>
                   
                    <option value="4">IT</option>
                  

                  </select>
                  </div>

                   <div class="form-group">
                    <label>Request type</label>
                     <strong style="color: red;">*</strong>
          <select class="form-control" name="request_type" id="state">
                    <option value="" style="color: red"></option>  
                    

                  </select>


                  </div>
             
                  

                 
                </div>
                
                </div>
                </div>
               
                 
             
                <div class="col-md-4">
            <div class="card" >
                <div class="card-body">

                   <div class="form-group">
		    <label>Type of business</label>
                    <strong style="color: red;">*</strong>
                    <input type="text" class="form-control" name="typeofbusiness" required>
                  </div>


                       <div class="form-group">
                    <label>Request status</label>
                     <strong style="color: red;">*</strong>
                    <select class="form-control" name="requeststatus" required>
                      <option></option>
                    <option>On Hold</option>
                    <option>Pending Clarification - Client</option>
                    <option>Pending Clarification - Internal</option>
                    <option>Pending Clarification - SP</option>
                    <option>Delivered to Client</option>
                    <option>In Process</option>
                    <option>Not Started</option>
                    <option>Contract Yet to be Signed</option>
                    <option>Dead Lead</option>
                    <option>Prospect</option>
                    <option>JD not received</option>
                    <option>Yet to contact Client</option>
                    <option>Service denied by EM</option>
                    <option>Source Data Not received - On Hold</option>
                  </select>
                  </div>
              
                  
                  <div class="form-group">
                    <label>Ticket status</label>
                     <strong style="color: red;">*</strong>
                    <select class="form-control" name="recruitmentstatus"  required>
                    <option></option>
                    <option>On Going</option>
                    <option>Awaiting Information from Internal</option>
                    <option>Awaiting Information from Client</option>
                    <option>Offer Letter Rolled out</option>
                    <option>Offer Letter Pending</option>
                    <option>Candidates Acceptance</option>
                    <option>Candidates Rejection</option>
                    <option>Candidate On Board</option>
                    <option>Lost the Deal</option>
                    <option>Not Started</option>
                    <option>EM will not Continue - Client Issue</option>
                    <option>Resolved - Ticket Closed</option>
                    <option>Cannot be Worked - Ticket Closed</option>
                    <option>Yet to start</option>
                    <option>Sourcing in Process</option>
                    <option>JD Not received</option>
                    <option>Client T&C not suitable</option>
                    <option>CTC too low</option>
                    <option>EM Reject - Not Feasible</option>
                    <option>Not Applicable</option>
                  </select>
                  </div>
                 
                  
                  
                  <div class="form-group">
                    <label>Request updates</label>
                     <strong style="color: red;">*</strong>
                    <textarea class="form-control"  name="requestupdates" rows="5" required ></textarea>
                  </div>
                 
                 

                </div>
                <!-- /.card-body -->

                <!-- <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div> -->

                </div>
                </div>



                  <div class="col-md-4">
                  <div class="card" >
                <div class="card-body">
                  <div class="form-group">
                    <label>Expected time of completion request</label>
                     <strong style="color: red;">*</strong>
                    <input type="date" class="form-control" name="expectedtime" required>
                  </div>
                  <div class="form-group">
		    <label>Initial response date </label>
                     <strong style="color: red;">*</strong>
                    <input type="date" class="form-control" name="initialresponse" required>
                  </div>
                  
                  <?php
                   $query = "SELECT * FROM users "; 
            $result = $conn->query($query);
            if($result->num_rows > 0){
              
                  ?>
                   <div class="form-group">
                    <label>AU offshore owner </label>
                    <strong style="color: red;">*</strong>
                    <select class="form-control" name="auoffshore" required>
                      <?php while($row = $result->fetch_assoc()){  ?>
                        
                      <option><?php echo $row['username'];} }?></option>
                     
                    
                    </select>
                     
                   
                  </div>
                 


                  <div class="form-group">
		    <label for="exampleInputEmail1">EM SLA IMPACT </label>
                     <strong style="color: red;">*</strong>
                     <select class="form-control" name="emslaimpact" required>
                    <option></option>
                    <option>YES</option>
                    <option>NO</option>
                    <option>NA</option>
                  </select>
                  </div>

                   <div class="form-group">
		    <label>EM Documentation SLA IMPACT</label>
                    <strong style="color: red;">*</strong>
                    <select class="form-control" name="emdocumentation" required>
                    <option></option>
                    <option>YES</option>
                    <option>NO</option>
                    <option>NA</option>
                  </select>
                  </div>

                </div>
                
                </div>
                </div>

                <div class="col-md-4">
                <div class="card">
                </div>
                </div>


                  <div class="col-md-4">
                <div>
               <div>
                  <button type="submit" name="submit" class="btn btn-primary" style="margin-left: 100px;">Submit</button>
                </div>

                </div>
                </div>
                
               
              </form>
            </div>
          </section>
      </form>
</div>



<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
   <script src="typeahead.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

   <!-- Auto fill -->
  <!--  <script>
     $(document).ready(function(){
        $('input.typeahead').typeahead({
            name: 'typeahead',
            remote:'search.php?key=%QUERY',
                limit : 10
        });
    });
  </script> -->
  
 <script>
$(document).ready(function(){
    $('#country').on('change', function(){
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'country_id='+countryID,
                success:function(html){
                    $('#state').html(html);
                    
                }
            }); 
        }else{
            $('#state').html('<option value="">Select Discipline first</option>');
           
        }
    });
});
</script>   
   
</body>
</html>





    <?php 
include 'footer.php';
 ?>
