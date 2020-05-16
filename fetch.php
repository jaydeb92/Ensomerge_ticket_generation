<?php
// include('db.php');
// include('function.php');
// $query = '';
// $output = array();
// $query .= "SELECT * FROM book5 ";
// if(isset($_POST["search"]["value"]))
// {
// 	$query .= 'WHERE company LIKE "%'.$_POST["search"]["value"].'%" ';
// 	$query .= 'OR id LIKE "%'.$_POST["search"]["value"].'%" ';
// }
// if(isset($_POST["order"]))
// {
// 	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
// }
// // else
// // {
// // 	$query .= 'ORDER BY id DESC ';
// // }
// // if($_POST["length"] != -1)
// // {
// // 	$query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
// // }
// $statement = $connection->prepare($query);
// $statement->execute();
// $result = $statement->fetchAll();
// $data = array();
// $filtered_rows = $statement->rowCount();
// foreach($result as $row)
// {
// 	// $image = '';
// 	// if($row["image"] != '')
// 	// {
// 	// 	$image = '<img src="upload/'.$row["image"].'" class="img-thumbnail" width="50" height="35" />';
// 	// }
// 	// else
// 	// {
// 	// 	$image = '';
// 	// }
// 	$sub_array = array();
// 	$sub_array[] = $row['id'];
// 	$sub_array[] = '<button type="button" name="update" id="'.$row["id"].'" class="btn update">'.$row['company'].'</button>';
// 	$sub_array[] = $row["city"];
// 	$sub_array[] = $row["State/Territory"];
// 	$sub_array[] = $row["country"];
// 	// $sub_array[] = '<button type="button" name="update" id="'.$row["id"].'" class="btn btn-warning btn-xs update">Update</button>';
// 	// $sub_array[] = '<button type="button" name="delete" id="'.$row["id"].'" class="btn btn-danger btn-xs delete">Delete</button>';
// 	$data[] = $sub_array;
// }
// $output = array(
// 	"data"	=>	$data
// );
// // print_r ($output);
// echo json_encode($output);
?>