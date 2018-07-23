<?php 
$title = "Car Swap Admin Panel | Car Details";
include('includes/header.php');

$row = Car::getOwnCar($conn,$_GET['user_session_id']);
$row2 = Car::getCarToSwap($conn,$_GET['user_session_id']);
$row3 = Car::getEstimatedValues($conn,$_GET['user_session_id']);
$row4 = Car::getInspectionDetails($conn,$_GET['user_session_id']);
$row5 = Car::getEstimatedPrice($conn,$_GET['user_session_id']);

?>
    
 <section>
 <div id="page-wrapper">
<div class="graph_box">
  <div class="col md-6">
   <table class="table table-bordered">
									
									<tbody>
										<tr>
											<td>Swap Estimated Price</td>
											<td><h2><span class="label btn_7 label-primary">₦<?php echo $row5['estimated_price'] ?></span></h2></td>
										</tr>
										<tr>
											<td>Swap Status</td>
											<td><h2><span class="label btn_7 label-primary"><?php echo $row5['status'] ?></span></h2></td>
										</tr></tbody></table>
  </div>

						<div class="col-md-6 page_1">
                        <h3>Client's Car Details</h3>
								  <table class="table table-bordered">
									
									<tbody>
										<tr>
											<td>Brand Name</td>
											<td><h2><span class="label btn_7 label-primary"><?php echo Car::getBrandName($conn,$row['brand_id']) ?></span></h2></td>
										</tr>
										<tr>
											<td>Model Name</td>
											<td><h2><span class="label btn_7 label-primary"><?php echo Car::getModelName($conn,$row['model_id']) ?></span></h2></td>
										</tr>
										<tr>
											<td>Year</td>
											<td><h2><span class="label btn_7 label-primary"><?php echo $row['year'] ?></span></h2></td>
										</tr>
										<tr>
											<td>Gear Type</td>
											<td><h2><span class="label btn_7 label-primary"><?php echo $row['gear_type'] ?></span></h2></td>
										</tr>
										<tr>
											<td>Accident Status</td>
											<td><h2><span class="label btn_7 label-primary"><?php echo $row['accident'] ?></span></h2></td>
										</tr>
										<tr>
											<td>Estimated Value</td>
											<td><h2><span class="label btn_7 label-primary"><?php echo $row3['client_car_estimate'] ?></span></h2></td>
										</tr>
										
									</tbody>
								  </table>                    
							</div>

                            <div class="col-md-6 page_1">
                        <h3>Client's Car Picture</h3>
								
								  <table class="table table-bordered">	<img height="500px" width="500px" src="cars/<?php echo $row['filename'] ?>" alt=""> 
                                
                                  </table>
                                  </div>
						<div class="col-md-6 page_1">
                        <h3>Car Swap Details</h3>
								  <table class="table table-bordered">
									
									<tbody>
										<tr>
											<td>Brand Name</td>
											<td><h2><span class="label btn_7 label-primary"><?php echo Car::getBrandName($conn,$row2['brand_id']) ?></span></h2></td>
										</tr>
										<tr>
											<td>Model Name</td>
											<td><h2><span class="label btn_7 label-primary"><?php echo Car::getModelName($conn,$row2['model_id']) ?></span></h2></td>
										</tr>
										<tr>
											<td>Year</td>
											<td><h2><span class="label btn_7 label-primary"><?php echo $row2['year'] ?></span></h2></td>
										</tr>
										<tr>
											<td>Gear Type</td>
											<td><h2><span class="label btn_7 label-primary"><?php echo $row2['gear_type'] ?></span></h2></td>
										</tr>
										<tr>
											<td>Car Status</td>
											<td><h2><span class="label btn_7 label-primary"><?php echo $row2['condition'] ?></span></h2></td>
										</tr>
										<tr>
											<td>Estimated Value</td>
											<td><h2><span class="label btn_7 label-primary"><?php echo $row3['swap_car_estimate']  ?></span></h2></td>
										</tr>
										
									</tbody>
								  </table>                    
							</div>
						<div class="col-md-6 page_1">
                        <h3>Inspection Details</h3>			
								  <table class="table table-bordered">
									
									<tbody>
										<tr>
											<td>Client Name</td>
											<td><h2><span class="label btn_7 label-primary"><?php echo $row4['name'] ?></span></h2></td>
										</tr>
										<tr>
											<td>Phone Number</td>
											<td><h2><span class="label btn_7 label-primary"><?php echo $row4['phone'] ?></span></h2></td>
										</tr>
										<tr>
											<td>Email</td>
											<td><h2><span class="label btn_7 label-primary"><?php echo $row4['email'] ?></span></h2></td>
										</tr>
										<tr>
											<td>Inspection Date</td>
											<td><h2><span class="label btn_7 label-primary"><?php echo $row4['inspect_date'] ?></span></h2></td>
										</tr>
										<tr>
											<td>Inspection Time</td>
											<td><h2><span class="label btn_7 label-primary"><?php echo $row4['inspection_time'] ?></span></h2></td>
										</tr>
										<tr>
											<td>Client Type</td>
											<td><h2><span class="label btn_7 label-primary"><?php echo $row4['type']  ?></span></h2></td>
										</tr>
										
									</tbody>
								  </table>                    
							</div>
					
						
						</div>
					<div class="clearfix"> </div>
					<div class="clearfix"> </div>
 <?php include('includes/footer.php');   