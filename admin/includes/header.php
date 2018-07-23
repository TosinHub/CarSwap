<?php 
session_start();
include('includes/classes/db.php');
include('includes/classes/adminClass.php');
include('includes/classes/carClass.php');
ob_start();
Admin::is_loggedin();
?>
<!DOCTYPE HTML>
<html>
<head>
<title><?php echo $title ?> </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Easy Admin Panel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
 <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
 <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
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
<script>
$(document).ready(function(){
	$('.search').on('keyup',function(){
		var searchTerm = $(this).val().toLowerCase();
		$('#userTbl tbody tr').each(function(){
			var lineStr = $(this).text().toLowerCase();
			if(lineStr.indexOf(searchTerm) === -1){
				$(this).hide();
			}else{
				$(this).show();
			}
		});
	});
});
</script>

<!-- Placed js at the end of the document so the pages load faster -->


</head> 
   
 <body class="sticky-header left-side-collapsed"  onload="initMap()">
    <section>
    <!-- left side start-->
		<div class="left-side sticky-left-side">

			<!--logo and iconic logo start-->
			<div class="logo">
				<h1><a href="index.php">CarSwap <span>Admin</span></a></h1>
			</div>
			<div class="logo-icon text-center">
				<a href="index"><i class="lnr lnr-home"></i> </a>
			</div>

			<!--logo and iconic logo end-->
			<div class="left-side-inner">

				<!--sidebar nav start-->
					<ul class="nav nav-pills nav-stacked custom-nav">
						<li class="active"><a href="index"><i class="lnr lnr-power-switch"></i><span>Dashboard</span></a></li>
					     
						<li><a href="car_details"><i class="lnr lnr-pencil"></i> <span>Car Detail</span></a></li>
						<li><a href="signup"><i class="lnr lnr-select"></i> <span>Add Admin</span></a></li>



					<!-- 	<li class="menu-list"><a href="#"><i class="lnr lnr-book"></i>  <span>Pages</span></a> 
							<ul class="sub-menu-list">
								<li><a href="sign-in.html">Sign In</a> </li>
								<li><a href="sign-up.html">Sign Up</a></li>
								<li><a href="blank_page.html">Blank Page</a></li>
							</ul>
						</li> -->
					</ul>
				<!--sidebar nav end-->
			</div>
		</div>
		<!-- left side end-->
    
		<!-- main content start-->
		<div class="main-content">
			<!-- header-starts -->
			<div class="header-section">
			 
			<!--toggle button start-->
			<a class="toggle-btn  menu-collapsed"><i class="fa fa-bars"></i></a>
			<!--toggle button end-->

			<!--notification menu start -->
			<div class="menu-right">
				<div class="user-panel-top">  	
					<div class="profile_details_left">
						<ul class="nofitications-dropdown">
									   							   		
							<div class="clearfix"></div>	
						</ul>
					</div>
					<div class="profile_details">		
						<ul>
                            <li></li>
							<li class="dropdown profile_details_drop">
                                
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                
                                <div class="profile_img">	
									
										 <div class="user-name">
											<p><?php echo $_SESSION['name']; ?><span>Administrator</span></p>
										 </div>
										 <i class="lnr lnr-chevron-down"></i>
										 <i class="lnr lnr-chevron-up"></i>
										<div class="clearfix"></div>	
									</div>	
								</a>
								<ul class="dropdown-menu drp-mnu">
									<li> <a href="#"><i class="fa fa-cog"></i> Settings</a> </li> 
									<li> <a href="#"><i class="fa fa-user"></i>Profile</a> </li> 
									<li> <a href="logout"><i class="fa fa-sign-out"></i> Logout</a> </li>
								</ul>
							</li>
							<div class="clearfix"> </div>
						</ul>
					</div>		
					<div class="social_icons">
                       
						<div class="col-md-6 social_icons-left">
							<a href="car_details"><span> View Car Details</span></a>
						</div>
						<div class="col-md-6 social_icons-left">
							<a href="carswap_request"><span> CarSwap Requests</span></a>
						</div>
				<!-- 		<div class="col-md-4 social_icons-left pinterest">
							<a href="#"><i class="fa fa-google-plus i1"></i><span>500<sup>+</sup> Shares</span></a>
						</div>
						<div class="col-md-4 social_icons-left twi">
							<a href="#"><i class="fa fa-twitter i1"></i><span>500<sup>+</sup> Tweets</span></a>
						</div> -->
						<div class="clearfix"> </div>
					</div>            	
					<div class="clearfix"></div>
				</div>
			  </div>
			<!--notification menu end -->
			</div>