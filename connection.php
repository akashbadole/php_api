<?php
// error_reporting(0);

// echo "this is my c0nnection";
// getting db credentials
$db_name="phpapi";
$mysql_username="root";
$mysql_pass="";
$server_name="localhost";

$connect = mysqli_connect($server_name, $mysql_username, $mysql_pass, $db_name);

if(!$connect){
	echo '{"message":"Unable to connect to database"}';
} else{
	//echo "connected successfully";
}





/*

1. Get 
2. insert
3. Update
4. Delete

*/






?>