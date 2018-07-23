<?php 

include('includes/classes/db.php');
include('includes/classes/adminClass.php');
include('includes/classes/carClass.php');


?>


<html>
<head>
	<style type="text/css">
    
    body
{
 background-color:#E6E6E6;
 font-family:helvetica;
}
#heading
{
 text-align:center;
 margin-top:150px;
 font-size:30px;
 color:blue;
}
#select_box
{
 width:500px;
 background-color:#819FF7;
 padding:10px;
 height:200px;
 border-radius:5px;
 box-shadow:0px 0px 10px 0px grey;
}
select
{
 width:400px;
 height:50px;
 border:1px solid #BDBDBD;
 margin-top:20px;
 padding:10px;
 font-size:20px;
 color:grey;
 border-radius:5px;
}
    
    </style>


<script
			  src="https://code.jquery.com/jquery-3.2.1.min.js"
			  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
			  crossorigin="anonymous"></script>

<script type="text/javascript">
function fetch_select(val)
{
 $.ajax({
 type: 'post',
 url: 'fetch_data.php',
 data: {
  get_option:val
 },
 success: function (response) {
        
  document.getElementById("new_select").innerHTML=response; 
 }
 });
}

</script>

</head>
<body>
<p id="heading">Dynamic Select Option Menu Using Ajax and PHP</p>
<center>
<div id="select_box">


<select onchange="fetch_select(this.value);" name="brand_id" class="selectpicker" data-show-subtext="true" data-live-search="true" required>
								
									<?php
									 Car::selectCarBrand($conn);
									?>												

									</select>




 <select id="new_select">
 </select>
	  
</div>     
</center>
</body>
</html>