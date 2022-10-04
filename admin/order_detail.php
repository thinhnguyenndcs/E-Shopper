<?php
include_once('../database/connect.php');
?>
			<main class="content">
				<div class="container-fluid p-0">

					

					
					<div class="col-12 col-lg-12 col-xxl-12 d-flex">
							<div class="card flex-fill">
								<div style="display: flex;
    							justify-content: space-between;" class="card-header">

									<h5 class="card-title mb-0">Order </h5>
									<a href="?quanly=home"><i class="align-middle" data-feather="corner-up-left"></i></a>
								</div>
								<table class="table table-hover my-0">
									<thead>
										<tr>
											<th class="text-center">Id</th>
											<th class="d-none d-xl-table-cell text-center">Img</th>
											<th class="d-none d-xl-table-cell text-center">Title</th>
											<th class="d-none d-xl-table-cell text-center">Quantity</th>
											<th class="d-none d-md-table-cell text-center">Total</th>
											
										</tr>
									</thead>
									<tbody>
									<?php 
										$order_detail=mysqli_query($con,"SELECT img,title,order_details.quantity,clothes.price*order_details.quantity as total FROM clothes,order_details,orders WHERE orders.id=".$_GET['od']." and orders.id=order_details.order_id and order_details.clothing_id=clothes.id");
										$i=0;
										$sum=0;
										while($row_order_detail=mysqli_fetch_array($order_detail)){
											$i++;
											$sum+=$row_order_detail['total'];
									?>
										<tr>
											<td class="text-center"><?php echo $i ?></td>
											<td class="text-center '">
												
													<img style='height:150px; width=350px' src=".<?php echo $row_order_detail['img'] ?>" class="img-fluid pe-2" alt="Unsplash">
												
												
											</td>
											<td class="d-none d-xl-table-cell text-center"><?php echo $row_order_detail['title'] ?></td>
											<td class="d-none d-xl-table-cell text-center"><?php echo $row_order_detail['quantity'] ?></td>
											<td class="d-none d-md-table-cell text-center"><?php echo $row_order_detail['total'] ?></td>
											
										</tr>
										<?php
										}
										?>
										<tr>
											<td class="text-center">Total</td>
											<td></td>
											<td></td>
											<td></td>
											<td class="text-center"><?php echo $sum; ?></td>
										</tr>
									</tbody>
								</table>
								

									
								
							</div>
						</div>

				</div>
			</main>
<?php if(isset($_GET['id']))
	{
		$id_cus=$_GET['id'];
	
?>
			<main class="content pt-0">
				<div class="container-fluid p-0">

					

					
					<div class="col-12 col-lg-12 col-xxl-12 d-flex">
							<div class="card flex-fill">
							<div class="card-header">
								<?php 
										$name=mysqli_query($con,"SELECT * from users where id=$id_cus");
										$row_name=mysqli_fetch_array($name);
										$order_cus=mysqli_query($con,"SELECT * from orders where user_id=$id_cus");
										
									?>
									<h5 class="card-title mb-0">Order ' <?php echo $row_name['name'] ;?></h5>
							</div>
								<table class="table table-hover my-0">
									<thead>
										<tr>
											<th>Id</th>
											<th class="d-none d-xl-table-cell">Status</th>
											<th class="d-none d-xl-table-cell">Voucher</th>
											<th class="d-none d-xl-table-cell">Total</th>
											<th class="d-none d-md-table-cell">CreateDate</th>
											
										</tr>
									</thead>
									<tbody>
									<?php 
										
										while($row_order_cus=mysqli_fetch_array($order_cus)){
									?>
										<tr>
											<td class="d-none d-xl-table-cell"><?php echo $row_order_cus['id']; ?></td>
											<?php
												if ($row_order_cus['status']=='confirmed')
												{
											?>
											
											<td><span class="badge bg-primary">Confirmed</span></td>
											<?php
												}elseif($row_order_cus['status']=='cancelled')
												{
											?>
											<td><span class="badge bg-danger">Cancelled</span></td>
											<?php
												}elseif($row_order_cus['status']=='completed')
												{
											?>
											<td><span class="badge bg-success">Completed</span></td>
											<?php
												}else
												{
											?>
											<td><span class="badge bg-info">shipping</span></td>
											<?php
												}
											?>
											
											<td class="d-none d-xl-table-cell"><?php echo $row_order_cus['voucher'] ?></td>
											<td class="d-none d-xl-table-cell"><?php echo $row_order_cus['total'] ?></td>
											<td class="d-none d-xl-table-cell"><?php echo $row_order_cus['createdAt'] ?></td>
											
										</tr>
										<?php
										}
										?>
										
									</tbody>
								</table>
							</div>
						</div>

				</div>
			</main>

<?php
	}

?>
			