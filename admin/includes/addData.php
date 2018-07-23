<?php
include('classes/db.php');


  $location = "inspection.php";
                 echo "$location";


/*   $target_dir = "cars/";
  $filename = explode('.',$_FILES['image']['name']);
 

  $imgname = time().'.'.$filename;
  $target_file = $target_dir . $imgname ;

  $uploadOk = 1;
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
  move_uploaded_file($_FILES["image"]["tmp_name"], $target_file); */

   /*  // Check file size
    if ($_FILES["image"]["size"] > 2000000) 
    {
        $text="Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" && $imageFileType != "bmp" ) 
    {
        $text = "Sorry, only JPG, JPEG, PNG, GIF & BMP files are allowed.";
        $uploadOk = 0;
    }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) 
  {
    echo $text;
  } 
  else 
  { */
   
 /*        $tract_no = rand(0,999999);  
        $path=$imgname;


          	 		$stmt = $conn->prepare("INSERT INTO car_swap(track_no,brand1_id,model1_id,gear_type1,year1,accident,image_path,brand2_id,model2_id,gear_type2,year2,condition,color) 
             VALUES (:t,:a,:b,:c,:d,:e,:f,:g,:h,:i,:j,:k,:l)");

      $stmt->bindParam(":t", $track_no); 
      $stmt->bindParam(":a", $_POST['brand1_id']); 
      $stmt->bindParam(":b", $_POST['model1_id']);           
      $stmt->bindParam(":c", $_POST['gear_type1']);
	  $stmt->bindParam(":d", $_POST['year1']);		
      $stmt->bindParam(":e", $_POST['accident']);      
      $stmt->bindParam(":f", $path); 
      $stmt->bindParam(":g", $_POST['brand2_id']); 
      $stmt->bindParam(":h", $_POST['model2_id']);           
      $stmt->bindParam(":i", $_POST['gear_type2']);
	  $stmt->bindParam(":j", $_POST['year2']);  
	  $stmt->bindParam(":k", $_POST['condition']);  
	  $stmt->bindParam(":l", $_POST['color']);  
            

if($stmt->execute()){
                $location = "inspection.php?track_no=$track_no";
                 echo "$location";
             }
           */
  
  
  //}