<?php
include_once('../database/connect.php');
?>
<main class="content">
				<div class="container-fluid p-0">
						<div class="col-md-12 col-xl-12">
							<div class="card">
								<div class="card-header">

									<h5 class="card-title mb-0">Rating</h5>
								</div>
								<div class="card-body h-100">
									<?php 
										$cmt=mysqli_query($con,"SELECT value,comment,clothes.title as cloth_name,users.name as user_name,ratings.date FROM ratings,users,clothes WHERE ratings.user_id=users.id and ratings.clothing_id=clothes.id");
										
										while($row_cmt=mysqli_fetch_array($cmt)){
											
									?>
									<div class="d-flex align-items-start">
										<!-- <img src="" width="36" height="36" class="rounded-circle me-2" alt=""> -->
										<div class="flex-grow-1">
											<!-- <small class="float-end text-navy">30m ago</small> -->
											<strong><?php echo $row_cmt['user_name'] ?></strong> posted on <strong><?php echo $row_cmt['cloth_name'] ?></strong>'s rating<br />
											<div class="d-flex">
											<small style="margin-right: 10px;" class="text-muted"><?php echo $row_cmt['date'] ?></small>
											<?php
											for($i=0;$i<$row_cmt['value'];$i++)
											{

											
											?>
											<i style="margin-left: 5px;" class="align-middle" data-feather="star"></i>
											<?php
											}
											?>
										</div>
											

											<div class="border text-sm text-muted p-2 mt-1">
												<?php echo $row_cmt['comment'] ?>
											</div>

											<!-- <a href="#" class="btn btn-sm btn-danger mt-1"><i class="feather-sm" data-feather="heart"></i> Like</a> -->
										</div>
									</div>
									<!-- <hr /> -->
									<?php
										}
									?>

									
									<!-- <div class="d-flex align-items-start">
										<img src="img/avatars/avatar.jpg" width="36" height="36" class="rounded-circle me-2" alt="Charles Hall">
										<div class="flex-grow-1">
											<small class="float-end text-navy">30m ago</small>
											<strong>Charles Hall</strong> posted something on <strong>Christina Mason</strong>'s timeline<br />
											<small class="text-muted">Today 7:21 pm</small>

											<div class="border text-sm text-muted p-2 mt-1">
												Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus
												pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante.
											</div>

											<a href="#" class="btn btn-sm btn-danger mt-1"><i class="feather-sm" data-feather="heart"></i> Like</a>
										</div>
									</div>

									<hr />
									<div class="d-flex align-items-start">
										<img src="img/avatars/avatar-4.jpg" width="36" height="36" class="rounded-circle me-2" alt="Christina Mason">
										<div class="flex-grow-1">
											<small class="float-end text-navy">1h ago</small>
											<strong>Christina Mason</strong> posted a new blog<br />

											<small class="text-muted">Today 6:35 pm</small>
										</div>
									</div>

									<hr />
									<div class="d-flex align-items-start">
										<img src="img/avatars/avatar-2.jpg" width="36" height="36" class="rounded-circle me-2" alt="William Harris">
										<div class="flex-grow-1">
											<small class="float-end text-navy">3h ago</small>
											<strong>William Harris</strong> posted two photos on <strong>Christina Mason</strong>'s timeline<br />
											<small class="text-muted">Today 5:12 pm</small>

											<div class="row g-0 mt-1">
												<div class="col-6 col-md-4 col-lg-4 col-xl-3">
													<img src="img/photos/unsplash-1.jpg" class="img-fluid pe-2" alt="Unsplash">
												</div>
												<div class="col-6 col-md-4 col-lg-4 col-xl-3">
													<img src="img/photos/unsplash-2.jpg" class="img-fluid pe-2" alt="Unsplash">
												</div>
											</div>

											<a href="#" class="btn btn-sm btn-danger mt-1"><i class="feather-sm" data-feather="heart"></i> Like</a>
										</div>
									</div>

									<hr />
									<div class="d-flex align-items-start">
										<img src="img/avatars/avatar-2.jpg" width="36" height="36" class="rounded-circle me-2" alt="William Harris">
										<div class="flex-grow-1">
											<small class="float-end text-navy">1d ago</small>
											<strong>William Harris</strong> started following <strong>Christina Mason</strong><br />
											<small class="text-muted">Yesterday 3:12 pm</small>

											<div class="d-flex align-items-start mt-1">
												<a class="pe-3" href="#">
								<img src="img/avatars/avatar-4.jpg" width="36" height="36" class="rounded-circle me-2" alt="Christina Mason">
							</a>
												<div class="flex-grow-1">
													<div class="border text-sm text-muted p-2 mt-1">
														Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus.
													</div>
												</div>
											</div>
										</div>
									</div>

									<hr />
									<div class="d-flex align-items-start">
										<img src="img/avatars/avatar-4.jpg" width="36" height="36" class="rounded-circle me-2" alt="Christina Mason">
										<div class="flex-grow-1">
											<small class="float-end text-navy">1d ago</small>
											<strong>Christina Mason</strong> posted a new blog<br />
											<small class="text-muted">Yesterday 2:43 pm</small>
										</div>
									</div>

									<hr />
									<div class="d-flex align-items-start">
										<img src="img/avatars/avatar.jpg" width="36" height="36" class="rounded-circle me-2" alt="Charles Hall">
										<div class="flex-grow-1">
											<small class="float-end text-navy">1d ago</small>
											<strong>Charles Hall</strong> started following <strong>Christina Mason</strong><br />
											<small class="text-muted">Yesterdag 1:51 pm</small>
										</div>
									</div> -->

									<!-- <hr /> -->
									<!-- <div class="d-grid">
										<a href="#" class="btn btn-primary">Load more</a>
									</div> -->
								</div>
							</div>
						</div>
				</div>
</main>
				
			
