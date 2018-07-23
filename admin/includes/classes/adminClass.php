<?php 
	define("CompanyName","Car Swap");
	define("SiteDeveloper","Oceandigits Technology Limited");


class Admin {



	public static function doAdminRegister($dbconn, $input){

            $hash = password_hash($input['password'], PASSWORD_BCRYPT);
            $img_path = "images/logo_dark.png";

	 		$stmt = $dbconn->prepare("INSERT INTO admin(name,email,password,image_path) 
             VALUES (:e,:ln,:s,:w)");
			
            $stmt->bindParam(":e", $input['name']); 
            $stmt->bindParam(":ln", $input['email']);           
            $stmt->bindParam(":s", $hash);
			$stmt->bindParam(":w", $img_path);
	 		if($stmt->execute()){

         	static::redirectWithMessage("Admin Registered","success","signup.php" );
	 		} 	
		 
			


	}

 	public static function redirectWithMessage($text, $type, $location){
				  static::setMsg($text,$type);
         	 static::redirect($location);
			 }

	
	public static function doLogin($dbconn,$input)
	{
		
			 		//INSERT DATA INTO TABLE
	 		$stmt = $dbconn->prepare("SELECT * FROM  admin WHERE email = :e  ");

	 		//bind params

	 		$stmt->bindParam(":e", $input['email']);
	 		$stmt->execute();
	 		$count = $stmt->rowCount();	 		
	 		
	 		$row = $stmt->fetch(PDO::FETCH_ASSOC);

	 		if($count != 1 || !password_verify($input['password'], $row['password'])) {
			 static::setMsg("Invalid details!", "error");
         	 static::redirect('login.php');
         	 exit();
			
			}else{

			$_SESSION['id'] = $row['id'];
			$_SESSION['name'] = $row['name'];
			$_SESSION['image_path'] = $row['image_path'];  
          	$_SESSION['logged'] = true;
			
			  static::redirect('index.php');
					
				}
				
				
			}


	
			

	public static function is_loggedin()
			{
				if(isset($_SESSION['logged']) == true && $_SESSION['logged'])
				{
					return true;
				}else{
					 static::redirectWithMessage("Please login!","error","login.php" );

				}
			}
			
	public static function redirect($url)
			{
				header("Location: $url");
			}
			
	public static function doLogout()
			{	

			static::setMsg("Please login again!", "error");

			static::redirect('login.php');
				}				
				
													
	public static function doesEmailExist($dbconn, $email){
			$result = false;

			$stmt = $dbconn->prepare("SELECT email FROM admin WHERE email = :e");

			#bind parameter
			$stmt->bindParam(":e", $email);
			$stmt->execute();

			#get number of rolls returned
			$count = $stmt->rowCount();

			if($count > 0){
				$result = true;
			}

			return $result;	
		}
	

	public static function setMsg($text, $type){
		if($type == 'error'){
			$_SESSION['errorMsg'] = $text;
		} else {
			$_SESSION['successMsg'] = $text;
		}
	}

	public static function displayMessage(){
		if(isset($_SESSION['errorMsg'])){
			echo '<div class="alert alert-danger">'.$_SESSION['errorMsg'].'</div>';
			unset($_SESSION['errorMsg']);
		}

		if(isset($_SESSION['successMsg'])){
			echo '<div class="alert alert-success">'.$_SESSION['successMsg'].'</div>';
			unset($_SESSION['successMsg']);
		}
	}

	


			




	public static function addCourse($dbconn,$input){


			$stmt = $dbconn->prepare("INSERT INTO courses(course_name) VALUES (:c)");

	 		//bind params
			$stmt->bindParam(":c", $input['course_name']);
			$stmt->execute();
			return true;
  		//header("Location:category.php?success=$success");


	}



	public static function editCourse($dbconn,$input){

		$stmt = $dbconn->prepare("UPDATE  courses SET course_name = :cn 	WHERE course_id = :i ");

		$stmt->bindParam(":cn", $input['course_name']);
		$stmt->bindParam(":i", $input['course_id']);
		 $stmt->execute();
		 	$success = "course edited!";
  		header("Location:courses.php?success=$success");





	}
dele
	public static function teCourse($dbconn, $input){


		$stmt = $dbconn->prepare("DELETE FROM  courses WHERE course_id = :i ");

		$stmt->bindParam(":i", $input);
		 $stmt->execute();
		 return true;

	}
	public static function deleteDetails($dbconn, $input){


		$stmt = $dbconn->prepare("DELETE FROM details WHERE detail_id = :i ");

		$stmt->bindParam(":i", $input);
		 $stmt->execute();
		 return true;

	}



	public static function addDetails($dbconn,$input){

				
				  

                  $stmt = $dbconn->prepare("INSERT INTO details(course_id,list_details,details,coursePrice,coursePD,date,duration) 
                  	VALUES (:t,:l,:a,:c,:y,:im,:sl)");

	 					

	 			$data = [
	 					':t' => $input['course'],
	 					':l' => $input['list_details'],
	 					':a' => $input['details'],
	 					':c' => $input['coursePrice'],
	 					':y' => $input['coursePD'],
	 					':im' => $input['date'],
	 					':sl' => $input['duration'],

	 					

	 					];

	 			if($stmt->execute($data)){

                  $success = "Details Added";
                  header("Location:add_details.php?message=$success");

                 }

             else
                 
                {        
                		 $success = "Error";
                  header("Location:add_post.php?message=$success");


               }
                 

		}
	public static function editDetails($dbconn,$input){




                  $stmt = $dbconn->prepare("UPDATE details  
                  	SET course_id =:t,
                  		list_details = :l,
                  		details = :a,
                  		coursePrice = :c,
                  		coursePD = :p,
                  		date = :y,
                  		duration =:i
                  



                  	WHERE detail_id = :id");

	 		//bind params

	 				$data = [
	 					':t' => $input['course'],
	 					':l' => $input['list_details'],
	 					':a' => $input['details'],
	 					':c' => $input['coursePrice'],
	 					':p' => $input['coursePD'],
	 					':y' => $input['date'],
	 					':i' => $input['duration'],
	 					':id' => $input['detail_id']

	 					

	 					];


	 			if($stmt->execute($data)){;

                  $success = "Product Edited";
                  header("Location:dashboard.php?success=$success");

                 }

             else
                 
                {        
                		 $success = "Product Edit failed";
                  header("Location:dashboard.php?success=$success");


               }

		

			}
	

	public static	function rowCount($dbconn,$place){

		$stmt = $dbconn->prepare("SELECT count(*) FROM $place ");
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $rowCount = $row[0];
         return $rowCount;


	}




	public static  function curNav($page){

     	$curPage = basename($_SERVER['SCRIPT_FILENAME']);

     	if($curPage == $page){
     		echo "class = 'selected'";
     	}

     }


	public static function fetchCourses($dbconn, $callback)
	{
			$stmt = $dbconn->prepare("SELECT * FROM courses ");
				 $stmt->execute();
				#$row = $stmt->fetch(PDO::FETCH_ASSOC);


				$callback($stmt);

     }
     public static function displayError($show,$input){

			if(isset($show[$input])){


				echo '<span class="form-error">'.$show[$input]. '</span>' ;
				//return true;
        }


    }

 


















}