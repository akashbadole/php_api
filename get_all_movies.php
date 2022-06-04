<?php

header('Content-Type: application/json');

require_once 'connection.php';

$response = array();
$stmt = $connect->prepare("SELECT * FROM movies"); // mysal statement/query

$stmt->execute();

if($stmt->execute()){
//statement was executer successfully

// this array stores all of the result
$movies = array();

//get all results from db
$result = $stmt->get_result();

/// loop and get each single row
while($row = $result->fetch_array(MYSQLI_ASSOC)){
// ["title"=>"joker", "storyline"=>"this...."]

$movies[] = $row;

}
$response['error'] = false; // this is no error
$response['movies'] = $movies; 
$response['message'] = "movies return successfully";
$stmt->close();

}else{
// we have an error
$response['error']=true;
$response['message']="could not execute query ...";



}


//display result
echo json_encode($response);



?>
