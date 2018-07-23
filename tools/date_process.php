<?php 
session_start();

include('../admin/includes/classes/classModulate.php');
 
	$connect=new connection();
 	$connect->connectTodatabase();
	$connect->selectDatabase();
	
 
$inspectDate=$_REQUEST['inspectDate'];

$queryreq="select * from reserve_timing ";
		$resultreq=$connect->retrieve($queryreq);
		$rowsreq=$connect->arrayFetch($resultreq);
		foreach($rowsreq as $rowreq){
			
			
			$queryres="select * from reserve_information where inspect_date='".$inspectDate."' and inspection_time='".$rowreq['reserve_time']."' ";
		$resultres=$connect->retrieve($queryres);
		$rowsres=$connect->arrayFetch($resultres);
		$num=$connect->numRows($resultres);
		
		if($num>0){ $num=' '.'disabled '.  'style="color:#ff0000;font-weight:bold"';}else{ $num="";}
			
		 echo'<option'.$num.' class="timeOption">'.$rowreq['reserve_time'].'</option>';
			
		}



?>