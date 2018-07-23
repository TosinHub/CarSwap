<?php 

class connection{
	
	var $db='swap';
	var $localhost='localhost';
	var $password='123';
	var $username='root';
	var $connect;
	var $database;

	
	public function connectTodatabase(){
		
		
		$con=mysqli_connect($this->localhost,$this->username,$this->password);
		if(!$con){ echo'can not connect to database';}
		else{
		 $this->connect=$con;
		
		}
		
		 return $this->connect;
		}
		
		
		public function selectDatabase(){
			
		return	$this->database=mysqli_select_db($this->connect,$this->db);
			
			
			
		}
	
	
	 public function insertion($query){
		 
		$result=mysqli_query($this->connect,$query)or die("MySQL error: " . mysqli_error($this->connect) . "<hr>\nQuery: $query");
		
		return $result;
		 $this->closeDatabase();
		 
	 }
	 
	  public function retrieve($query){
		 
		$result=mysqli_query($this->connect,$query)or die("MySQL error: " . mysqli_error($this->connect) . "<hr>\nQuery: $query");
		
		return $result;
		 $this->closeDatabase();
		 
	 }
	 
	 public function arrayFetch($result){
		$arraycontent=array();
		while( $contents=mysqli_fetch_array($result)){
			$arraycontent[]=$contents;
			
		}
		return $arraycontent;
		 }
	 
	  public function lastInsertId(){
		 
		$id=mysqli_insert_id($this->connect);
		 
		 
		 return $id;
	 }
	 
	 
	 
	 public function numRows($query){
		 
		$num=mysqli_num_rows($query);
		 
		 return $num;
	 }
	 
	 function random($lenght){
	$characters = "1234567890";
	$name = "";
	for($i = 0; $i< $lenght; $i++){
		$name.= $characters[mt_rand(0, strlen ($characters) - 1)];
	}
	return $name;
}
	 
	
	
function  ShowAvailableTime(){
	$connection =new connection();
	$connection->connectTodatabase();
	$connection->selectDatabase();
	$output="";
	$array1=array();
	$array2=array();
	$diff=array();
	
	$querytime="SELECT * from `reserve_information`  where inspect_date='".date('m/d/Y')."' ";
	$resulttime=$connection->retrieve($querytime);
	$rowstime=$connection->arrayFetch($resulttime);
	
	$querytimereal="SELECT reserve_time from `reserve_timing`";
	$resulttimereal=$connection->retrieve($querytimereal);
	$rowstimereal=$connection->arrayFetch($resulttimereal);
	
	
	foreach($rowstime as $rowtime){
	
	$output.='<option>'.print_r($rowtime).'</option>';
	
	
	}
	//foreach($rowstimereal as $rowtimereal){
	//	$output.='<option>'.$rowtimereal['reserve_time'].'</option>';
	//}
	
	return $output;
}	
	
	
	function getestimatedValueofYourcar(){
		$connection =new connection();
		$connection->connectTodatabase();
		 $connection->selectDatabase();
	$output="";
	$query_car="SELECT model_id,brand_id,gear_type,year from `requirements`  where user_session_id='".session_id()."' ";
	$result_car=$connection->retrieve($query_car);
	$rows_car=$connection->arrayFetch($result_car);
	 foreach($rows_car as $row_car){
		 
		 $query_brand= "SELECT * from `car_details`  where brand_id='".$row_car['brand_id']."' and model_id='".$row_car['model_id']."' and gear_type='".$row_car['gear_type']."' and year='".$row_car['year']."'";
		$result_brand=$connection->retrieve($query_brand);
		$rowsbrand=$connection->arrayFetch($result_brand);
		
		foreach($rowsbrand as $rowbrand){
			
			if($rowbrand['used_price'] < 500000){
			$lessprice=$rowbrand['used_price'];
			}else{
			$lessprice=$rowbrand['used_price']-500000;
			}
			$highprice=$rowbrand['used_price']+500000;
		$output.="₦ ".number_format($lessprice)."-"." ₦".number_format($highprice);
		}
		}
		
		return $output;
	}
	
	
	
	
	function getestimatedValueofcaryouwant(){

	$connection =new connection();
		$connection->connectTodatabase();
		 $connection->selectDatabase();
	$output="";
	$num="";
	$query_car="SELECT * from `new_car_swap`  where user_session_id='".session_id()."' ";
	$result_car=$connection->retrieve($query_car);
	$rows_car=$connection->arrayFetch($result_car);
	 foreach($rows_car as $row_car){
		 
		 $query_brand= "SELECT * from `car_details`  where brand_id='".$row_car['brand_id']."' and model_id='".$row_car['model_id']."' and gear_type='".$row_car['gear_type']."' and year='".$row_car['year']."'";
		$result_brand=$connection->retrieve($query_brand);
		$rowsbrand=$connection->arrayFetch($result_brand);
		
		foreach($rowsbrand as $rowbrand){
			if($row_car['condition']=='Used'){
				$num=$rowbrand['used_price'];
			}
			else{
				$num=$rowbrand['new_price'];
				
			}
			
			if($rowbrand['used_price'] < 500000){
			$lessprice=$rowbrand['used_price'];
			}else{
			$lessprice=$num-500000;
			}
			
			
			
			
			$highprice=$num+500000;
		$output.="₦".number_format($lessprice)."-"." ₦".number_format($highprice);
		}
		}
		
		return $output;
	}
	
	
	
	function clientcarInfo(){
		$connection =new connection();
		$connection->connectTodatabase();
		 $connection->selectDatabase();
	$output="";
	$query_car="SELECT model_id,brand_id,gear_type,year from `requirements`  where user_session_id='".session_id()."' ";
	$result_car=$connection->retrieve($query_car);
	$rows_car=$connection->arrayFetch($result_car);
	 foreach($rows_car as $row_car){
		 
		 $query_brand= "SELECT * from `car_details`  where brand_id='".$row_car['brand_id']."' and model_id='".$row_car['model_id']."' and gear_type='".$row_car['gear_type']."' and year='".$row_car['year']."'";
		$result_brand=$connection->retrieve($query_brand);
		$rowsbrand=$connection->arrayFetch($result_brand);
		
		foreach($rowsbrand as $rowbrand){
			$output.=$rowbrand['used_price'];
			
			
		}
		}
		
		return $output;
	}
	
	
	function toswapCarInfo(){

	$connection =new connection();
		$connection->connectTodatabase();
		 $connection->selectDatabase();
	$output="";
	$num="";
	$query_car="SELECT * from `new_car_swap`  where user_session_id='".session_id()."' ";
	$result_car=$connection->retrieve($query_car);
	$rows_car=$connection->arrayFetch($result_car);
	 foreach($rows_car as $row_car){
		 
		 $query_brand= "SELECT * from `car_details`  where brand_id='".$row_car['brand_id']."' and model_id='".$row_car['model_id']."' and gear_type='".$row_car['gear_type']."' and year='".$row_car['year']."'";
		$result_brand=$connection->retrieve($query_brand);
		$rowsbrand=$connection->arrayFetch($result_brand);
		
		foreach($rowsbrand as $rowbrand){
			if($row_car['condition']=='Used'){
				$output=$rowbrand['used_price'];
			}
			else{
				$output=$rowbrand['new_price'];
				
			}
			
			
			
			
			
			
			
		}
		}
		
		return $output;
	}
	
	
	function billmesage(){
		$connection =new connection();
		$connection->connectTodatabase();
		 $connection->selectDatabase();
		
		
		$calc = $connection->clientcarInfo() - $connection->toswapCarInfo();
		if($connection->toswapCarInfo()>= $connection->clientcarInfo()){
		$output.="You are Upgrading so you will be paying".number_format($calc);	
			
		}
		else{
			
		$output.="You are Downgrading so you will be paid".number_format($calc*-1);	
			
		}
	
		return $output;
	}
	
	public function carswapMailtoClient($val1,$val2,$val3){
		 $connect=new connection();
		 $connect->connectTodatabase();
		 $connect->selectDatabase();
		 $query="select * from own_car where user_session_id='".session_id()."' and reserve_id='".$val3."'";
		 $result=$connect->retrieve($query);
		 $row=$connect->arrayFetch($result);
		 
		 $query2="select * from swap_to where user_session_id='".session_id()."' and reserve_id='".$val3."'";
		 $result2=$connect->retrieve($query2);
		 $rows2=$connect->arrayFetch($result2);
		 
		 $query3="select * from reserve_information where reserve_id='".$val3."'";
		 $result3=$connect->retrieve($query3);
		 $rows3=$connect->arrayFetch($result3);
		 
		
		$Email_message='';
		$to = $val1;
		$subject = 'Car Swap Alert';

		$Email_message ="Hi ".ucwords($val2).", "."Welcome to www.carswap.ng. We are processing your request to swap your car\n"; 
        $Email_message .="<u>Your Car Detail</u>\n ";
		
		
		//foreach($rows as $row){
		$Email_message .="Brand:'".ucwords($connect->getbrand($row['brand_id']))."'</u>\n ";
		$Email_message .="Model:'".$connect->getmodel($row['model_id'])."'</u>\n ";
		$Email_message .="Accident Status:'".$row['accident']."'</u>\n ";
		$Email_message .="Gear Type:'".$row['gear_type']."'</u>\n ";
		$Email_message .="Estimated Value:'".$connect->getestimatedValueofYourcarEmailcalc($val3)."'</u>\n ";
		//}
		
		$Email_message ="<u>You are swaping to</u>\n ";
		//foreach($rows2 as $row2){
		$Email_message .="Brand:'".ucwords($connect->getbrand($row2['brand_id']))."'</u>\n ";
		$Email_message .="Model:'".$connect->getmodel($row2['model_id'])."'</u>\n ";
		$Email_message .="Condition:'".$row2['condition']."'</u>\n ";
		$Email_message .="Gear Type:'".$row2['gear_type']."'</u>\n ";
		$Email_message .="Color:'".$row2['color']."'</u>\n ";
		$Email_message .="Estimated Value:'".$connect->getestimatedValueofcaryouwantEmailCalc($val3)."'</u>\n ";
		//}
		//foreach($rows3 as $row3){
		$Email_message .="Request Date:'".$row3['request_date']."'</u>\n ";
		$Email_message .="Your car Inspection date is:'".$row3['inspect_date']."' at '".$row3['inspection_time']."'</u>\n ";
		//}
		$headers = 'From:admin@carswap.ng' . "\r\n";
		$headers.= "MIME-version: 1.0\n";
		$headers.= "Content-type: text/html; charset= iso-8859-1\n";
		mail($to, $subject, $Email_message, $headers);
		
		
		}
		
		
		public function carswapMailtoAdmin($val1,$val2,$val3){
		 $connect=new connection();
		 $connect->connectTodatabase();
		 $connect->selectDatabase();
		 $query="select * from own_car where user_session_id='".session_id()."' and reserve_id='".$val3."'";
		 $result=$connect->retrieve($query);
		 $row=$connect->arrayFetch($result);
		 
		 $query2="select * from swap_to where user_session_id='".session_id()."' and reserve_id='".$val3."'";
		 $result2=$connect->retrieve($query2);
		 $rows2=$connect->arrayFetch($result2);
		 
		 $query3="select * from reserve_information where reserve_id='".$val3."'";
		 $result3=$connect->retrieve($query3);
		 $rows3=$connect->arrayFetch($result3);
		 
		
		$Email_message='';
		$to = 'swap@carswap.com';
		$subject = 'Car Swap Alert';

		$Email_message ="Hello, a customer with name ".ucwords($val2)." and email " .$val1." "." has requested to swap his/her car. Bellow are the details\n"; 
        $Email_message ="<u>Car Detail</u>\n ";
		
		
		foreach($rows as $row){
		$Email_message ="Brand:'".ucwords($connect->getbrand($row['brand_id']))."'</u>\n ";
		$Email_message ="Model:'".$connect->getmodel($row['model_id'])."'</u>\n ";
		$Email_message ="Accident Status:'".$row['accident']."'</u>\n ";
		$Email_message ="Gear Type:'".$row['gear_type']."'</u>\n ";
		$Email_message ="Estimated Value:'".$connect->getestimatedValueofYourcarEmailcalc($val3)."'</u>\n ";
		}
		
		$Email_message ="<u>Swaping to</u>\n ";
		foreach($rows2 as $row2){
		$Email_message ="Brand:'".ucwords($connect->getbrand($row2['brand_id']))."'</u>\n ";
		$Email_message ="Model:'".$connect->getmodel($row2['model_id'])."'</u>\n ";
		$Email_message ="Condition:'".$row2['condition']."'</u>\n ";
		$Email_message ="Gear Type:'".$row2['gear_type']."'</u>\n ";
		$Email_message ="Color:'".$row2['color']."'</u>\n ";
		$Email_message ="Estimated Value:'".$connect->getestimatedValueofcaryouwantEmailCalc($val3)."'</u>\n ";
		}
		foreach($rows3 as $row3){
		$Email_message ="Request Date:'".$row3['request_date']."'</u>\n ";
		$Email_message ="Car Inspection date is:'".$row3['inspect_date']."' at '".$row3['inspecttion_time']."'</u>\n ";
		}
		$headers = 'From:admin@carswap.ng' . "\r\n";
		$headers.= "MIME-version: 1.0\n";
		$headers.= "Content-type: text/html; charset= iso-8859-1\n";
		mail($to, $subject, $Email_message, $headers);
		
		
		}
		
		
	
	function toswapCarInfoEmailCac(){

	$connection =new connection();
		$connection->connectTodatabase();
		 $connection->selectDatabase();
	$output="";
	$num="";
	$query_car="SELECT * from `swap_to`  where user_session_id='".session_id()."' ";
	$result_car=$connection->retrieve($query_car);
	$rows_car=$connection->arrayFetch($result_car);
	 foreach($rows_car as $row_car){
		 
		 $query_brand= "SELECT * from `car_details`  where brand_id='".$row_car['brand_id']."' and model_id='".$row_car['model_id']."' and gear_type='".$row_car['gear_type']."' and year='".$row_car['year']."'";
		$result_brand=$connection->retrieve($query_brand);
		$rowsbrand=$connection->arrayFetch($result_brand);
		
		foreach($rowsbrand as $rowbrand){
			if($row_car['condition']=='Used'){
				$output=$rowbrand['used_price'];
			}
			else{
				$output=$rowbrand['new_price'];
				
			}
			
			
			
			
			
			
			
		}
		}
		
		return $output;
	}
	
	
	function clientcarInfoEmailCalc(){
		$connection =new connection();
		$connection->connectTodatabase();
		 $connection->selectDatabase();
	$output="";
	$query_car="SELECT model_id,brand_id,gear_type,year from `own_car`  where user_session_id='".session_id()."' ";
	$result_car=$connection->retrieve($query_car);
	$rows_car=$connection->arrayFetch($result_car);
	 foreach($rows_car as $row_car){
		 
		 $query_brand= "SELECT * from `car_details`  where brand_id='".$row_car['brand_id']."' and model_id='".$row_car['model_id']."' and gear_type='".$row_car['gear_type']."' and year='".$row_car['year']."'";
		$result_brand=$connection->retrieve($query_brand);
		$rowsbrand=$connection->arrayFetch($result_brand);
		
		foreach($rowsbrand as $rowbrand){
			$output.=$rowbrand['used_price'];
			
			
		}
		}
		
		return $output;
	}
	
	function  getbrand($val){
	$connection =new connection();
	$connection->connectTodatabase();
	$connection->selectDatabase();
	$output="";
	$querytime="SELECT * from `car_brand`  where id='".$val."' ";
	$resulttime=$connection->retrieve($querytime);
	$rowstime=$connection->arrayFetch($resulttime);
	foreach($rowstime as $rowtime){
	
	$output.=$rowtime['brand_name'];
	
	
	}
	
	return $output;
}	
	
function  getmodel($val){
	$connection =new connection();
	$connection->connectTodatabase();
	$connection->selectDatabase();
	$output="";
	$querymodel="SELECT * from `car_model`  where id='".$val."' ";
	$resultmodel=$connection->retrieve($querymodel);
	$rowsmodel=$connection->arrayFetch($resultmodel);
	foreach($rowsmodel as $rowmodel){
	
	$output.=$rowmodel['model_name'];
	
	
	}
	
	return $output;
}		
	
	
	
	
	function getestimatedValueofcaryouwantEmailCalc($id){

	$connection =new connection();
		$connection->connectTodatabase();
		 $connection->selectDatabase();
	$output="";
	$num="";
	$query_car="SELECT * from `swap_to`  where user_session_id='".session_id()."' and reserve_id='".$id."' ";
	$result_car=$connection->retrieve($query_car);
	$rows_car=$connection->arrayFetch($result_car);
	 foreach($rows_car as $row_car){
		 
		 $query_brand= "SELECT * from `car_details`  where brand_id='".$row_car['brand_id']."' and model_id='".$row_car['model_id']."' and gear_type='".$row_car['gear_type']."' and year='".$row_car['year']."'";
		$result_brand=$connection->retrieve($query_brand);
		$rowsbrand=$connection->arrayFetch($result_brand);
		
		foreach($rowsbrand as $rowbrand){
			if($row_car['condition']=='Used'){
				$num=$rowbrand['used_price'];
			}
			else{
				$num=$rowbrand['new_price'];
				
			}
			
			if($rowbrand['used_price'] < 500000){
			$lessprice=$rowbrand['used_price'];
			}else{
			$lessprice=$num-500000;
			}
			
			
			
			
			$highprice=$num+500000;
		$output.="₦".$lessprice."-"." ₦".$highprice;
		}
		}
		
		return $output;
	}
	
	
	
	
	function getestimatedValueofYourcarEmailcalc($id){
		$connection =new connection();
		$connection->connectTodatabase();
		 $connection->selectDatabase();
	$output="";
	$query_car="SELECT model_id,brand_id,gear_type,year from `own_car`  where user_session_id='".session_id()."' and reserve_id='".$id."' ";
	$result_car=$connection->retrieve($query_car);
	$rows_car=$connection->arrayFetch($result_car);
	 foreach($rows_car as $row_car){
		 
		 $query_brand= "SELECT * from `car_details`  where brand_id='".$row_car['brand_id']."' and model_id='".$row_car['model_id']."' and gear_type='".$row_car['gear_type']."' and year='".$row_car['year']."'";
		$result_brand=$connection->retrieve($query_brand);
		$rowsbrand=$connection->arrayFetch($result_brand);
		
		foreach($rowsbrand as $rowbrand){
			
			if($rowbrand['used_price'] < 500000){
			$lessprice=$rowbrand['used_price'];
			}else{
			$lessprice=$rowbrand['used_price']-500000;
			}
			$highprice=$rowbrand['used_price']+500000;
		$output.="₦ ".$lessprice."-"." ₦".$highprice;
		}
		}
		
		return $output;
	}
	
	
	
		}

	?>