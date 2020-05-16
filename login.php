<?php
$conn=mysqli_connect("localhost","root","","ticket");



session_start();

if (isset($_POST['submit']))
        {     
    //$conn=mysqli_connect('localhost:3306','Ensomerge','*ensomerge*','users');

          
          //include 'config.php';

    
    $username=$_POST['username'];
    $password=$_POST['password'];
    //$name=$_POST['name'];
    $query = mysqli_query($conn,"SELECT * FROM  users WHERE username='$username' and password='$password'");
    
     if (mysqli_num_rows($query) != 0)
    {
     echo "<script language='javascript' type='text/javascript'> location.href='dashboard.php' </script>"; 
     $_SESSION['username']=$username;
      }
      else
      {
        echo '<script type="text/javascript">'; 
        echo 'alert("Username or password Invalid");'; 
        echo 'window.location.href = "index.php";';
        echo '</script>';

      }
    }

    ?>