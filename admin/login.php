<?php 
session_start();
include('includes/classes/db.php');
include('includes/classes/adminClass.php');

 if(array_key_exists('login', $_POST)){
 		#Cache errors
	 $errors = [];
	 


	 		if(empty($_POST['email'])){

	 			$errors['email'] = "please enter email";

	 		}


	 	 	if(empty($_POST['password'])){

	 			$errors['password'] = "please enter password";


	 		}
	 		if(empty($errors)){
				$clean = array_map('trim', $_POST);
				Admin::doLogin($conn, $clean);

			}
		 
}	 
?>


<!DOCTYPE HTML>
<html>
<head>
<title>Car Swap | Log In </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Easy Admin Panel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
<!-- chart -->
<script src="js/Chart.js"></script>
<!-- //chart -->
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!----webfonts--->
<link href='//fonts.googleapis.com/css?family=Cabin:400,400italic,500,500italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
<!---//webfonts---> 
 <!-- Meters graphs -->
<script src="js/jquery-1.10.2.min.js"></script>
<!-- Placed js at the end of the document so the pages load faster -->

 <body class="sign-in-up">
    <section>
			<div id="page-wrapper" class="sign-in-wrapper">
				<div class="graphs">
					<div class="sign-in-form">
						<div class="sign-in-form-top">
                            <p><span>Sign In</span><br>
                            <img src="images/logo_dark.png" width="200px" height="80px"></p>
						</div>
						<div class="signin">
							<?php Admin::displayMessage(); ?>
						<form action="" method="POST">
							<div class="log-input">
								<div class="log-input-left">
								   <input type="text" class="user" placeholder="Email" name="email"/>
								</div>
								
								<div class="clearfix"> </div>
                            </div>
                            
                            
							<div class="log-input">
								<div class="log-input-left">
								   <input type="password" class="lock"  placeholder="Password" name="password"/>
								</div>
							
								<div class="clearfix"> </div>
							</div>
							<input type="submit" value="Login to your dashboard" name="login">
						</form>	 
						</div>				
					</div>
				</div>
			</div>

<?php include('includes/footer.php');		