<?php

class paginate
{
	private $db;
	
	function __construct($conn)
	{
		$this->db = $conn;
	}
	
	public function CarDetailsview($query)
			{
				$stmt = $this->db->prepare($query);
				$stmt->execute();
			
				if($stmt->rowCount()>0)
				{
					while($row=$stmt->fetch(PDO::FETCH_ASSOC))
					{



						?>


						<tr class="info">
								<td><?php echo Car::getBrandName($this->db, $row['brand_id']) ?></td>
								<td><?php echo Car::getModelName($this->db, $row['model_id']) ?></td>
								<td><?php echo $row['gear_type']; ?></td>
								<td><?php echo $row['year']; ?></td>
								<td><?php echo $row['new_price']; ?></td>
								<td><?php echo $row['used_price']; ?></td>
								<td>
								<a href='edit_details?edit=<?php echo $row['id'] ?>'><button class="btn-success btn">Edit</button></a>
								<a href='car_details?delete=<?php echo $row['id'] ?>'><button class="btn-success btn">Delete</button></a>
																
								</td>
								</tr>
						
						<?php
					}

				}
				else
				{
					?>
					<tr>
					<td>No car details yet</td>
					</tr>
					<?php
				}
				
			}



	public function carModelView($query)
			{
				$stmt = $this->db->prepare($query);
				$stmt->execute();
			
				if($stmt->rowCount()>0)
				{
					while($row=$stmt->fetch(PDO::FETCH_ASSOC))
					{
						?>
						<tr class="info">
							<td><?php echo Car::getBrandName($this->db, $row['brand_id']) ?></td>
								
							<td><?php echo  $row['model_name'] ?></td>
							
							<td>
							<a href='edit_model?model_name=<?php echo $row['model_name'] ?>&brand_id=<?php echo $row['brand_id'] ?>&id=<?php echo $row['id'] ?>'><button class="btn-success btn">Edit</button></a>
								<a href='view_model.php?name=<?php echo $row['model_name'] ?>&delete=<?php echo $row['id'] ?>'><button class="btn-success btn">Delete</button></a>
																
							</td>
							</tr>
						
						<?php
					}

				}
				else
				{
					?>
					<tr>
					<td>No car swap request yet</td>
					</tr>
					<?php
				}
				
			}



	public function CarSwapRequest($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
	
		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
                 <tr class="info">
											<td><?php echo $row['name']; ?></td>
											<td><?php echo  $row['phone'] ?></td>
											<td><?php echo $row['email']; ?></td>
											<td><?php echo $row['inspect_date']; ?></td>
											<td><?php echo $row['inspection_time']; ?></td>
											<td><?php echo $row['type']; ?></td>
											<td>
                                            <a style="color:white" href='swap_details.php?user_session_id=<?php echo $row['user_session_id'] ?>'><button class="btn-success btn" >View Details</button></a>
                                            <a style="color:white" href='swap_details.php?user_session_id=<?php echo $row['user_session_id'] ?>'><button class="btn-success btn">View Details</button></a>
                                                                    
                                            </td>
											</tr>
	 			
                <?php
			}

		}
		else
		{
			?>
            <tr>
            <td>No car swap request yet</td>
            </tr>
            <?php
		}
		
	}



	
	public function paging($query,$products_per_page)
	{
		$starting_position=0;
		if(isset($_GET["page_no"]))
		{
			$starting_position=($_GET["page_no"]-1)*$products_per_page;
		}
		$query2=$query." limit $starting_position,$products_per_page";
		return $query2;
	}
	
	public function paginglink($query,$products_per_page)
	{
		
		$self = $_SERVER['PHP_SELF'];
		
		$stmt = $this->db->prepare($query);
		$stmt->execute();
		
		$total_no_of_products = $stmt->rowCount();
		
		if($total_no_of_products > 0)

		{
			
			$total_no_of_pages=ceil($total_no_of_products/$products_per_page);
			$current_page=1;
			if(isset($_GET["page_no"]))
			{
				$current_page=$_GET["page_no"];
			}
			if($current_page!=1)
			{
				$previous =$current_page-1;
				echo "<a href='".$self."?page_no=1'>First</a>&nbsp;&nbsp;";
				echo "<a href='".$self."?page_no=".$previous."'>Previous</a>&nbsp;&nbsp;";
			}
			for($i=1;$i<=$total_no_of_pages;$i++)
			{
				if($i==$current_page)
				{
					echo "<strong><a href='".$self."?page_no=".$i."' style='color:red;text-decoration:none'>".$i."</a></strong>&nbsp;&nbsp;";
				}
				else
				{
					echo "<a href='".$self."?page_no=".$i."'>".$i."</a>&nbsp;&nbsp;";
				}
			}
			if($current_page!=$total_no_of_pages)
			{
				$next=$current_page+1;
				echo "<a href='".$self."?page_no=".$next."'>Next</a>&nbsp;&nbsp;";
				echo "<a href='".$self."?page_no=".$total_no_of_pages."'>Last</a>&nbsp;&nbsp;";
			}

		}
	}
}