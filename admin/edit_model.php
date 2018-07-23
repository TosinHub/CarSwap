<?php 
$title = "Car Swap Admin Panel | Car Details";
include('includes/header.php');
include('includes/classes/carDetailsPaginate.php');

if(array_key_exists("submit", $_POST)){
	$errors = [];
			
    if(empty($_POST['brand_id'])){

        $errors['brand_id'] = "Please select brand name";

    }
    
    if(empty($_POST['model_name'])){

        $errors['model_name'] = "Please enter model name";

    }

 



    if(empty($errors)){
         $clean = array_map('trim', $_POST);
            if(Car::updateCarModel($conn,$clean)){
                $success = "Car details edited";
                header("Location:view_model?success=$success");
            }
	}

}

	
	?>


	<div id="page-wrapper">
		      <?php if(isset($errors)) { ?>
      <div class="alert alert-danger">
          <?php 
          
          if(isset($errors['brand_id'])){echo $errors['brand_id']."<br>"; }
          if(isset($errors['model_name'])){echo $errors['model_name']."<br>"; }
          
          
          
          
          ?>
       </div>   
      <?php } ?> 


			<div class="col-md-4 col-md-offset-4">
				<div class="activity_box activity_box1">
					<h3>Edit Car Model</h3>
					
					
						<form action="edit_model?model_name=<?php echo $_GET['model_name'] ?>&brand_id=<?php echo $_GET['brand_id'] ?>&id=<?php echo $_GET['id'] ?>'" method="POST" >
						
                            
                            
							<div class="log-input">
								<div class="log-input-left">
								<center><label>Select Car Brand</label></center>
							
									<center><select onchange="fetch_model(this.value);" name="brand_id" class="selectpicker" data-show-subtext="true" data-live-search="true" required>
								<option data-subtext="<?php echo  Car::getBrandName($conn,$_GET['brand_id']);?>" value="<?php echo $_GET['brand_id']; ?>"><?php echo Car::getBrandName($conn,$_GET['brand_id']);?></option>
									<?php
									 Car::selectCarBrand($conn);
									?>												

									</select></center>
								
									</div>		
							
							</div>

						<br><br><br>
							<div class="log-input">
								<div class="log-input-left">
										<center><label>Car Model</label><br></center>
								
								 <input type="text" placeholder="Enter Car Model" name="model_name" value="<?php echo $_GET['model_name'] ?>" required/>
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











