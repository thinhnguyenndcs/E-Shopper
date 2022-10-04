<?php
include_once('../database/connect.php');
?>
			<main class="content">
				<div class="container-fluid p-0">

					

					
					<div class="col-12 col-lg-12 col-xxl-12 d-flex">
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0">User</h5>
								</div>
								<table class="table table-hover my-0">
									<thead>
										<tr>
											<th>Name</th>
											<th class="d-none d-xl-table-cell">Birthday</th>
											<th class="d-none d-xl-table-cell">Email</th>
											<th class="d-none d-xl-table-cell">Addres</th>
											<th class="d-none d-md-table-cell">Phone</th>
											<th class="d-none d-md-table-cell">CreateDate</th>
										</tr>
									</thead>
									<tbody>
									<?php 
										$custom=mysqli_query($con,"SELECT * from users where role='client'");
										while($row_custom=mysqli_fetch_array($custom)){
									?>
										<tr>
											<td><?php echo $row_custom['name'] ?></td>
											<td class="d-none d-xl-table-cell"><?php echo $row_custom['dateOfBirth'] ?></td>
											<td class="d-none d-xl-table-cell"><?php echo $row_custom['email'] ?></td>
											<td class="d-none d-xl-table-cell"><?php echo $row_custom['address'] ?></td>
											<td class="d-none d-md-table-cell"><?php echo $row_custom['phone_no'] ?></td>
											<td class="d-none d-md-table-cell"><?php echo $row_custom['createdAt'] ?></td>
											<td><a href="?quanly=user&id=<?php echo $row_custom['id']?>" class="align-middle"> <i class="align-middle" data-feather="eye"></i></a></td>
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
									<h5 class="card-title mb-0">Order ' <?php echo $row_name['name'] ?></h5>
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
											<td class="d-none d-xl-table-cell"><?php echo $row_order_cus['id'] ?></td>
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
			