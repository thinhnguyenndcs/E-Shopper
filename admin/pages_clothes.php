<?php
include_once('../database/connect.php');

if(isset($_POST['back']))
{
	
		echo "<script>window.location.href='?quanly=categories'</script>";
		
	
}if(isset($_POST['add']))
{
	$tensanpham=$_POST['item'];
	$status=$_POST['status'];
	$chitiet=$_POST['des'];
	
	$hinhanh=$_FILES['hinhanh']['name'];
	
	$hinhanh_tmp=$_FILES['hinhanh']['tmp_name'];
	$hinhanh_tmp1=$_FILES['hinhanh']['tmp_name'];
	$giasanpham=$_POST['price'];
	
	$danhmuc=$_POST['cate'];
	$sex=$_POST['sex'];
	$soluong=$_POST['quantity'];
	$pa='./images/';
	$path='../images/';
	$sql_insert_sanpham=mysqli_query($con,"INSERT INTO `clothes` (`id`, `status`, `img`, `title`, `description`, `category`, `sex`, `price`, `quantity`) VALUES (NULL, '$status', '$pa$hinhanh', '$tensanpham', '$chitiet', '$danhmuc', '$sex', '$giasanpham', '$soluong');");
	
	move_uploaded_file($hinhanh_tmp,$path.$hinhanh);
	
	
}
elseif(isset($_POST['update']))
{
	$tensanpham=$_POST['item'];
	$status=$_POST['status'];
	$chitiet=$_POST['des'];
	
	$hinhanh=$_FILES['hinhanh']['name'];
	
	$hinhanh_tmp=$_FILES['hinhanh']['tmp_name'];
	
	$giasanpham=$_POST['price'];
	
	$danhmuc=$_POST['cate'];
	$sex=$_POST['sex'];
	$soluong=$_POST['quantity'];
	$pa='./images/';
	$path='../images/';
	if($hinhanh=='')
	{
		
		$sql_update_sanpham=mysqli_query($con,"UPDATE`clothes` set  `status`='$status', `title`='$tensanpham', `description`='$chitiet', `category`='$danhmuc', `sex`='$sex', `price`='$giasanpham', `quantity`='$soluong' where id=".$_GET['update']."");
	}else{
		move_uploaded_file($hinhanh_tmp,$path.$hinhanh);
		move_uploaded_file($hinhanh_tmp,$pa.$hinhanh);
		$img=$path.$hinhanh;
		



		$sql_update_sanpham=mysqli_query($con,"UPDATE clothes set  status='$status', img='$pa$img', title='$tensanpham', description='$chitiet', category='$danhmuc', sex='$sex', price='$giasanpham', quantity='$soluong' where id=".$_GET['update']."");
		// if(!$sql_update_sanpham)
		// {
			
		// }else{
			
		// 	echo $tensanpham;
		// echo $status;

		// echo $img;
		// echo $tensanpham;
		// echo $chitiet;
		// echo $danhmuc;
		// echo $sex;
		// echo $soluong;
		// echo $giasanpham;
		// echo $_GET['update'];
		// }
	}
	echo "<script>window.location.href='?quanly=clothes'</script>";
	


	
	
	
	
}
elseif(isset($_GET['delete']))
{
	
	mysqli_query($con,"DELETE FROM clothes where id=".$_GET['delete']."");
	echo "<script>window.location.href='?quanly=clothes'</script>";
}

?>
			<main class="content">
				<div class="container-fluid p-0">

					<div class="mb-3">
						<h1 class="h3 d-inline align-middle">Categories</h1>
						
					</div>
					<div class="row">
						<div class="col-12 col-lg-12 col-xxl-8 ">
							<div class="card">
								
								<table class="table table-hover my-0">
									<thead>
										<tr>
											<th class="text-center">Id</th>
						
											<th class="text-center">Img</th>
											<th class="text-center">Title</th>
											
											<th class="text-center">Category</th>
											<th class="text-center">Sex</th>
											<th class="text-center">Price</th>
											<th class="text-center">Quantity</th>
										</tr>
									</thead>
									<tbody>
									<?php 
										$clo=mysqli_query($con,"SELECT clothes.id as id,img,title,description,sex,price,categories.name,quantity FROM clothes,categories WHERE clothes.category=categories.id order by clothes.id desc");
										$i=0;
										while($row_clo=mysqli_fetch_array($clo)){
											$i++;
									?>
										<tr id="item" >
											
											<td class="text-center"><?php echo $i ?></td>
											<td class="text-center">
												<img style="width: 100px;height:100px" src=".<?php echo $row_clo['img'] ?>" alt="">
											</td>
											<td style="width: 20%;"class="text-center"><?php echo $row_clo['title'] ?></td>
											<td style="width:20px" class="text-center"><?php echo $row_clo['name'] ?></td>
											<td style="width:20px" class="text-center"><?php echo $row_clo['sex'] ?></td>
											<td style="width:20px" class="text-center"><?php echo $row_clo['price'] ?></td>
											<td style="width:20px" class="text-center"><?php echo $row_clo['quantity'] ?></td>
											
											<td class="text-center"><a href="?quanly=clothes&update=<?php echo $row_clo['id']?>" class="align-middle"> <i class="align-middle" data-feather="edit"></i></a>  <a class='align-middle' href="?quanly=clothes&delete=<?php echo $row_clo['id'] ?>" onclick="return confirm('Are you sure you want to delete this item')"><i class='align-middle' data-feather='trash'></i></a></td>
											
											
											
										</tr>
										<?php
										}
										?>

										
									</tbody>
								</table>
								
							</div>

							
						</div>
						<?php
						if(isset($_GET['update']))
						{
							$update=mysqli_query($con,"SELECT * from clothes where id=".$_GET['update']."");
							$row_update=mysqli_fetch_array($update);
						?>
						<div class="col-12 col-lg-4">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0"> Update</h5>
								</div>
								<form action="" method="post" enctype="multipart/form-data">
								<div class="card-body ">
									<h5 class="card-title mb-0">Name Item</h5>
									<input name="item" type="text" class="form-control mb-3" placeholder="<?php echo $row_update['title']?>">
								
								<h5 class="card-title mb-0">Status</h5>
								<select name='status' class="form-select mb-3">
								<option selected>Status</option>
								<option value="hide">Hide</option>
								<option value="active">Active</option>
								<option value="delete">Delete</option>
								</select>

															
								
								<h5 class="card-title mb-0">Image</h5>
								<input type="file" placeholder="Thêm hình ảnh" name="hinhanh" class="form-control mb-3">
								
									<h5 class="card-title mb-0">Description</h5>
									<textarea name="des" class="form-control mb-3" rows="2" placeholder="<?php echo $row_update['description']?>"></textarea>
								
								
								<select name='cate' class="form-select mb-3">
								<option  selected>Categories</option>
								<?php
									$sql_select_danhmuc=mysqli_query($con,"SELECT * from categories order by id desc");
									while($row_select_danhmuc=mysqli_fetch_array($sql_select_danhmuc)){
								?>
								<option value="<?php echo $row_select_danhmuc['id'] ?>"><?php echo $row_select_danhmuc['name'] ?></option>
										<?php
									}
								?>
								
								</select>

															
								
								
								<select name='sex' class="form-select mb-3">
								<option  selected>Sex</option>
								
								<option value="men">Men</option>
								<option value="women">Woman</option>
								<option value="kid">Kid</option>
								<option value="unisex">Unisex</option>
								</select>
								
									<h5 class="card-title mb-0">Price</h5>
									<input name="price" type="text" class="form-control mb-3" placeholder="<?php echo $row_update['price']?>">
								
									<h5 class="card-title mb-0">Quantity</h5>
									<input name="quantity" type="number" class="form-control mb-3" placeholder="<?php echo $row_update['quantity']?>">
								</div>
															
								
								<div class="text-center">
								<button name="update" class="btn btn-success btn-lg">Update</button>
								</div>
								
								</form>
								
							</div>

							
        
								
							
						</div>
						<?php
						}else{
						?>
							<div class="col-12 col-lg-4">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0"> Add Item</h5>
								</div>
								<form action="" method="post" enctype="multipart/form-data">
								<div class="card-body ">
									<h5 class="card-title mb-0">Name Item</h5>
									<input name="item" type="text" class="form-control mb-3" placeholder="Name">
								
								<h5 class="card-title mb-0">Status</h5>
								<select name='status' class="form-select mb-3">
								<option selected>Status</option>
								<option value="hide">Hide</option>
								<option value="active">Active</option>
								<option value="delete">Delete</option>
								</select>

															
								
								<h5 class="card-title mb-0">Image</h5>
								<input type="file" placeholder="Thêm hình ảnh" name="hinhanh" class="form-control mb-3">
								
									<h5 class="card-title mb-0">Description</h5>
									<textarea name="des" class="form-control mb-3" rows="2" placeholder="Description"></textarea>
								
								
								<select name='cate' class="form-select mb-3">
								<option  selected>Categories</option>
								<?php
									$sql_select_danhmuc=mysqli_query($con,"SELECT * from categories order by id desc");
									while($row_select_danhmuc=mysqli_fetch_array($sql_select_danhmuc)){
								?>
								<option value="<?php echo $row_select_danhmuc['id'] ?>"><?php echo $row_select_danhmuc['name'] ?></option>
										<?php
									}
								?>
								
								</select>

															
								
								
								<select name='sex' class="form-select mb-3">
								<option  selected>Sex</option>
								
								<option value="men">Men</option>
								<option value="women">Woman</option>
								<option value="kid">Kid</option>
								<option value="unisex">Unisex</option>
								</select>
								
									<h5 class="card-title mb-0">Price</h5>
									<input name="price" type="text" class="form-control mb-3" placeholder="Price">
								
									<h5 class="card-title mb-0">Quantity</h5>
									<input name="quantity" type="number" class="form-control mb-3" placeholder="Quantity">
								</div>
															
								
								<div class="text-center">
								<button name="add" class="btn btn-success btn-lg">Add</button>
								</div>
								
								</form>
								
							</div>

							
        
								
							
						</div>
						<?php
						
						}?>
					</div>

				</div>
			</main>
		<!-- <?php
		if(isset($_GET['check']))
		{
			$id=$_GET['check'];
			$name_cate=mysqli_query($con,"SELECT * from categories where id=$id" );
			$row_name_cate=mysqli_fetch_array($name_cate);
		?>
			<main class="content pt-0">
				<div class="container-fluid p-0">

				
					<div class="row">
						<div class="col-12 col-lg-12 col-xxl-8 ">
							<div class="card">
								<h5 class="card-title">Items ' <?php echo $row_name_cate['name'] ?></h5>
								
								<table class="table table-hover my-0">
									<thead>
										<tr>
											<th class="text-center">Id</th>
											<th class="d-none d-xl-table-cell text-center">Image</th>
											<th class="d-none d-xl-table-cell text-center">Title</th>
											<th class="d-none d-xl-table-cell text-center">Type</th>
											<th class="d-none d-xl-table-cell text-center">Price</th>
											<th class="d-none d-xl-table-cell text-center">Quantity</th>
										</tr>
									</thead>
									<tbody>
									<?php 
										$clothes=mysqli_query($con,"SELECT * from clothes where category='$id' ");
										while($row_clothes=mysqli_fetch_array($clothes)){
									?>
										<tr>
											
											<td style="width:10%" class="text-center"><?php echo $row_clothes['id']?></td>
											<td style="width:40%" class="d-none d-xl-table-cell text-center ">
												<div class="col-6 col-md-4 col-lg-4 col-xl-3 d-inline-block">
													<img src="<?php echo $row_clothes['img']?>" class="img-fluid pe-2" alt="Unsplash">
												</div>
												
											</td>
											<td  style="width:20%" class="d-none d-xl-table-cell text-center"><?php echo $row_clothes['title']?></td>
											<td  style="width:20%" class="d-none d-xl-table-cell text-center"><?php echo $row_clothes['sex']?></td>

											<td  style="width:10%" class="d-none d-xl-table-cell text-center"><?php echo $row_clothes['price']?>$</td>
											<td  style="width:10%" class="d-none d-xl-table-cell text-center"><?php echo $row_clothes['quantity']?></td>
											
											
											
											
											
											
										</tr>
										<?php
										}
										?>

										
									</tbody>
								</table>
								
							</div>

							
						</div>
					</div>
				</div>
			</main>
		<?php
		}
		?> -->
		
		<script>
    function delitem(id){
        var msg = confirm("Are you sure you want to delete this product?");

    if (msg) {
        window.location.href = "?quanly=categories&did="+id;
    }
    }
    </script>