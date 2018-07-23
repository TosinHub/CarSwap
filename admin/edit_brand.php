<?php 
$title = "Car Swap Admin Panel | Car Details";
include('includes/header.php');
include('includes/classes/carDetailsPaginate.php');

if(array_key_exists("submit", $_POST)){
	$errors = [];

    
    if(empty($_POST['brand_name'])){

        $errors['brand_name'] = "Please enter brand name";

    }

 



    if(empty($errors)){
         $clean = array_map('trim', $_POST);
            if(Car::updateCarBrand($conn,$clean)){
               $SUCCESS = "Car Brand Edited Successfully!!!";
                header("Location:index?success=$SUCCESS");
            }
	}

}

	
	?>


	<div id="page-wrapper">
		      <?php if(isset($errors)) { ?>
      <div class="alert alert-danger">
          <?php 
          
          if(isset($errors['brand_name'])){echo $errors['brand_name']."<br>"; }
          
                 
          
          ?>
       </div>   
      <?php } ?> 


			<div class="col-md-4 col-md-offset-4">
				<div class="activity_box activity_box1">
					<h3>Edit Car Brand</h3>
					
					
						<form action="edit_brand?brand_name=<?php echo $_GET['brand_name'] ?>&id=<?php echo $_GET['id'] ?>'" method="POST" >
						
                            
                            
						
						<br><br><br>
							<div class="log-input">
								<div class="log-input-left">
										<center><label>Car Model</label><br></center>
								
								 <input type="text" name="brand_name" value="<?php echo $_GET['brand_name'] ?>" required/>
							</div>
							
								<div class="clearfix"> </div>
							</div>
	<br>
		
<br>
					
								
                                <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
									<center><button class="btn-success btn" name="submit" >Submit</button></center>
								<div class="clearfix"> </div>
                            </div>				




							<div class="col-sm-8 col-sm-offset-2" style="margin-top:10px">
								
								
								</div>
						</form>	 
						
				</div>
				<div class="clearfix"> </div>
			</div>
										</div>

					<?php 
					
					
					include('includes/footer.php');   











