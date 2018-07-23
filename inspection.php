<?php
$title = "Book An Inspection Date | CarSwap";
include 'includes/header.php';
include 'tools/inspection_info_process.php';
Car::estimatedValues($conn,session_id(),$connect->getestimatedValueofYourcar(),$connect->getestimatedValueofcaryouwant());

if(isset($_GET['backi']) && $_GET['backi'] == "backi" ){
		
		$stmt = $conn->prepare("DELETE FROM  reserve_information WHERE user_session_id ='".session_id()."' ");
	 	$stmt->execute();  
		$stmt = $conn->prepare("DELETE FROM  own_car WHERE user_session_id ='".session_id()."' ");
	 	$stmt->execute();  
        $stmt = $conn->prepare("DELETE FROM  swap_to WHERE user_session_id ='".session_id()."' ");
        $stmt->execute();

}

?>


<section class="py-8">
	<div class="container">

		<div class="text-center mb-8">
			<h1>Book an Inspection</h1>
			<hr class="w-32 border-brand" />
		</div>

		<div class="u-row flex flex-wrap -mx-2">
			<div class="w-full lg_w-2/5 px-2 mb-4">
				<div class="bg-white border border-brand">
					<div class="bg-brand p-3">
						<h2 class="text-center text-white uppercase tracking-wide">Estimates</h2>
					</div>
					<div class="">
						<div class="text-center p-4">
							<h2 class="text-brand">Value of your car</h2>
							<p>Price Range</p>
							<p class="font-bold text-2xl"><?php echo $connect->getestimatedValueofYourcar(); ?></p>
							<hr class="border-grey-light" />
						</div>
						<div class="text-center pb-4">
							<h2 class="text-brand">Value of the car you want</h2>
							<p>Price Range</p>
							<p class="font-bold text-2xl"><?php echo $connect->getestimatedValueofcaryouwant(); ?></p>
							<hr class="border-grey-light" />
						</div>
						<div class="text-center pb-4">
	<?php  
				
				$calc = $connect->clientcarInfo() - $connect->toswapCarInfo();
		if($connect->toswapCarInfo()> $connect->clientcarInfo()){
			?>

							<h2 class="text-brand">Upgrading</h2>
							<p>Estimated money to pay for your new car</p>
							<p class="font-bold text-2xl"><?php echo "₦".number_format($calc*-1);
							Car::setEstimatedPrice($conn,session_id(),number_format($calc*-1),"Upgrading");  ?>
							</p>
					
					<?php	}
		else{
			?>
				<h2 class="text-brand">Downgrading</h2>
							<p>Estimated money to recieve plus a new car</p>
							<p class="font-bold text-2xl"><?php echo "₦".number_format($calc);
							Car::setEstimatedPrice($conn,session_id(),number_format($calc),"Downgrading");  ?>
							</p>

<?php

		}	?>
		
	
	
	
				</p>



						</div>
					</div>
				</div>
			</div>
			<?php if(isset($success)) { ?>

				<div class="w-full lg_w-3/5 px-2">
				<div>
					<div class="ionTabs ionTabs--bordered" id="form-switcher" data-name="Details">
						<ul class="ionTabs__head">
							<li class="ionTabs__tab" data-target="personal">Verification</li>
						</ul>
						<div class="ionTabs__body py-4">
						
							<div class="ionTabs__item ionTabs__item_state_active" data-name="personal">
								<form  action="verify.php" method="post">
								
									<div class="u-row -mx-2 flex flex-wrap clearfix">
										<div class="w-full px-2">
											<div class="form__wrapper">
												<label><b>A verification code has been sent to you mail, kindly enter the code here to proceed</b></label>
												<div>
													<input type="text" class="form__input" placeholder="Enter verification code" name="code" required>
													<input name="reserve_id" value="<?php echo $reserveid; ?>" type="hidden">
											
												</div>
											</div>
										</div>
									</div>
								
									<div class="overflow-auto">
										<a href="inspection?backi=backi" class="mb-2 button button--outline--brand">Back</a>
										<button class="lg_float-right button button--brand" type="submit" name="send_code">Send</button>
									</div>
								</form>
							</div>
							
							<div class="ionTabs__preloader"></div>
						</div>
					</div>
				</div>
			</div>
				

























	


			<?php }else{ ?>
			<div class="w-full lg_w-3/5 px-2">
				<div>
					<div class="ionTabs ionTabs--bordered" id="form-switcher" data-name="Details">
						<ul class="ionTabs__head">
							<li class="ionTabs__tab" data-target="personal">Personal</li>
							<li class="ionTabs__tab" data-target="company">Company</li>
						</ul>
						<div class="ionTabs__body py-4">
						
							<div class="ionTabs__item ionTabs__item_state_active" data-name="personal">
								<form name="inspectionForm" id="inspectionForm"  action="#" method="post">
									<div class="u-row -mx-2 flex flex-wrap clearfix">
										<div class="w-full lg_w-1/2 px-2">
											<div class="form__wrapper">
												<label class="form__label">Name</label>
												<div>
													<input type="text" class="form__input" placeholder="Enter your name" name="name" required>
												</div>
											</div>
										</div>
										<div class="w-full lg_w-1/2 px-2">
											<div class="form__wrapper">
												<label class="form__label">Phone number</label>
												<div>
													<input type="phone" class="form__input" placeholder="Enter your phone" name="phone" required>
												</div>
											</div>
										</div>
									</div>
									<div class="u-row -mx-2 flex flex-wrap clearfix">
										<div class="w-full px-2">
											<div class="form__wrapper">
												<label class="form__label">Email Address</label>
												<div>
													<input type="email" class="form__input" placeholder="Enter your email" name="email" required>
													<input name="client_type" value="personal" type="hidden">
												</div>
											</div>
										</div>
									</div>
									<div class="u-row -mx-2 flex flex-wrap mb-4 clearfix">
										<div class="w-full lg_w-1/2 px-2">
											<div class="form__wrapper">
												<label class="form__label">Choose Inspection Date</label>
												<div>
													<input type="date" id="dateofbirth" name="inspect_date" class="form__input" onchange="processReserve();" required>
												</div>
											</div>
										</div>
										<div class="w-full lg_w-1/2 px-2">
											<div class="form__wrapper">
												<label class="form__label">Choose Inspection Time</label>
												<div>
													<select data-width="100%"  id="inspect_time" name="inspect_time" required>
														<option>Select Inspection Time</option>
													
													</select>
												</div>
											</div>
										</div>
									</div>
									<div class="overflow-auto">
										<a href="activate_back?statusii=return" class="mb-2 button button--outline--brand">Back</a>
										<button class="lg_float-right button button--brand" type="submit" name="reserve">Book Inspection</button>
									</div>
								</form>
							</div>
							<div class="ionTabs__item" data-name="company">
								<form name="inspectionForm2" id="inspectionForm2"  action="#" method="post">
									<div class="u-row -mx-2 flex flex-wrap clearfix">
										<div class="w-full lg_w-1/2 px-2">
											<div class="form__wrapper">
												<label class="form__label">Company Name</label>
												<div>
													<input type="text" class="form__input" placeholder="Enter company name" name="name" required>
												</div>
											</div>
										</div>
										<div class="w-full lg_w-1/2 px-2">
											<div class="form__wrapper">
												<label class="form__label">Contact Phone number</label>
												<div>
													<input type="phone" class="form__input" placeholder="Enter company phone" name="phone" required>
												</div>
											</div>
										</div>
									</div>
									<div class="u-row -mx-2 flex flex-wrap clearfix">
										<div class="w-full px-2">
											<div class="form__wrapper">
												<label class="form__label">Contact Email Address</label>
												<div>
													<input type="email" class="form__input" placeholder="Enter company email" name="email" required>
												<input name="client_type" value="Company" type="hidden">
												</div>
											</div>
										</div>
									</div>
									<div class="u-row -mx-2 flex flex-wrap mb-4 clearfix">
										<div class="w-full lg_w-1/2 px-2">
											<div class="form__wrapper">
												<label class="form__label">Choose Inspection Date</label>
												<div>
														<input  class="form__input" type="date" name="inspect_date" id="inspect_date2" onchange="processReserve2();" required>
											
												</div>
											</div>
										</div>
										<div class="w-full lg_w-1/2 px-2">
											<div class="form__wrapper">
												<label class="form__label">Choose Inspection Time</label>
												<div>
													<select data-width="100%"  id="inspect_time2" name="inspect_time" required>
														<option>Select Inspection Time</option>
													
													</select>
												</div>
											</div>
										</div>
									</div>
									<div class="overflow-auto">
										<a href="activate_back?statusii=return" class="mb-2 button button--outline--brand">Back</a>
										<button class="lg_float-right button button--brand" type="submit" name="reserve">Book Inspection</button>
									
									</div>
								</form>
							</div>

							<div class="ionTabs__preloader"></div>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		
		
		
		</div>
	</div>
</section>
<?php
include('includes/footer.php');