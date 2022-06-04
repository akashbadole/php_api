<?php

header('Content-Type: application/json');

require_once 'connection.php';

$response = array();

// get id
if(isset($_POST['id']) && isset($_POST['storyline']) && isset($_POST['stars']) && isset($_POST['box_office'])){

	//move on and update movie
	$id = $_POST['id'];
	$storyline = $_POST['storyline'];
	$stars = $_POST['stars'];
	$box_office = $_POST['box_office'];

	$stmt = $connect->prepare("UPDATE movies SET storyline='$storyline', stars='$stars', box_office='$box_office' WHERE id='$id'");

	if($stmt->execute()){

		//success
		$response['error']=false;
		$response['message']="Movie has been updated successfully";

	}else{
		//failure
		$response['error']=true;
		$response['message']="failed to update";

	}


}else{

	$response['error']=true;
	$response['message']="please provide us with id, storyline, box office, and stars";

}

echo json_encode($response);

?>