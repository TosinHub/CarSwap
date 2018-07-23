<?php 

session_start();
$id=session_id();
ob_start();
include('admin/includes/classes/db.php');
include('admin/includes/classes/carClass.php');
////////////////////////// added this class files for data processing //////////////
include('admin/includes/classes/classModulate.php');
include('admin/includes/classes/insertions.php');


?>


<!DOCTYPE html>
<html>
<head>

	<meta name="viewport" content="width=device-width, initial-scale=1" >
	<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700,900" rel="stylesheet"> 
	<title><?php echo $title; ?> </title>
	
	<link rel="shortcut icon" href="images/logo.png" />
	<link href="./css/vendor.css" rel="stylesheet">
    <link href="./css/core.css" rel="stylesheet">
      <script type="text/javascript" src="js/jquery.js"></script>
      <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />

	   <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.css"  rel="stylesheet" />


	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.js"></script> 
	<style>
	.select2-container--default .select2-selection--single{
    padding:6px;
    height: 45px;
    
    font-size: 1.5em;  
    position: relative;
}
.select2-choice .select2-chosen--below{
    height: 148px !important;
} 
	</style>
<script>
    
	
	$(document).ready(function () {
 
     $('#brand2').select2(); 
     $('#model2').select2(); 
     $('#condition').select2(); 
     $('#year2').select2(); 
     $('#inspect_time').select2(); 
     $('#inspect_time2').select2(); 
     $('#www').select2(); 
     $('#gear_type2').select2(); 
    


});

/* function processReserve(){
	
	var inspectDate=inspectionForm.inspect_date.value;
	xmlhttp = new XMLHttpRequest();
		if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
				} else {
    // code for older browsers
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  
   xmlhttp.onreadystatechange = function(){
	
	if(xmlhttp.readyState==4&&xmlhttp.status==200){
		//alert(xmlhttp.responseText);
		document.getElementById('inspect_time').innerHTML = xmlhttp.responseText;
		
		}
	
	}
	
  
  
xmlhttp.open('GET','tools/date_process.php?inspectDate='+inspectDate,true);
xmlhttp.send()
}
	function processReserve2(){
	
	var inspectDate2=inspectionForm2.inspect_date.value;
	xmlhttp = new XMLHttpRequest();
		if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
				} else {
    // code for older browsers
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  
   xmlhttp.onreadystatechange = function(){
	
	if(xmlhttp.readyState==4&&xmlhttp.status==200){
		//alert(xmlhttp.responseText);
		document.getElementById('inspect_time2').innerHTML = xmlhttp.responseText;
		
		}
	
	}
	
  
  
xmlhttp.open('GET','tools/date_process2.php?inspectDate='+inspectDate2,true);
xmlhttp.send()
} */
	</script>
  
</head>
<body>
	<div class="page-wrapper">
		<header class="main-header">
			<div class="container">
				<div class="main-header__content">
					<div class="main-header__logo-block">
						<a href="session_destroy">
							<img src="./images/logo.png" class="main-header__logo" alt="logo" />
						</a>
					</div>
					<div class="main__header-nav">
						<a class="main-header__nav-toggle" href="#">
							<span></span>
							<span></span>
							<span></span>
						</a>
						<ul class="main-header__nav-menu">
							<li class="main-header__nav-list">
								<a href="session_destroy" class="main-header__nav-link">Home</a>
							</li>
							<li class="main-header__nav-list">
								<a href="about_us" class="main-header__nav-link">About Us</a>
							</li>
							<li class="main-header__nav-list">
								<a href="how_it_works" class="main-header__nav-link">How It Works</a>
							</li>
							<li class="main-header__nav-list">
								<a href="faq.php" class="main-header__nav-link">FAQ</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
        </header>
        


