<?php
include('db.php');
// include('function.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM book5 
		WHERE company = '".$_POST["user_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["company"] = $row["company"];
		$output["GST"] =$row["GST Registration Type"];
		$output["GSTIN"]= $row["GSTIN"];
		$output["email"] = $row["email"];
		$output["address"] = $row["Street Address"];
		// if($row["image"] != '')
		// {
		// 	$output['user_image'] = '<img src="upload/'.$row["image"].'" class="img-thumbnail" width="50" height="35" /><input type="hidden" name="hidden_user_image" value="'.$row["image"].'" />';
		// }
		// else
		// {
		// 	$output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';
		// }
	}
	echo json_encode($output);
}
?>