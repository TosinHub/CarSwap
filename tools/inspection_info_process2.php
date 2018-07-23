<?php 
session_start();

include('../admin/includes/classes/classModulate.php');
 
	$connect=new connection();
 	$connect->connectTodatabase();
	$connect->selectDatabase();
 
	$name=$_REQUEST['name'];
	$phone=$_REQUEST['phone'];
	$email=$_REQUEST['email'];
	$client_type= "company";
	$date=$_REQUEST['inspectDate'];
	$time=$_REQUEST['inspectTime'];


 $query="INSERT INTO `reserve_information` (`reserve_id`,`name`,`phone` ,`email`,`inspect_date`,`inspection_time`,`type`,`user_session_id`) value(NULL,'".$name."','".$phone."','".$email."','".$date."','".$time."','".$client_type."','".session_id()."')";
// inserting information into database
$connect->insertion($query);
$reserveid=$connect->lastInsertId();

/////////////////// send email to client here //////////////////////////////////////////////////////////////////////////////////////////
    $connect->carswapMailtoClient($email,$name,$connect->lastInsertId());

$queryreq="select * from requirements where user_session_id='".session_id()."'";
		$resultreq=$connect->retrieve($queryreq);
		$rowsreq=$connect->arrayFetch($resultreq);
		foreach($rowsreq as $rowreq){
			
		 $queryown="INSERT INTO `own_car` (`own_car_id`,`user_session_id`,`year` ,`brand_id`,`model_id`,`accident`,`gear_type`,`filename`,`request_date`,`reserve_id`) value(NULL,'".session_id()."','".$rowreq['year']."','".$rowreq['brand_id']."','".$rowreq['model_id']."','".$rowreq['accident']."','".$rowreq['gear_type']."','".$rowreq['filename']."','".$rowreq['request_date']."','".$reserveid."')";
// inserting information into database
$connect->insertion($queryown);	
			
		}

$querynew="select * from new_car_swap where user_session_id='".session_id()."'";
		$resultnew=$connect->retrieve($querynew);
		$rowsnew=$connect->arrayFetch($resultnew);
		foreach($rowsnew as $rownew){
			
		$querynew="INSERT INTO `swap_to` (`swap_to_id`,`user_session_id`,`year` ,`brand_id`,`model_id`,`gear_type`,`condition`,`color`,`reserve_id`) value(NULL,'".session_id()."','".$rownew['year']."','".$rownew['brand_id']."','".$rownew['model_id']."','".$rownew['gear_type']."','".$rownew['condition']."','".$rownew['color']."','".$reserveid."')";
// inserting information into database
		$connect->insertion($querynew);	
			
		}
 
	$querydelreq="delete from requirements where user_session_id='".session_id()."'";
	$connect->insertion($querydelreq);
	
	$querydelnew="delete from new_car_swap where user_session_id='".session_id()."'";
	$connect->insertion($querydelnew);	
	
	/////////////////// send email to Admin here //////////////////////////////////////////////////////////////////////////////////////////
	 $connect->carswapMailtoAdmin($email,$name,$connect->lastInsertId());




?>