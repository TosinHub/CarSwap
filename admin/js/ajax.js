 function fetch_model(val)
{
 $.ajax({
 type: 'post',
 url: 'includes/fetch_data.php',
 data: {
  get_model:val
 },
 success: function (response) {
 
  document.getElementById("selector1").innerHTML=response; 
   $(".car_model").removeAttr('disabled');

 }
 });
}

function addCarDetails() {
  
  var brand_id = document.getElementById("brand_id").value;
  var model_id = document.getElementById("selector1").value;
  var gear_type = document.getElementById("gear_type").value;
  var year = document.getElementById("year").value;
  var new_price = document.getElementById("new_price").value;
  var used_price = document.getElementById("used_price").value;
  var addCarDetails = "addCarDetails";
 
  // Returns successful data submission message when the entered information is stored in database.
  var dataString = 'addCarDetails=' + addCarDetails + '&brand_id=' + brand_id + '&model_id=' + model_id + '&gear_type=' + gear_type + '&year=' + year  + '&new_price=' + new_price + '&used_price=' + used_price;
  if (brand_id == '' || model_id == '' || gear_type == '' || year == '' || used_price == '' || new_price == '') {
    alert("Please Fill All Fields");
    exit;
  } else if (isNaN(new_price) || isNaN(used_price)) {
    alert('Car Price must be integer numbers');
  } else {
    // AJAX code to submit form.
    $.ajax({
      type: 'POST',
      url: 'includes/fetch_data.php',
      data: dataString,    
      success: function (response) {
          alert(response);
      }
      
    });
    alert('Details verified');
  }
    return false;
}