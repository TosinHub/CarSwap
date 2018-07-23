<?php 
$title = "Swap your Cars Now | CarSwap";
include 'includes/header.php'; 
	
?>
        
		<div class="content-bg">
			<!-- Slider main container -->
			<div class="swiper-container">
				<!-- Additional required wrapper -->
				<div class="swiper-wrapper">
					<!-- Slides -->
					<div class="swiper-slide" style="background: linear-gradient( rgba(0, 0, 0, 0.45), rgba(0, 0, 0, 0.45) ), url('./images/f886d0b49acabd711ba8aa89ed8056abe4bfa19a.png') no-repeat; background-size: cover;">
						<div class="container swiper-slide-caption-block">
							<div class="text-center">
								<h1 class="text-white border-4 lg_border-8 border-white inline-block py-3 px-4 text-base lg_text-4xl uppercase font-black text-center">Swap to get a new car</h1>
								<hr class="mt-2 lg_mt-4 w-32 lg_w-64" />
								<hr class="mt-2 lg_mt-4 w-16 lg_w-24" />
							</div>
						</div>
					</div>
					<div class="swiper-slide" style="background: linear-gradient( rgba(0, 0, 0, 0.45), rgba(0, 0, 0, 0.45) ), url('./images/bmw-30-csl-3116267_1920.jpg') no-repeat; background-size: cover;">
						<div class="container swiper-slide-caption-block">
							<div class="text-center">
								<h1 class="text-white border-4 lg_border-8 border-white inline-block py-3 px-4 text-base lg_text-4xl uppercase font-black text-center">Downgrade to get cash plus cash</h1>
								<hr class="mt-2 lg_mt-4 w-32 lg_w-64" />
								<hr class="mt-2 lg_mt-4 w-16 lg_w-24" />
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="bg-grey-lighter py-8 lg_py-12">
			<div class="container">
				<div class="elevated-form">
					<div class="elevated-form__title">Swap Car Now</div>

					<form class="form" method="POST" action="" enctype="multipart/form-data">
						<div class="elevated-form__content" id="switch-form">
							<div class="ionTabs" id="form-switcher" data-name="Details">
								<div class="ionTabs__body">
									<div class="ionTabs__item ionTabs__item_state_active" data-name="step-1">

										<h2 class="uppercase text-black tracking-wider">Your Car Details</h2>
										<hr class="mt-3 mb-8 border-grey-light" />
										<div class="u-row -mx-2 flex flex-wrap clearfix">
											<div class="w-full lg_w-1/3 px-2">
												<div class="form__wrapper">
													<label class="form__label">Brand</label>
													<div>
														<select data-width="100%" name="brand1_id" id="brand"  onchange="fetch_model(this.value);" required>
															<option value="">Select</option>
															<?php
														Car::selectCarBrand($conn);
															?>	
														</select>
													</div>
												</div>
											</div>
											<div class="w-full lg_w-1/3 px-2">
												<div class="form__wrapper">
													<label class="form__label">Model</label>
													<div>
														<select data-width="100%" id="model" name="model1_id" required disabled>
														<option value="">Select</option>				
														</select>
													</div>
												</div>
											</div>
											<div class="w-full lg_w-1/3 px-2">
												<div class="form__wrapper">
													<label class="form__label">Gear Type</label>
													<div>
														<select data-width="100%" id="gear"  name="gear_type1" >
															<option value="">Select</option>
															<option value="Manual">Manual</option>
															<option value="Automatic">Automatic</option>
														</select>
													</div>
												</div>
											</div>
										</div>
										<div class="u-row -mx-2 flex flex-wrap mb-4 clearfix">
											<div class="w-full lg_w-1/3 px-2">
												<div class="form__wrapper">
													<label class="form__label">Year</label>
													<div>
														<select  data-width="100%" id="year" name="year1" disabled required>
															
														</select>
													</div>
												</div>
											</div>
											<div class="w-full lg_w-1/3 px-2">
												<div class="form__wrapper">
													<label class="form__label">Accident</label>
													<div>
															<select data-width="100%" name="accident" id="www" required>
															<option value="">Select</option>
															<option value="No">No</option>
															<option value="Yes">Yes</option>
														</select>
													</div>
												</div>
											</div>
											<div class="w-full lg_w-1/3 px-2">
												<div class="form__wrapper">
													<label class="form__label">Upload an image of the car</label>
													<div>
														<input type="file" name="filename" class="form__input" required>
													</div>
												</div>
											</div>
										</div>
										<div class="overflow-auto">
											<button id="next" class="tabsSwitch float-right button button--brand" data-group="Details"  type="submit" name="submit" data-tab="step-2">Next</button>
										</div>
									</div>
									<div class="ionTabs__item" data-name="step-2">


										<h2 class="uppercase text-black tracking-wider">The Car I Want</h2>
										<hr class="mt-3 mb-8 border-grey-light" />
										<div class="u-row -mx-2 flex flex-wrap clearfix">
											<div class="w-full lg_w-1/3 px-2">
												<div class="form__wrapper">
													<label class="form__label">Brand</label>
													<div>
															<select data-width="100%" name="brand2_id" id="brand2" onchange="fetch_model2(this.value);"  required>
															<option value="">Select</option>
															<?php
														Car::selectCarBrand($conn);
															?>	
														</select>
													</div>
												</div>
											</div>
											<div class="w-full lg_w-1/3 px-2">
												<div class="form__wrapper">
													<label class="form__label">Model</label>
													<div>
														<select data-width="100%" id="model2" name="model2_id" required disabled>
															<option>Select Option</option>
														</select>
													</div>
												</div>
											</div>
											<div class="w-full lg_w-1/3 px-2">
												<div class="form__wrapper">
													<label class="form__label">Gear Type</label>
													<div>
														<select data-width="100%" name="gear_type2" id="gear_type2" required>
															
														<option value="Manual">Manual</option>
															<option value="Automatic">Automatic</option>
														</select>
													</div>
												</div>
											</div>
										</div>
										<div class="u-row -mx-2 flex flex-wrap mb-4 clearfix">
											<div class="w-full lg_w-1/3 px-2">
												<div class="form__wrapper">
													<label class="form__label">Year</label>
													<div>
														<select data-width="100%" name="year2" disabled="disabled" id="year2" required>
															<option value="">Select Option</option>
														</select>
													</div>
												</div>
											</div>
											<div class="w-full lg_w-1/3 px-2">
												<div class="form__wrapper">
													<label class="form__label">Condition</label>
													<div>
														<select data-width="100%" name="condition" id="condition" required>
														<option value="">Select</option>
														<option value="New">New(Tokunbo/Brand New)</option>
														<option value="Used">Nigerian Used</option>
											
														</select>
													</div>
												</div>
											</div>
											<div class="w-full lg_w-1/3 px-2">
												<div class="form__wrapper">
													<label class="form__label">Color</label>
													<div>
														<select data-width="100%" name="color" id="color" required>
														<option value="">Select</option>
														<option value="Any Colour">Any Color</option>	
														<option value="Red">Red</option>
														<option value="Blue">Blue</option>
														<option value="Green">Green</option>
														<option value="Black">Black</option>
														<option value="Silver">Silver</option>
														</select>

													</div>
												</div>
											</div>
										</div>
										<div class="overflow-auto">
											<div class="float-right inline-block">
												<button class="mb-2 tabsSwitch button button--brand" data-group="Details" data-tab="step-1"><a href="session_destroy" style="color:white">Previous</a></button>

												<button class="button button--outline--brand" name="submit" type="submit">Submit</button>
											</div>
										</div>
									</div>

									<div class="ionTabs__preloader"></div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>

			
			<div class="container">
				<div class="py-6 lg_pt-12 lg_pb-8">
					<div class="">
						<h1 class="text-center">3 STAGES TO GET A NEW CAR OR CASH</h1>

						<div class="u-row flex flex-wrap my-8">
							<div class="w-full lg_w-1/3">
								<div class="infobox infobox--centered">
									<div class="infobox__icon-block">
										<div class="infobox__icon-container">
											<span class="infobox__icon icon icon--car--brand"></span>
										</div>
									</div>
									<h2 class="infobox__title">Free Evaluation</h2>
									<p class="infobox__desc">Get your car evaluated for free</p>
								</div>
							</div>
							<div class="w-full lg_w-1/3">
								<div class="infobox infobox--centered">
									<div class="infobox__icon-block">
										<div class="infobox__icon-container">
											<span class="infobox__icon icon icon--inspection--brand"></span>
										</div>
									</div>
									<h2 class="infobox__title">Free Inspection</h2>
									<p class="infobox__desc">Schedule an inspection online or offline</p>
								</div>
							</div>
							<div class="w-full lg_w-1/3">
								<div class="infobox infobox--centered">
									<div class="infobox__icon-block">
										<div class="infobox__icon-container">
											<span class="infobox__icon icon icon--swap--brand"></span>
										</div>
									</div>
									<h2 class="infobox__title">Swap</h2>
									<p class="infobox__desc">Swap And Get Your Desired Car Immediately</p>
								</div>
							</div>
						</div>

						<div class="text-center">
							<a href="" class="button button--outline--brand">Learn More</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="bg-white py-8 lg_py-12">
			<div class="container">
				<div class="text-center">
					<h1 class="text-black">Testimonials from Our Customers</h1>
					<hr class="w-32 border-grey" />

					<div class="slick-carousel my-8">
						<div>
							<div class="testimonial">
								<p class="testimonial__text">Our organization used our old errand cars to get a new car. Thank you Carswap for your excellent service</p>
								<p class="testimonial__author">	Tosin Olugbenga</p>
								<cite class="testimonial__origin">OceanDigits Tech Limited</cite>
							</div>
						</div>
						<div>
							<div class="testimonial">
								<p class="testimonial__text">I was being forced to sell my 2013 Camry for N5 million due to urgent medical bill.Carswap gave me N5million for the car and gave me another 2008 Camry. Awesome experience </p>
								<p class="testimonial__author">	Desmond Uwaegbu</p>
								<cite class="testimonial__origin">Lagos</cite>
							</div>
						</div>
						<div>
							<div class="testimonial">
								<p class="testimonial__text">I put my car for sale for 5 months without success. My intention was to sell it, add money and buy a new one. Then i heard of Carswap. They took my old car, gave me good value for it. I added my budget and got the new car i wanted in two hours. Thank you Carswap </p>
								<p class="testimonial__author">	Hassan Adamu</p>
								<cite class="testimonial__origin">Kaduna</cite>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="lg_py-8">
			<div class="container">
				<div class="u-row flex flex-wrap">
					<div class="w-full lg_w-3/4 hidden lg_block">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.0429714354977!2d3.361546450440027!3d6.641586223598089!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b939206d6e3e9%3A0xb93b4ac723244a1a!2s17+Akinsanya+St%2C+Ojodu!5e0!3m2!1sen!2sng!4v1517993887540" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div>
					<div class="w-full lg_w-1/4 ">
						<div class="bg-brand text-white py-8 px-4">
							<h2 class="mb-6 uppercase font-bolder text-white title">Our Inspection Centre</h2>
							<p class="font-semibold">	N0. 17 Akinsanya Street,<br/>
								Beside FRSC Building Ojodu <br/>
								Lagos 
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>

			<?php
			include('includes/footer.php');