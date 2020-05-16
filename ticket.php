<?php 
// Create connection
$conn = mysqli_connect('10.128.0.9','rajni','rajni136@@','ticket');
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT MAX(ticket_no) as ticket FROM details";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$ticket=$row['ticket'];
$ticket1=++$ticket;


 ?>

 <?php 
 include 'header.php';
  ?>
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>General Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item ">General Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <form role="form">

        <div class="row">
          <!-- left column -->
          <div class="col-md-4">
            <!-- general form elements -->
            <div class="card card-primary">
             <!--  <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div> -->
              <!-- /.card-header -->
              <!-- form start -->
              
                <div class="card-body">
                  <div class="form-group">
                    <label>Ticket no</label>
                    <input type="text" class="form-control" name="ticketno" value="<?php echo $ticket1 ?>" />
                  </div>
                   <div class="form-group">
                    <label>Client name</label>
                    <input type="text" class="form-control" name="clientname" />
                  </div>
                  <div class="form-group">
                    <label>Request status</label>
                    <select class="form-control" name="requeststatus">
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
                    <label>Reference received by</label>
                    <input type="text" class="form-control" name="reference">
                  </div>
                   <div class="form-group">
                    <label>Type of business</label>
                    <input type="text" class="form-control" name="typeofbusiness">
                  </div>
                   <div class="form-group">
                    <label for="exampleInputPassword1">Discipline</label>
                    <select class="form-control" name="discipline">
                    <option>Human Resource</option>
                    <option>Contact Center</option>
                    <option>BPO</option>
                    <option>Others</option>
                  </select>
                  </div>
                 
                </div>
                <!-- /.card-body -->

                <!-- <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div> -->

                </div>
                </div>
               
                 
             
                <div class="col-md-4">
            <div class="card" style="height:35rem;">
                <div class="card-body">
                  <div class="form-group">
                    <label>Client contact person</label>
                    <input type="text" class="form-control" name="clientcontactperson">
                  </div>
                  <div class="form-group">
                    <label>Client contact details</label>
                    <input type="text" class="form-control" name="clientcontactdetails">
                  </div>
                  <div class="form-group">
                    <label>Recruitment status</label>
                    <select class="form-control" name="recruitmentstatus">
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
                    <label>Requested on</label>
                    <input type="datetime-local" class="form-control" name="requestedon">
                  </div>
                  
                  
                  <div class="form-group">
                    <label>Request updates</label>
                    <textarea class="form-control"  name="requestupdates" ></textarea>
                  </div>
                  <div class="form-group">
                    <label>Request type</label>
                    <input type="text" class="form-control" name="recruitmentstatus">
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
                    <input type="datetime-local" class="form-control" name="expectedtime">
                  </div>
                  <div class="form-group">
                    <label>Initial response date </label>
                    <input type="date" class="form-control" name="initialresponse">
                  </div>
                  <div class="form-group">
                    <label>Expected time of completion request </label>
                    <input type="datetime-local" class="form-control" name="expectedtimeofcompletion">
                  </div>
                   <div class="form-group">
                    <label>AU offshore owner </label>
                    <input type="text" class="form-control" name="auoffshore">
                  </div>
                 
                  <div class="form-group">
                    <label for="exampleInputEmail1">EM SLA IMPACT </label>
                     <select class="form-control" name="emslaimpact">
                    <option></option>
                    <option>YES</option>
                    <option>NO</option>
                    <option>NA</option>
                  </select>
                  </div>

                   <div class="form-group">
                    <label>EM Documentation SLA IMPACT</label>
                    <select class="form-control" name="emdocumentation">
                    <option></option>
                    <option>YES</option>
                    <option>NO</option>
                    <option>NA</option>
                  </select>
                  </div>

                   
                  
                  
                </div>
                <!-- /.card-body -->

                <!-- <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div> -->

                </div>
                </div>

                <div class="col-md-4">
                <div class="card">
                </div>
                </div>


                  <div class="col-md-4">
                <div>
               <div>
                  <button type="submit" class="btn btn-primary" style="margin-left: 100px;">Submit</button>
                </div>

                </div>
                </div>
                
               
              </form>
            </div>
          </section>
      </div>
</body>
</html>

<?php 
include 'footer.php';
 ?>
