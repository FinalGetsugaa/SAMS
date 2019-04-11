<?php



	$host="localhost";
	$dbName="vivek";
	$user="root";
	$pass="1234";

	$link=new mysqli($host,$user,$pass,$dbName);

	if($link){
		//echo "connection establish successfully";
	}else{
		echo "error";
	}




 ?>
