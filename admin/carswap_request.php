<?php 
$title = "Car Swap Admin Panel | Car Details";
include('includes/header.php');
include('includes/classes/carDetailsPaginate.php');

?>

<div id="page-wrapper">
<div class="panel panel-primary" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
							<div class="panel-heading">
								<center><h2>CarSwap Requests</h2></center>
							
								<div class="panel-ctrls" data-actions-container="" data-action-collapse="{&quot;target&quot;: &quot;.panel-body&quot;}"><span class="button-icon has-bg"><i class="ti ti-angle-down"></i></span></div>
							</div>
							<div class="panel-body no-padding" style="display: block;">
								<table class="table table-striped">
									<thead>
										<tr class="success">
											<th>Name</th>
											<th>Phone Number</th>
											<th>Email</th>
											<th>Inspection Date</th>
											<th>Inspection Time </th>
											<th>Client Type</th>
											<th>Action</th>

										</tr>
									</thead>
									<tbody>
                                                    <?php 
                                                    

                                                       
		$paginate = new Paginate($conn);
        $query = "SELECT * FROM reserve_information WHERE status = 1 ORDER BY reserve_id DESC";       
		$products_per_page=10;
		$newquery = $paginate->paging($query,$products_per_page);
		$paginate->CarSwapRequest($newquery);
				
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