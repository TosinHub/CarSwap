<?php 

class Car {

    public static function addCarBrand($dbconn, $input){

	 		$stmt = $dbconn->prepare("INSERT INTO car_brand(brand_name) 
             VALUES (:e)");
			
            $stmt->bindParam(":e", $input['brand_name']); 
         
	 		if($stmt->execute()){
                return true;         	
	 		} 	
    }
    public static function countCarBrand($dbconn){

	 	 $stmt=$dbconn->prepare("SELECT count(*) FROM car_brand");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_NUM);
    $count = $row[0];


    return $count;
         
	}
    public static function countCarModel($dbconn){

	 	 $stmt=$dbconn->prepare("SELECT count(*) FROM car_model");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_NUM);
    $count = $row[0];


    return $count;
         
    }
    
    public static function countCarDetails($dbconn){

	 	 $stmt=$dbconn->prepare("SELECT count(*) FROM car_details");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_NUM);
    $count = $row[0];


    return $count;
         
	}

    
    public static function doesCarBrandExist($dbconn, $input){
			$result = false;

			$stmt = $dbconn->prepare("SELECT * FROM car_brand WHERE brand_name = :r ");

			#bind parameter
            $stmt->bindParam(":r", $input['brand_name']); 
			$stmt->execute();

			#get number of rolls returned
			$count = $stmt->rowCount();

			if($count > 0){
				$result = true;
			}

			return $result;	
        }
        
    
        
    public static function updateCarModel($dbconn,$input){

		$stmt = $dbconn->prepare("UPDATE  car_model 
								  SET 	brand_id = :t,
								  		model_name = :c	  
								  
								  WHERE id = :l ");

	 			$data = [
	 				
                        ':t' => $input['brand_id'],
	 					':c' => $input['model_name'],				
	 					':l' => $input['id']				
	 									

	 					];
		$stmt->execute($data);
  		return true;

    }
    public static function updateCarBrand($dbconn,$input){

		$stmt = $dbconn->prepare("UPDATE  car_brand 
								  SET 	brand_name = :t
								  
								  WHERE id = :l ");

	 			$data = [
	 				
                        ':t' => $input['brand_name'],			
	 					':l' => $input['id']				
	 									

	 					];
		$stmt->execute($data);
  		return true;

    }
    
    public static function checkIfDetails($dbconn,$input) {
        	$stmt = $dbconn->prepare("SELECT * FROM  car_details WHERE model_id = :e  ");

	 		//bind params

	 		$stmt->bindParam(":e", $input);
	 		$stmt->execute();
             $count = $stmt->rowCount();	
             
             if($count > 0){
                 return true;
             }

    }

    
    public static function checkIfModel($dbconn,$input) {
        	$stmt = $dbconn->prepare("SELECT * FROM  car_model WHERE brand_id = :e  ");

	 		//bind params

	 		$stmt->bindParam(":e", $input);
	 		$stmt->execute();
             $count = $stmt->rowCount();	
             
             if($count > 0){
                 return true;
             }

    }
    
    public static function deleteModel($dbconn,$input) {
        	$stmt = $dbconn->prepare("DELETE FROM  car_model WHERE id = :e  ");

	 		//bind params

	 		$stmt->bindParam(":e", $input);
	 		$stmt->execute();        
    }
    
    public static function deleteBrand($dbconn,$input) {
        	$stmt = $dbconn->prepare("DELETE FROM  car_brand WHERE id = :e  ");

	 		//bind params

	 		$stmt->bindParam(":e", $input);
	 		$stmt->execute();        
    }
    public static function updateCarDetails($dbconn,$input){

		$stmt = $dbconn->prepare("UPDATE  car_details 
								  SET 	brand_id = :t,
								  		model_id = :c,
										gear_type = :p,
										year = :i,								  
										new_price = :j,							  
										used_price = :k		  
								  
								  WHERE id = :l ");

	 			$data = [
	 				
                        ':t' => $input['brand_id'],
	 					':c' => $input['model_id'],
	 					':p' => $input['gear_type'],
	 					':i' => $input['year'],					
	 					':j' => $input['new_price'],					
	 					':k' => $input['used_price'],					
	 					':l' => $input['id']				
	 									

	 					];
		$stmt->execute($data);
  		return true;

	}


    public static function getCarBrand($dbconn){        
	
			$stmt = $dbconn->prepare("SELECT * FROM car_brand ");
            $stmt->execute();            
          while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
               ?>
                 <tr>
                <td> <?php echo $row['brand_name']; ?></td>
                <td><a class="btn btn-success" href="edit_brand?brand_name=<?php echo $row['brand_name'] ?>&id=<?php echo $row['id'] ?>">Edit </a></td>
                <td><a href="index?name=<?php echo $row['brand_name'] ?>&delete=<?php echo $row['id'] ?>" class="btn btn-success">Delete</a></td>   
                </tr>
               <?php  
          }
                     
    }


  

        public static function selectCarBrand($dbconn){        
	
			$stmt = $dbconn->prepare("SELECT * FROM car_brand ");
            $stmt->execute();            
          while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
               ?>
                	<option data-subtext="<?php echo $row['brand_name'];?>" value="<?php echo $row['id']; ?>"><?php echo $row['brand_name'];?></option>

                <?php  
          }
                     
    }



    public static function addCarModel($dbconn, $input){

	 		$stmt = $dbconn->prepare("INSERT INTO car_model(brand_id,model_name) 
             VALUES (:e,:r)");
			
            $stmt->bindParam(":e", $input['brand_id']); 
            $stmt->bindParam(":r", $input['model_name']); 
         
	 		if($stmt->execute()){
                return true;         	
	 		} 	
    }

    	public static function doesCarModelExist($dbconn, $input){
			$result = false;

			$stmt = $dbconn->prepare("SELECT * FROM car_model WHERE brand_id = :e AND model_name = :r ");

			#bind parameter
			 $stmt->bindParam(":e", $input['brand_id']); 
            $stmt->bindParam(":r", $input['model_name']); 
			$stmt->execute();

			#get number of rolls returned
			$count = $stmt->rowCount();

			if($count > 0){
				$result = true;
			}

			return $result;	
        }
        
    
	public static function addCarDetails($dbconn, $input){


	 		$stmt = $dbconn->prepare("INSERT INTO car_details(brand_id,model_id,gear_type,year,car_status,car_price) 
             VALUES (:e,:ln,:s,:w,:y,:z)");
			
            $stmt->bindParam(":e", $input['brand_id']); 
            $stmt->bindParam(":ln", $input['model_id']);           
            $stmt->bindParam(":s", $input['gear_type']);
			$stmt->bindParam(":w", $input['year']);
			$stmt->bindParam(":y", $input['car_status']);
            $stmt->bindParam(":z", $input['car_price']);
            
	 		if($stmt->execute()){

         return true;
        } 	
		     
    }

    public static function getBrandName($dbconn,$id){

        			$stmt = $dbconn->prepare("SELECT * FROM car_brand WHERE id = $id ");
                    $stmt->execute();
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    return $row['brand_name'];  

    }
    public static function getModelName($dbconn,$id){

        			$stmt = $dbconn->prepare("SELECT * FROM car_model WHERE id = $id ");
                    $stmt->execute();
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    return $row['model_name'];  

    }


      public static function getCarDetails($dbconn){        
	
			$stmt = $dbconn->prepare("SELECT * FROM car_details ");
            $stmt->execute();            
          while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
               ?>
                	<tr class="info">
											<td><?php echo static::getBrandName($dbconn, $row['brand_id']) ?></td>
											<td><?php echo static::getModelName($dbconn, $row['model_id']) ?></td>
											<td><?php echo $row['gear_type']; ?></td>
											<td><?php echo $row['year']; ?></td>
											<td><?php echo $row['new_price']; ?></td>
											<td><?php echo $row['used_price']; ?></td>
											<td>
                                            <button class="btn-success btn">Edit</button>
                                            <button class="btn-success btn">Delete</button>
							
                                            
                                            </td>
											</tr>
               <?php  
          }
                     
    }



    
    public static function getEachCarDetails($dbconn,$id){

        			$stmt = $dbconn->prepare("SELECT * FROM car_details WHERE id = '$id'");
                    $stmt->execute();
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    return $row;

    }
    
    public static function getOwnCar($dbconn,$id){

        			$stmt = $dbconn->prepare("SELECT * FROM own_car WHERE user_session_id = '$id'");
                    $stmt->execute();
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    return $row;

    }


       public static function getCarToSwap($dbconn,$id){

        			$stmt = $dbconn->prepare("SELECT * FROM swap_to WHERE user_session_id = '$id'");
                    $stmt->execute();
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    return $row;

    }
        public static function estimatedValues($dbconn,$a,$b,$c){
            	$stmt = $dbconn->prepare("INSERT INTO swap_estimates(user_session_id,client_car_estimate,swap_car_estimate) 
             VALUES (:e,:f,:g)");
			
            $stmt->bindParam(":e", $a); 
            $stmt->bindParam(":f", $b); 
            $stmt->bindParam(":g", $c); 
         
	 		$stmt->execute();               	
	 		

    }
       public static function getEstimatedValues($dbconn,$id){
            $stmt = $dbconn->prepare("SELECT * FROM swap_estimates WHERE user_session_id = '$id' ");
			   
            $stmt->execute(); 
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row;     	
	 		

    }
    
          public static function getInspectionDetails($dbconn,$id){
            $stmt = $dbconn->prepare("SELECT * FROM reserve_information WHERE user_session_id = '$id' ");
			   
            $stmt->execute(); 
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row;     	
	 		

	}
  
    
    public static function setEstimatedPrice($dbconn,$a,$b,$c){
        	$stmt = $dbconn->prepare("INSERT INTO estimated_price(user_session_id,estimated_price,status) 
             VALUES (:e,:f,:g)");
			
            $stmt->bindParam(":e", $a); 
            $stmt->bindParam(":f", $b); 
            $stmt->bindParam(":g", $c); 
         
	 		$stmt->execute();
    }

         public static function getEstimatedPrice($dbconn,$id){
            $stmt = $dbconn->prepare("SELECT * FROM estimated_price WHERE user_session_id = '$id' ");
			   
            $stmt->execute(); 
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row;     	
	 		

    }




} 