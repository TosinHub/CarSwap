<?php
session_start();
ob_start();

include('admin/includes/classes/classModulate.php');

$connect =new connection();
 	$connect->connectTodatabase();
	$connect->selectDatabase();

//  Developed by Robinson Agaga 
//  This notice MUST stay intact for legal use



if(isset($_GET['status']) && $_GET['status']="return"){
	
	
	$query="select * from requirements where user_session_id='".session_id()."'";
		$result=$connect->retrieve($query);
		$rows=$connect->arrayFetch($result);
		foreach($rows as $row){
		$path="admin/cars/".$row['filename'];		
		unlink($path);
			
		}
		
	$query="delete from requirements where user_session_id='".session_id()."'";
	$connect->insertion($query);
	header("location: ./"); 
	exit;
}



if(isset($_GET['statusii']) && $_GET['statusii']="return"){

	$query="select * from requirements where user_session_id='".session_id()."'";
		$result=$connect->retrieve($query);
		$rows=$connect->arrayFetch($result);
		foreach($rows as $row){
		$path="admin/cars/".$row['filename'];		
		unlink($path);
			
		}
		
	$query="delete from requirements where user_session_id='".session_id()."'";
	$connect->insertion($query);
	
		
	$query="delete from new_car_swap where user_session_id='".session_id()."'";
	$connect->insertion($query);
	$query="delete from swap_estimates where user_session_id='".session_id()."'";
	$connect->insertion($query);
	$query="delete from estimated_price where user_session_id='".session_id()."'";
	$connect->insertion($query);
	header("location:session_destroy"); 
	exit;
}

?>