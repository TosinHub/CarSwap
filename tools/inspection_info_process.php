<?php 



 
	$connect=new connection();
 	$connect->connectTodatabase();
	$connect->selectDatabase();


 if(isset($_POST['reserve'])){

	$name=$_POST['name'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$client_type= $_POST['client_type'];
	$date=$_POST['inspect_date'];
	$time=$_POST['inspect_time'];
	$code = rand(1, 300000);
	$request_date = date('l jS \of F Y h:i:s A');


 $query="INSERT INTO `reserve_information` (`reserve_id`,`name`,`phone` ,`email`,`request_date`,`inspect_date`,`inspection_time`,`type`,`code`,`user_session_id`) value(NULL,'".$name."','".$phone."','".$email."','".$request_date."','".$date."','".$time."','".$client_type."','".$code."','".session_id()."')";

$connect->insertion($query);
$reserveid=$connect->lastInsertId();


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
		$connect->insertion($querynew);	
			
		}
 

		$to = $email;
		$subject = "Car Swap Confirmation code!!!";
		$body ="Thanks for booking for a car swap. Kindly enter the code below to confirm your inspection
		\n";
		$body .="Reserve Code: <b>". $code. "</b>\n";
		$headers = 'From:admin@carswap.ng' . "\r\n";
		$headers.= "MIME-version: 1.0\n";
		$headers.= "Content-type: text/html; charset= iso-8859-1\n";
		mail($to, $subject, $body, $headers);

		$success = true;

 }
	


?>