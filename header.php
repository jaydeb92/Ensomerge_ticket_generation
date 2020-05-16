

 <?php
session_start();
include 'config.php';

if ($_SESSION['username'] == true) {
  echo "";
} else {
  header('location:index.php');
}



$username = $_SESSION['username'];



?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ensomerge</title>
  <link rel="icon" type="image/png" href="dist/img/ensomerge.png" />
  
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<style>
.active { background-color: #007bff; }


</style>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    
 <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fa fa-bars"></i></a>
      </li>
    

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          
          <span class="label label-pill label-danger count" style="border-radius:10px;"></span> <span class="fa fa-bell" style="font-size:18px; margin-left:920px"></span>
        </a>
        
      </li>

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="logout.php">
          <i class="fa fa-power-off" style="font-size:20px;"></i>
       
        </a>
        
          
          
   
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Brand Logo -->
    <a href="index.html" class="brand-link">
      <img src="dist/img/ensomerge.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Ensomerge</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/demo.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $username; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav>
        <div id="sub-header">
        <ul class="nav nav-pills nav-sidebar flex-column"  >
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item has-treeview menu-open">
            <a  href="dashboard.php" class="nav-link">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
               Dashboard
             </p>
            </a>
          </li>

          <li class="nav-item">
            <a  href="alltickt.php" class="nav-link">
              <i class="nav-icon fa fa-ticket"></i>
              <p>
                All Ticket
                
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="myticket.php" class="nav-link">   
              <i class="nav-icon fa fa-ticket"></i>
              <p>
                My Ticket
               
              </p>
            </a>
          </li>

          <!-- <li class="nav-item">
            <a href="statusofticket.php" class="nav-link">
              
              <p>
                Status of Tickets
               
              </p>
            </a>
          </li> -->

          <li class="nav-item">
            <a href="addnewticket.php" class="nav-link">
              <i class="nav-icon fa fa-ticket"></i>
              <p>
                Add New Tickets
               
              </p>  
            </a>
          </li>

          <li class="nav-item">
            <a href="clientdetails.php" class="nav-link">
              <i class="nav-icon fa fa-user"></i>
              <p>
                Client Details
               
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="logout.php" class="nav-link">
             <i class="nav-icon fa fa-power-off"></i>
              <p>
               Logout
                
              </p>
            </a>
          </li>

        </div> 

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
<script src="plugins/jquery/jquery.min.js"></script>
<!-- for toggling -->
<script src="dist/js/adminlte.min.js"></script>

<script>

$(function(){
    // this will get the full URL at the address bar
    var url = window.location.href; 

    // passes on every "a" tag 
    $("#sub-header a").each(function() {
            // checks if its the same on the address bar
        if(url == (this.href)) { 
            $(this).closest("li").addClass("active");
        }
    });
});
  
  
</script>
