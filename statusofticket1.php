

<?php 
 include 'header.php';
 $a = $_GET['a'];
 echo $a;
  ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Status of Ticket</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item ">Status of Ticket</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->

         <form action="" method="post">
      <section class="content">
      <div class="container-fluid">
       <div class="row">

        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary"> 
                <div class="card-body">

      
      <div class="form-group">
                    <label>Ticket Stutus</label>
                    <!-- <input type="text" class="form-control" name="Stutus"> -->
                    <strong style="color: red;">*</strong>
                    <select class="form-control" name="Stutus"  required>
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
                    <label>updates</label>
                   <!--  <input type="text" class="form-control" name="updates"> -->
                    <strong style="color: red;">*</strong>
       <textarea class="form-control"  name="updates" rows="5" required ></textarea>
       </div>

              <div class="col-md-4">
                <div>
               <div>
                  <button type="submit" name="submit" class="btn btn-primary" >Submit</button>
                </div>

                </div>
                
                </div>
                </div>

      
            </div>
          </section>
      </form>

<?php 
  if (isset($_POST['submit']))
  {

    $Stutus = $conn -> real_escape_string($_POST['Stutus']);
    $update =$conn -> real_escape_string( $_POST['updates']);
    $date = date("Y-m-d h:i:s");

    $que = ("INSERT INTO `updates`(`date`, `status`, `updates`, `ticket_no`) VALUES ('$date','$Stutus','$update','$a')");
     mysqli_query($conn,$que);
  }

?>



    <?php 
include 'footer.php';
 ?>