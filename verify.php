<?php
include 'includes/header.php';
$connect=new connection();



        $stmt = $conn->prepare("SELECT * FROM reserve_information WHERE user_session_id ='".session_id()."' ");
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
                if($row['code'] == $_POST['code']){
                    $stmt = $conn->prepare("UPDATE  reserve_information SET 	status = 1								  
								  WHERE user_session_id ='".session_id()."' ");

		if($stmt->execute()){

 
         $stmt = $conn->prepare("SELECT * FROM own_car WHERE user_session_id='".session_id()."' AND reserve_id='".$_POST['reserve_id']."'");
         $stmt->execute();
         $row1 = $stmt->fetch(PDO::FETCH_ASSOC);
         $stmt = $conn->prepare("SELECT * FROM swap_to WHERE user_session_id='".session_id()."' AND reserve_id='".$_POST['reserve_id']."'");
         $stmt->execute();
         $row2 = $stmt->fetch(PDO::FETCH_ASSOC);


         $Email_message='';
		$to = $row['email'];
		$subject = 'Car Swap Alert';

		$Email_message ="Hi ".ucwords($row['name']).", "."Welcome to www.carswap.ng. We are processing your request to swap your car\n"; 
        $Email_message .="<u>Your Car Detail</u>\n ";
		
		
		//foreach($rows as $row){
		$Email_message .="Brand:'".ucwords($connect->getbrand($row1['brand_id']))."'</u>\n ";
		$Email_message .="Model:'".$connect->getmodel($row1['model_id'])."'</u>\n ";
		$Email_message .="Accident Status:'".$row1['accident']."'</u>\n ";
		$Email_message .="Gear Type:'".$row1['gear_type']."'</u>\n ";
		$Email_message .="Estimated Value:'".$connect->getestimatedValueofYourcarEmailcalc($_POST['reserve_id'])."'</u>\n ";
		//}
		
		$Email_message ="<u>You are swaping to</u>\n ";
		//foreach($rows2 as $row2){
		$Email_message .="Brand:'".ucwords($connect->getbrand($row2['brand_id']))."'</u>\n ";
		$Email_message .="Model:'".$connect->getmodel($row2['model_id'])."'</u>\n ";
		$Email_message .="Condition:'".$row2['condition']."'</u>\n ";
		$Email_message .="Gear Type:'".$row2['gear_type']."'</u>\n ";
		$Email_message .="Color:'".$row2['color']."'</u>\n ";
		$Email_message .="Estimated Value:'".$connect->getestimatedValueofcaryouwantEmailCalc($_POST['reserve_id'])."'</u>\n ";
		//}
		//foreach($rows3 as $row3){
		$Email_message .="Request Date:'".$row['request_date']."'</u>\n ";
		$Email_message .="Your car Inspection date is:'".$row['inspect_date']."' at '".$row['inspection_time']."'</u>\n ";
		//}
		$headers = 'From:admin@carswap.ng' . "\r\n";
		$headers.= "MIME-version: 1.0\n";
		$headers.= "Content-type: text/html; charset= iso-8859-1\n";
        mail($to, $subject, $Email_message, $headers);


        $stmt = $conn->prepare("DELETE FROM  requirements WHERE user_session_id ='".session_id()."' ");
	 	$stmt->execute();  
        $stmt = $conn->prepare("DELETE FROM  new_car_swap WHERE user_session_id ='".session_id()."' ");
        $stmt->execute();
		
		session_regenerate_id(true);
		session_regenerate_id();
		
		$message = "Your car swap request is successful. Kindly check your email for the details, we would contact you shortly";
		header("Location:verification?message=$message");
        }else{
			$message = "Sorry, something went wrong, try again later.!";
			header("location:verification?message=$message");
        }

    }else{
		$message = "The code you entered is incorrect,please try again!";
		header("location:verification?message=$message");
    }


		
