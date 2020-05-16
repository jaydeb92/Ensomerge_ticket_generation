<?php
    $key=$_GET['key'];
    $array = array();
    $con=mysqli_connect('10.128.0.9','rajni','rajni136@@','ticket');
    $query=mysqli_query($con, "select * from  cmpany_details where company_name LIKE '%{$key}%'");
    while($row=mysqli_fetch_assoc($query))
    {
      $array[] = $row['company_name'];
    }
    echo json_encode($array);
    mysqli_close($con);
?>
