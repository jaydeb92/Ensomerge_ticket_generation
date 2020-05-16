<?php 
// Include the database config file 
include_once 'config.php'; 
 
if(!empty($_POST["country_id"])){ 
    // Fetch state data based on the specific country 
    $query = "SELECT * FROM book1 WHERE type = ".$_POST['country_id']." "; 
    $result = $conn->query($query); 
     
    // Generate HTML of state options list 
    if($result->num_rows > 0){ 
        echo '<option value="">Select Request type</option>'; 
        while($row = $result->fetch_assoc()){  
            echo '<option value="'.$row['Request Type'].'">'.$row['Request Type'].'</option>'; 
        } 
    }else{ 
        echo '<option value="">not available</option>'; 
    } 
}
?>