<?php

    $connect =new connection();
 	$connect->connectTodatabase();
	$connect->selectDatabase();
	
if(isset($_POST['submit'])){
	
	$Filename = $_FILES['filename']['name'];
	$type = $_FILES['filename']['type'];
	$size = $_FILES['filename']['size'];
	$file_cv =$connect-> random(20);
	$ext_cv = substr(strrchr($Filename, "."), 1); 
	
	
	if(($ext_cv =="jpeg") || ($ext_cv =="jpg")||($ext_cv =="JPG") || ($ext_cv =="JPEG")||($ext_cv =="png") || ($ext_cv =="gif")){
	$name = $connect->random(20).md5($_FILES['filename']['tmp_name']);
	$ext = substr(strrchr($_FILES['filename']['name'], "."), 1);
	$path = "admin/cars/".$name.".".$ext;
	move_uploaded_file($_FILES['filename']['tmp_name'],$path);
	$carImage = $name.".".$ext;
	$date=date('d-M-Y');
	
	$querysub="insert into `requirements` (`require_id`, `user_session_id`, `brand_id`, `year`, `model_id`, `accident`, `gear_type`, `filename`,`request_date`) VALUES (NULL,'".session_id()."', '".$_POST['brand1_id']."', '".$_POST['year1']."','".$_POST['model1_id']."','". $_POST['accident']."','".$_POST['gear_type1']."','".$carImage."','".$date."')";
	if($connect->insertion($querysub)){	

	$querysub="insert into `new_car_swap` (`new_car_id`, `user_session_id`, `brand_id`, `model_id`, `gear_type`, `year`, `condition`, `color`) VALUES (NULL,'".session_id()."', '".$_POST['brand2_id']."', '".$_POST['model2_id']."','".$_POST['gear_type2']."','".$_POST['year2']."','".$_POST['condition']."','".$_POST['color']."')";
    if($connect->insertion($querysub)){
		
		header('location:inspection');
	}
	
    }

	}	
			
}



if(isset($_POST['addinfo'])){
	
	
	
	
	$querysub="insert into `new_car_swap` (`new_car_id`, `user_session_id`, `brand_id`, `model_id`, `gear_type`, `year`, `condition`, `color`) VALUES (NULL,'".session_id()."', '".$_POST['brand2_id']."', '".$_POST['model2_id']."','".$_POST['gear_type2']."','".$_POST['year2']."','".$_POST['condition']."','".$_POST['color']."')";
    if($connect->insertion($querysub)){
		
		header('location:inspection');
	}

	
	
			
}


if(isset($_POST['updateinfo'])){
	
	
	
	
	$querysub="update `new_car_swap`  set 
	`brand_id`='".$_POST['brand2_id']."' ,
	`model_id`='".$_POST['model2_id']."', 
	`gear_type` ='".$_POST['gear_type2']."', 
	`year` ='".$_POST['year2']."', 
	`condition`='".$_POST['condition']."', 
	`color`='".$_POST['color']."' where user_session_id='".session_id()."'";
    if($connect->insertion($querysub)){
		
		header('location:inspection');
	}

	
	
			
}

	?>