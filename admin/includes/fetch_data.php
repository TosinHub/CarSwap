<?php
include('classes/db.php');



if(isset($_POST['get_model'])){

 $model = $_POST['get_model'];
 
            

            $stmt = $conn->prepare("SELECT * FROM car_model WHERE brand_id = :e ");
            $stmt->bindParam(":e", $model); 
            $stmt->execute();            
          while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    
        echo "<option value='".$row['id']."'>".$row['model_name']."</option> ";
    
          }
        
                     
    }

  if(isset($_POST['get_year'])){  

        $model = $_POST['get_year'];

            $stmt = $conn->prepare("SELECT * FROM car_details WHERE model_id = :e ");
            $stmt->bindParam(":e", $model); 
            $stmt->execute();            
          while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    
        echo "<option value='".$row['year']."'>".$row['year']."</option> ";
    
          }
        
                     
    }

if(isset($_POST['get_model2'])){

 $model = $_POST['get_model2'];
 
            

            $stmt = $conn->prepare("SELECT * FROM car_model WHERE brand_id = :e ");
            $stmt->bindParam(":e", $model); 
            $stmt->execute();            
          while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    
        echo "<option value='".$row['id']."'>".$row['model_name']."</option> ";
    
          }
        
                     
    }

  if(isset($_POST['get_year2'])){  

        $model = $_POST['get_year2'];

            $stmt = $conn->prepare("SELECT * FROM car_details WHERE model_id = :e ");
            $stmt->bindParam(":e", $model); 
            $stmt->execute();            
          while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    
        echo "<option value='".$row['year']."'>".$row['year']."</option> ";
    
          }
        
                     
    }

    
if(isset($_POST['addCarDetails'])){
    
	 		$stmt = $conn->prepare("INSERT INTO car_details(brand_id,model_id,gear_type,year,new_price,used_price) 
             VALUES (:e,:ln,:s,:w,:z,:x)");

      $stmt->bindParam(":e", $_POST['brand_id']); 
      $stmt->bindParam(":ln", $_POST['model_id']);           
      $stmt->bindParam(":s", $_POST['gear_type']);
			$stmt->bindParam(":w", $_POST['year']);		
      $stmt->bindParam(":z", $_POST['new_price']);      
      $stmt->bindParam(":x", $_POST['used_price']); 
      
      
      	if($stmt->execute()){

         echo "Car details added succesfully";
        } else{
          echo "Error occured";
        }	

}