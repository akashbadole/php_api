<?php

header('Content-Type: application/json');

require_once 'connection.php';

$response = array();


if(isset($_GET['id'])){

// go ahead and get the movie
	$id = $_GET['id']; // get request parameter, which has the title

	$stmt=$connect->prepare("SELECT id, title, storyline, lang, genre, release_date, box_office, run_time, stars  FROM movies WHERE id=?");
	$stmt->bind_param("i", $id);
	if($stmt->execute()){
		//success
		$stmt->bind_result($id,$title,$storyline,$lang,$genre,$release_date,$box_office,$run_time,$stars);
		$stmt->fetch();

		$movie = array(

			'id'=>$id,
			'title'=>$title,
			'storyline'=>$storyline,
			'lang'=>$lang,
			'genre'=>$genre,
			'release_date'=>$release_date,
			'box_office'=>$box_office,
			'run_time'=>$run_time,
			'stars'=>$stars
		);

		$response['error']=false;
		$response['movie']=$movie;
		$response['message']='movie has been returned successfully';
		$response['response_code']=200; // success response code


	}else{
		//failure
		$response['error']=true;
		$response['message']="we could not get the movie";
	}


}else{
//no movie title was provided, we cannot get the movie
$response['error']=true;
$response['message']="please provide movie title";
$response['response_code']=400; // Failure response code

}

echo json_encode($response);





?>
