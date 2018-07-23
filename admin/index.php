<?php 
$title = "Car Swap Admin Panel | Dashboard";
include('includes/header.php');

	$error = [];

if(array_key_exists("addbrand", $_POST)){
		if(empty($_POST['brand_name'])){
			$error['brand_name'] = "Please enter car brand name"; 
		}else{
			$clean = array_map('trim', $_POST);


			if(Car::doesCarBrandExist($conn, $clean)){
?>
			    <script type="text/javascript">
			    alert('Car Brand already exists!');
					return false;
			    </script>
		

<?php
			}else
			if(Car::addCarBrand($conn, $clean)){
?>
			<script type="text/javascript">
			alert('Car Brand Added successfully!');
			</script>

<?php

			}
		}
}

if(array_key_exists("addmodel", $_POST)){
		if(empty($_POST['model_name'])){
			$error['model_name'] = "Please enter car model name"; 
		
		}
		if(empty($_POST['brand_id'])){
			$error['brand_id'] = "Please select car brand"; 
		}
		

		if(empty($error)){
				$clean = array_map('trim', $_POST);

				if(Car::doesCarModelExist($conn, $clean)){
?>
			    <script type="text/javascript">
			    alert('Car Model already exists!');
					return false;
			    </script>
		

<?php

			}else		
			  if(Car::addCarModel($conn, $clean)){
				?>
			    <script type="text/javascript">
			    alert('Car Model Added successfully!');
			    </script>
		

<?php

			  }
	}
}	  

?>

		<!-- //header-ends -->
			<div id="page-wrapper">
				<div class="graphs">
					<div class="col_3">
						<div class="col-md-3 widget widget1">
							<div class="r3_counter_box">
								<i class="fa fa-mail-forward"></i>
								<div class="stats">
								  <h5><?php echo Car::countCarBrand($conn); ?> <span></span></h5>
								  <div class="grow">
									<p>Car Brands</p>
								  </div>
								</div>
							</div>
						</div>
						<div class="col-md-3 widget widget1">
							<div class="r3_counter_box">
								<i class="fa fa-users"></i>
								<div class="stats">
								  <h5><?php echo Car::countCarModel($conn); ?> <span></span></h5>
								  <div class="grow grow1">
									<p>Car Models</p>
								  </div>
								</div>
							</div>
						</div>
						<div class="col-md-3 widget widget1">
							<div class="r3_counter_box">
								<i class="fa fa-eye"></i>
								<div class="stats">
								  <h5><?php echo Car::countCarDetails($conn); ?> <span></span></h5>
								  <div class="grow grow3">
									<p>Cars Details</p>
								  </div>
								</div>
							</div>
						 </div>
						 <div class="col-md-3 widget">
							<div class="r3_counter_box">
								<i class="fa fa-usd"></i>
								<div class="stats">
								  <h5>0 <span></span></h5>
								  <div class="grow grow2">
									<p>Completed Deals</p>
								  </div>
								</div>
							</div>
						</div>
						<div class="clearfix"> </div>
					</div>

			<!-- switches -->

					
					<?php if(isset($_GET['delete'])) { 
						if(Car::checkIfModel($conn,$_GET['delete'])){
						
						?>
						<br>
				<div class="alert alert-danger">
					<?php 
					
			
					
					echo "This brand <b>(".$_GET['name'].")</b> is associated with some car models and details, you can't delete it";
					
					
					?>
				</div>   
				<?php } else{
					Car::deleteBrand($conn,$_GET['delete']);
			?>
			<div class="alert alert-success">
					<?php 
					
			
					
					echo "Model deleted";
					
					
					?>
				</div>  

			<?php

				}
					} 
				?> 































 <?php if(isset($_GET['success'])) { ?>
 <br><br>
      <div class="alert alert-success">
          <?php 
          
  
          
          echo $_GET['success'];
          
          
          ?>
       </div>   
      <?php } ?> 
		<!-- //switches -->
		<div class="col_1">
			<div class="col-md-4 span_8">
				<div class="activity_box activity_box1">
					<h3>Add Car Brand</h3>
						<form method="post" action="" style="margin-top:10px">
						<input type="text" name="brand_name" placeholder="" required="">
						<input type="submit" value="Add" name="addbrand"/>		
					</form>
					<br>
<div class="panel panel-primary" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
							<div class="panel-heading">
								<h2>Available Car Brands</h2>
								<div class="panel-ctrls" data-actions-container="" data-action-collapse="{&quot;target&quot;: &quot;.panel-body&quot;}"><span class="button-icon has-bg"><i class="ti ti-angle-down"></i></span></div>
							</div>
<link href="css/table.css" rel='stylesheet' type='text/css' />
<table>
  <thead>
 
  </thead>
  <tbody>
	<?php Car::getCarBrand($conn);?>  
  
   </tbody>
  <tfoot>
   
  </tfoot>
</table>

</div>















							<div class="clearfix"> </div>
				</div>
			</div>

			<div class="col-md-4 span_8">
				<div class="activity_box activity_box1">
					<h3>Add Car Model</h3>

					<form action="" method="POST">
							<div class="log-input">
								<div class="log-input-left">
										<label>Enter Car Model Name</label>
								   <input type="text" placeholder="Enter Model Name" name="model_name" required/>
								</div>
								
								<div class="clearfix"> </div>
                            </div>
                            
                            
							<div class="log-input">
								<div class="log-input-left">
								<label>Select Car Brand</label>
								
								<select name="brand_id" class="selectpicker" data-show-subtext="true" data-live-search="true" required>
									<option value="">Select</option>
									<?php
									 Car::selectCarBrand($conn);
									?>												

									</select>	</div>
							
								<div class="clearfix"> </div>
							</div>
							<div class="col-sm-8 col-sm-offset-2" style="margin-top:10px">
									<button class="btn-success btn" type="submit" name="addmodel">Add Model</button> <br> <br>
									<a href="view_model" class="btn-success btn">View all Added Model</a>
									
								</div>
						</form>	 
						
							<div class="clearfix"> </div>
				</div>
			</div>
		
			<div class="col-md-4 span_8">
				<div class="activity_box activity_box1">
					<h3>Add Car Details</h3>
					
					
						<form>
						
                            
                            
							<div class="log-input">
								<div class="log-input-left">
								<label>Select Car Brand</label>
								
								<select onchange="fetch_model(this.value);" id="brand_id" class="selectpicker" data-show-subtext="true" data-live-search="true" required>
								<option value="">Select</option>
									<?php
									 Car::selectCarBrand($conn);
									?>												

									</select>	</div>
							
								<div class="clearfix"> </div>
							</div>

						
							<div class="log-input">
								<div class="log-input-left">
								<label>Select Car Model</label><br>
								
							
									 <select  id="selector1" class="form-control1 car_model " disabled required>
									 <option value="">Select</option>
 									</select>	</div>
							
								<div class="clearfix"> </div>
							</div>

								<div class="log-input">
								<div class="log-input-left">
								<label>Gear Type</label><br>
								
							
									 <select id="gear_type" class="form-control1 remove">
									 <option value="">Select</option>
									 <option value="Automatic">Automatic</option>
									 <option value="Manual">Manual</option>
 									</select>	</div>
							
								<div class="clearfix"> </div>
							</div>

								<div class="log-input">
								<div class="log-input-left">
								<label>Year</label><br>
								
							
									 <select id="year" class="form-control1 remove" required>
									 <option value="">Select</option>
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

								

									<div class="log-input">
								<div class="log-input-left">
										<label>New Car Price</label>
								   <input type="text" placeholder="New Car Price" id="new_price" required/>
								</div>
									<div class="log-input">
								<div class="log-input-left">
										<label>Used Car Price</label>
								   <input type="text" placeholder="Used Car Price" id="used_price" required/>
								</div>
									<button class="btn-success btn" onclick="addCarDetails()">Add Car</button>
								<div class="clearfix"> </div>
                            </div>				




							<div class="col-sm-8 col-sm-offset-2" style="margin-top:10px">
								
								
								</div>
						</form>	 
						
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="clearfix"> </div>
			
		</div>
				</div>
			<!--body wrapper start-->
			</div>
			 <!--body wrapper end-->
		</div>

<?php
include('includes/footer.php');		