$(document).ready(function () {
    $("#accident").select2(); 
    $("#brand").select2();
    $("#model").select2();
    $("#year").select2();
    $("#gear").select2();
    $("#condition").select2();
    $("#color").select2(); 
     $('#brand2').select2(); 
   


});


function processReserve(){
	
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
	
	var inspectDate2=$('#inspect_date2').val();
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
}

function fetch_model(val) {

    $.ajax({
        type: 'post',
        url: 'admin/includes/fetch_data.php',
        data: {
            get_model: val
        },
        success: function (response) {

            $("#model").disabled = false;
            $("#model").html(response);
            

            $("#year").disabled = false;
           fetch_year(val); 
        }
    });


}



function fetch_year(val) {

    $.ajax({
        type: 'post',
        url: 'admin/includes/fetch_data.php',
        data: {
            get_year: val
        },
        success: function (response) {

            document.getElementById("year").disabled = false;
            document.getElementById("year").innerHTML = response;
        }
    });

}







function fetch_model2(val) {

    $.ajax({
        type: 'post',
        url: 'admin/includes/fetch_data.php',
        data: {
            get_model2: val
        },
        success: function (response) {

            $("#model2").disabled = false;
            $("#model2").innerHTML = response;
            $("#year2").disabled = false;
            fetch_year2(val);
        }
    });

}

function fetch_year2(val) {

    $.ajax({
        type: 'post',
        url: 'admin/includes/fetch_data.php',
        data: {
            get_year2: val
        },
        success: function (response) {

            document.getElementById("year2").disabled = false;
            document.getElementById("year2").innerHTML = response;
        }
    });

}	



function reserveInfo(){
	
	if(inspectionForm.name.value==''){
	
	document.getElementById("checkprog").innerHTML = "Please you have not typed in your name!";
}
else if(inspectionForm.phone.value==''){
	
	document.getElementById("checkprog").innerHTML = "You have not entered your phone";
}

else if(inspectionForm.email.value==''){
	
	document.getElementById("checkprog").innerHTML = "You have not entered your email";
}
else if( !isValidEmailAddress(inspectionForm.email.value ) ) { 
				document.getElementById("checkprog").innerHTML = "Please enter a valid email address";
				return;
				}
else{

    var processing = document.querySelector('.try');
        processing.innerHTML = "Processing <img id='load' src='images/loading.gif'>";
        document.getElementById('load').style.display = 'block';

	
	var xmlhttp;
	var name = inspectionForm.name.value;
	var phone = inspectionForm.phone.value;
	var email = inspectionForm.email.value;
	var client_type = inspectionForm.client_type.value;
	var inspectDate = inspectionForm.inspect_date.value;
	var inspectTime = inspectionForm.inspect_time.value;
	
  if (window.XMLHttpRequest) {
    xmlhttp = new XMLHttpRequest();
  } else {
    // code for older browsers
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
	
	 xmlhttp.onreadystatechange = function(){
	
	if(xmlhttp.readyState==4&&xmlhttp.status==200){
		//alert(xmlhttp.responseText);
			//document.getElementById('checkprog').innerHTML = xmlhttp.responseText;
		document.getElementById('inspectionForm').style.display = 'none';
		document.getElementById('suc').style.display = 'block';
        setInterval(function () { window.location ="session_destroy";},16000);
		}
	
	}
	
        xmlhttp.open('GET', 'tools/inspection_info_process.php?name=' + name + '&phone=' + phone + '&email=' + email + '&inspectDate=' + inspectDate + '&inspectTime=' + inspectTime + '&client_type=' + client_type, true);
	xmlhttp.send()
	
}
}
 
 
 function reserveInfo2(){
	
	if(inspectionForm2.name2.value==''){
	
	document.getElementById("checkprog2").innerHTML = "Please you have not typed in your name!";
}
else if(inspectionForm2.phone2.value==''){
	
	document.getElementById("checkprog2").innerHTML = "You have not entered your phone";
}

else if(inspectionForm2.email2.value==''){
	
	document.getElementById("checkprog2").innerHTML = "You have not entered your email";
}
else if( !isValidEmailAddress(inspectionForm2.email2.value ) ) { 
				document.getElementById("checkprog2").innerHTML = "Please enter a valid email address";
				return;
				}
else{

        var processing = document.querySelector('.try2');
        processing.innerHTML = "Processing <img id='load' src='images/loading.gif'>";
        document.getElementById('load').style.display = 'block';
	
	var xmlhttp;
	var name2 = inspectionForm2.name2.value;
	var phone2 = inspectionForm2.phone2.value;
	var email2 = inspectionForm2.email2.value;
	var phone2 = inspectionForm2.phone2.value;
	var client_type = inspectionForm2.client_type.value;
	var inspectDate2 = inspectionForm2.inspect_date2.value;
	var inspectTime2 = inspectionForm2.inspect_time2.value;
	
  if (window.XMLHttpRequest) {
    xmlhttp = new XMLHttpRequest();
  } else {
    // code for older browsers
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
	
	 xmlhttp.onreadystatechange = function(){
	
	if(xmlhttp.readyState==4&&xmlhttp.status==200){
		//alert(xmlhttp.responseText);
			//document.getElementById('checkprog').innerHTML = xmlhttp.responseText;
		document.getElementById('inspectionForm2').style.display = 'none';
		document.getElementById('sucmessage2').style.display = 'block';
		setInterval(function(){ window.location="session_destroy";},10000);
		
		
		
		}
	
	}
	
        xmlhttp.open('GET', 'tools/inspection_info_process2.php?name=' + name2 + '&phone=' + phone2 + '&email=' + email2 + '&inspectDate=' + inspectDate2 + '&inspectTime=' + inspectTime2 + '&client_type=' + client_type, true);
	xmlhttp.send()
	
}
}
 
 function isValidEmailAddress(emailAddress) {
    var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    return pattern.test(emailAddress);
}









/* $(document).ready(function (e) {
    $(".addData").on('submit', (function (e) {
        e.preventDefault();
        $.ajax({
            url: "admin/includes/addData.php",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            processData: false,

            success: function (response) {
                window.location.href = response;
            },
            error: function () {
                $('#show').html('Error...');
            }
        });
    }));
}); */