<?php 
$title = "Swap your Cars Now | Verification";
include 'includes/header.php'; 
	if(!isset($_GET['message'])){
        header("location:session_destroy");
    }
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
					<div class="elevated-form__title"><h2 style="color:white">Verification</h2></div>

						<div class="elevated-form__content" id="switch-form">
							<div class="ionTabs" id="form-switcher" data-name="Details">
								<div class="ionTabs__body">
									<div class="ionTabs__item ionTabs__item_state_active" data-name="step-1">

			<div style="font-size:16px">							
                  <p><?php echo $_GET['message'] ?></p>

     
            



            </div>    
        </div>
        <div class="overflow-auto"><br><br>
										<a href="session_destroy" class="mb-2 button button--outline--brand">Back</a>
										
									
									</div>
	</div>
									<div class="ionTabs__preloader"></div>
								</div>
							</div>
						</div>
				
				</div>
			</div>

			
			<?php
			include('includes/footer.php');