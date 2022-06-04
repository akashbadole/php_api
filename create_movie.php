<?php

header('Content-Type: application/json');

require_once 'connection.php';

$response = array();


//$id,$title,$storyline,$lang,$genre,$release_date,$box_office,$run_time,$stars


//$id created by the db

if(isset($_POST['title']) && isset($_POST['storyline']) && isset($_POST['lang']) && isset($_POST['genre']) && isset($_POST['release_date']) && isset($_POST['box_office']) && isset($_POST['run_time']) && isset($_POST['stars'])){

// Store parameters in variables
	$title=$_POST['title'];
	$storyline=$_POST['storyline'];
	$lang=$_POST['lang'];
	$genre=$_POST['genre'];
	$release_date=$_POST['release_date'];
	$box_office=$_POST['box_office'];
	$run_time=$_POST['run_time'];
	$stars = $_POST['stars'];

//we have all parameters
		$stmt = $connect->prepare("INSERT INTO movies (title, storyline, lang, genre, release_date, box_office, run_time, stars) VALUES (?,?,?,?,?,?,?,?)");

		$stmt->bind_param('sssssdsd',$title,$storyline,$lang,$genre,$release_date,$box_office,$run_time,$stars);


// execute

		if($stmt->execute()){
			//success

			$response['error']=false;
			$response['message']="Movie inserted successfully";
			$response['response_code']=201; // created - success

			$stmt->close();

		}else{
			//error
			$response['error']=true;
			$response['message']="Failed to inserted to the database";

		}

}else{
// we cannot insert a movies that doesnt have all of this info
	$response['error']=true;
	$response['message']="Please provide all parameters";
	$response['response_code']=400; // Failure response code

}

echo json_encode($response);


?>