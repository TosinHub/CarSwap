<?php 
$title = "Car Swap Admin Panel | Car Details";
include('includes/header.php');
include('includes/classes/carDetailsPaginate.php');


?>

<div id="page-wrapper">



	      <?php if(isset($_GET['delete'])) { 
			  if(Car::checkIfDetails($conn,$_GET['delete'])){
			 
			 ?>
      <div class="alert alert-danger">
          <?php 
          
  
          
          echo "This model <b>(".$_GET['name'].")</b> is associated with some car details, you can't delete it";
          
          
          ?>
       </div>   
	  <?php } else{
		  Car::deleteModel($conn,$_GET['delete']);
?>
 <div class="alert alert-success">
          <?php 
          
  
          
          echo "Model deleted";
          
          
          ?>
       </div>  

<?php

	  }
		  } 
	  ?> 
	      <?php if(isset($_GET['success'])) { ?>
      <div class="alert alert-success">
          <?php 
          
  
          
          echo $_GET['success'];
          
          
          ?>
       </div>   
      <?php } ?> 
<div class="panel panel-primary" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
							<div class="panel-heading">
								<center><h2>Car Models</h2></center>
							
								<div class="panel-ctrls" data-actions-container="" data-action-collapse="{&quot;target&quot;: &quot;.panel-body&quot;}"><span class="button-icon has-bg"><i class="ti ti-angle-down"></i></span></div>
							</div>
							 <div class="form-group">
        <input type="text" class="search form-control" placeholder="What you looking for?">
    </div>
							<div class="panel-body no-padding" style="display: block;">
								<table class="table table-striped" id="userTbl">
									<thead>
										<tr class="success">
											<th>Car Brand</th>
											<th>Car Model</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
                                                    <?php 
                                                    

                                                       
		$paginate = new Paginate($conn);
        $query = "SELECT * FROM car_model";       
		$products_per_page=10;
		$newquery = $paginate->paging($query,$products_per_page);
		$paginate->carModelView($newquery);
				
		?>
										
										
									</tbody>
								</table>
                                  <center>
                    	  <nav>
						  <ul class="pagination">
						<?php 	$paginate->paginglink($query,$products_per_page); ?></ul>
						</nav>
						<nav>
                        </centre>
							</div>
						</div>
                    </div> 
                      

                    <?php include('includes/footer.php');   