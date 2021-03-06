<?php

header('Content-Type: application/json');

require_once 'connection.php';

$response = array();

// provide movie id
if( isset($_POST['id']) ){
	//move on and delete the movie
	$id = $_POST['id'];
	$stmt = $connect->prepare("DELETE FROM movies WHERE id=? LIMIT 1");
	$stmt->bind_param('i',$id);

	if($stmt->execute()){
		//success
		$response['error']=false;
		$response['message']="movie deleted successfully";
		$response['response_code']=204; // no content but success response code

	}else{
		//failure
		$response['error']=true;
		$response['message']="movie data not remove";
		$response['response_code']=400; // failure response code


	}



}else{
	//we can not deleted movie because we dont know which ovie to delete
			//failure
		$response['error']=true;
		$response['message']="Please provide the movie id";

}


echo json_encode($response);


?>