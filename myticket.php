<?php
  include 'header.php';
  session_start();
  include 'config.php';
  
  if ($_SESSION['username'] == true) {
    echo "";
  } else {
    header('location:index.php');
  }
  
  
  
  // $username = $_SESSION['username'];
?>

<html>
	<head>
		<title>Client Details</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="modal.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
		<!-- <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script> -->
		<!-- <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>		 -->
		<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" /> -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

	</head>
	<body>
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>My tickets</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item ">My tickets</li>
            </ol>
          </div>
         
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
          <!-- /.col -->
        
        <!-- /.row -->
        
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card" style="height: 380px;">
              
              <!-- /.card-header -->
        <div class="card-body table-responsive p-0" style="height: 380px;">
				
			  <table class="table table-head-fixed text-nowrap" id="user_data">
					<thead>
						<tr>
							<th width="20%">ID</th>
							<th width="30%" style="padding: 6px 0px 10px 36px;">COMPANY NAME</th>
							<th width="10%">Request Update</th>
							<th width="20%">Open Date</th>
                            <th width="10%">Ticket status</th>
                            <th width="10%">Opening Day</th>
						</tr>
					</thead>
					
                                            <?php
                                                $servername = "localhost";
  						$username = "root";
  						$password = "";
						$dbname = "ticket";
				
						// Create connection
						$conn = new mysqli($servername, $username, $password, $dbname);

						// Check connection
						if ($conn->connect_error) {
    						die("Connection failed: " . $conn->connect_error);
            }
            
            $username = $_SESSION['username'];
						// echo "Connected successfully";
						$sql = "SELECT * FROM details WHERE au_officer='$username'";
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {
    					// output data of each row
    					while($row = $result->fetch_assoc()) {
					?> 
					<tr>
                    <th scope="row"><a href="statusofticket1.php? a=<?php echo $row['ticket_no']; ?>"><?php echo $row['ticket_no']; ?></a></th>
						<td><button id="myBtnx" name="<?php echo $row['client_name'];?>" class="btn" data-modal="myModalx"><?php echo $row['client_name'];?></button></td>
						<td><?php echo $row['request_status']; ?></td>
                        <td><?php echo $row['request_on']; ?></td>
                        <?php 
                        $id=$row['ticket_no'];
                $sql2="SELECT * FROM updates WHERE ticket_no = '$id' ";
                $result2 = $conn->query($sql2);
                 if($result2->num_rows> 0){
                     $sql="SELECT a.`ticket_no`, b.`status` FROM details a,updates b WHERE b.`id` IN (SELECT MAX(b.`id`) FROM updates b GROUP BY ticket_no) AND a.`ticket_no`=b.`ticket_no` AND b.`ticket_no`='$id' ";
                    $result1 = mysqli_query($conn, $sql);
                    $row1 = mysqli_fetch_assoc($result1);
                    $status=$row1['status'];
                  }
                  else 
                  {
                   $status= $row['recruitment_status'];
                  }
?> 
		      <td> <?php echo $status; ?></td>
                        <td>
                            <?php  
                                $d1= $row['request_on'];
                                $date = date("Y-m-d h:i:s");
                                $diff = abs(strtotime($date) - strtotime($d1));
                                $days    = floor(($diff)/ (60*60*24));
                                echo $days+1;
                            ?>
                        </td>
					</tr>	
					<?php
						}
						}
					?>

				</table>
				</div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
</div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->





  
	</body>
</html>
<?php
	include 'footer.php';
?>


<!-- The Modal -->
<div id="myModalx" class="modalx">

  <!-- Modal content -->
  <div class="modalx-content">
    <div class="modalx-header">
    <span class="closex">&times;</span>
        <h3 id="modalx-text" class="y"></h3>
      
      
    </div>
    <div class="modalx-body">
        <table width="100%">
            <tr> 
                <td width="50%">
                    <label>GST Registration Type:</label><br>
                    <div id="GST" class="x"></div>
                </td>
                <td>
                    <label>GSTIN:</label><br>
                    <div id="GSTIN" class="x"></div>
                </td>
                <tr>
                    <td colspan="2">
                        <label>Street Address:</label><br>
                        <div id="address" class="x"></div>
                    </td>
                </tr>
                <tr>
                    <td class="bor">
                        <label>Phone:</label><br>
                        <div id="phones" class="x"></div>
                    </td>
                    <td style="border-bottom: none;">
                        <label>Email:</label><br>
                        <div id="emails" class="x"></div>
                    </td>
                </tr>
            </tr>
        </table>
    </div>
    <div class="modalx-footer">
      
    </div>
  </div>

</div>

<script type="text/javascript" language="javascript" src="modal.js">
      
</script>







