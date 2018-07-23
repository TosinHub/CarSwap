<?php 
$title = "Car Swap Admin Panel | Car Details";
include('includes/header.php');
include('includes/classes/carDetailsPaginate.php');
$row = Car::getEachCarDetails($conn,$_GET['edit']);


if(array_key_exists("submit", $_POST)){
	$errors = [];
			
    if(empty($_POST['brand_id'])){

        $errors['brand_id'] = "Please select brand name";

    }
    
    if(empty($_POST['model_id'])){

        $errors['model_id'] = "Please select model name";

    }

 
    if(empty($_POST['gear_type'])){

        $errors['gear_type'] = "Please select gear type";

    }
    if(empty($_POST['year'])){

        $errors['year'] = "Please select year";

    }
    if(empty($_POST['new_price'])){

        $errors['new_price'] = "Please enter new price";

    }elseif(!is_numeric($_POST['new_price'])){

        $errors['new_price'] = "Please new price must be a number";

    }
    if(empty($_POST['used_price'])){

        $errors['used_price'] = "Please enter old password";

    }elseif(!is_numeric($_POST['used_price'])){

        $errors['used_price'] = "Please used price must be a number";

    }



    if(empty($errors)){
         $clean = array_map('trim', $_POST);
            if(Car::updateCarDetails($conn,$clean)){
                $success = "Car details edited";
                header("Location:car_details?success=$success");
            }
	}

}

	
	?>


	<div id="page-wrapper">
		      <?php if(isset($errors)) { ?>
      <div class="alert alert-danger">
          <?php 
          
          if(isset($errors['brand_id'])){echo $errors['brand_id']."<br>"; }
          if(isset($errors['model_id'])){echo $errors['model_id']."<br>"; }
          if(isset($errors['gear_type'])){echo $errors['gear_type']."<br>"; }
          if(isset($errors['year'])){echo $errors['year']."<br>"; }
          if(isset($errors['new_price'])){echo $errors['new_price']."<br>"; }         
          if(isset($errors['used_price'])){echo $errors['used_price']."<br>"; }
          
          
          
          
          ?>
       </div>   
      <?php } ?> 


			<div class="col-md-4 col-md-offset-4">
				<div class="activity_box activity_box1">
					<h3>Edit Car Details</h3>
					
					
						<form action="edit_details?edit=<?php echo $_GET['edit'] ?>" method="POST" >
						
                            
                            
							<div class="log-input">
								<div class="log-input-left">
								<center><label>Select Car Brand</label></center>
							
									<center><select onchange="fetch_model(this.value);" name="brand_id" class="selectpicker" data-show-subtext="true" data-live-search="true" required>
								<option data-subtext="<?php echo  Car::getBrandName($conn,$row['brand_id']);?>" value="<?php echo $row['brand_id']; ?>"><?php echo Car::getBrandName($conn,$row['brand_id']);?></option>
									<?php
									 Car::selectCarBrand($conn);
									?>												

									</select></center>
								
									</div>		
							
							</div>

						<br><br><br>
							<div class="log-input">
								<div class="log-input-left">
										<center><label>Select Car Model</label><br></center>
								
								
							
									 <select  id="selector1" class="form-control1 car_model" name="model_id" required>
									<option data-subtext="<?php echo  Car::getModelName($conn,$row['model_id']);?>" value="<?php echo $row['model_id']; ?>"><?php echo Car::getModelName($conn,$row['model_id']);?></option>
								
 									</select>	</div>
							
								<div class="clearfix"> </div>
							</div>
	<br>
								<div class="log-input">
								<div class="log-input-left">
								<center><label>Gear Type</label><br></center>
								
								
							
									 <select name="gear_type" class="form-control1 remove">
									 
									 <option value="Automatic" <?php if($row['gear_type'] == "Automatic") { echo "selected"; } ?>>Automatic</option>
									 <option value="Manual" <?php if($row['gear_type'] == "Manual") { echo "selected"; } ?>>Manual</option>
 									</select>	</div>
							
								<div class="clearfix"> </div>
							</div>
<br>
								<div class="log-input">
								<div class="log-input-left">
							<center>	<label>Year</label><br></center>
								
							
									 <select name="year" class="form-control1 remove" required>
									 <option value="<?php echo $row['year'] ?>"><?php echo $row['year'] ?></option>
									 <?php 
									 	$years = array(2000,2001,2002,2003,2004,2005,2006,2007,2008,2009,2010,2011,2012,2013,2014,2015,2016,2017,2018);
											foreach ($years as $year) {

												?>
												<option value="<?php echo $year ?>"> <?php echo $year ?></option>
										<?php
										
											}							 
									 ?>
									</select>	</div>
							
								<div class="clearfix"> </div>
							</div>
							<br>
									<div class="log-input">
								<div class="log-input-left">
										<center><label>New Car Price</label></center>
								   <input type="text" placeholder="New Car Price" name="new_price" value="<?php echo $row['new_price'] ?>" required/>
								</div>
									<div class="log-input">
								<div class="log-input-left">
										<center><label>Used Car Price</label></center>
								   <input type="text" placeholder="Used Car Price" name="used_price" value="<?php echo $row['used_price'] ?>" required/>
								</div>
                                <input type="hidden" name="id" value="<?php echo $_GET['edit'] ?>">
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











