<?php
include_once('../database/connect.php');

if(isset($_POST['back']))
{
	
		echo "<script>window.location.href='?quanly=categories'</script>";
		
	
}elseif(isset($_POST['confirm']))
{
	$id=$_GET['update'];
	$cate=$_POST['cate'];
	$rs=mysqli_query($con,"UPDATE categories SET name='$cate' WHERE id=$id");
	if($rs)
	{
		echo "<script>window.location.href='?quanly=categories'</script>";
	}else{
		echo "<script>alert(123)</script>";
	}
	echo "<script>alert('Update fail')</script>";
}
elseif(isset($_POST['add']))
{
	
	$add_cate=$_POST['add_cate'];
	$add_rs=mysqli_query($con,"INSERT INTO categories (name) VALUES('$add_cate')");
	if($add_rs)
	{
		echo "<script>window.location.href='?quanly=categories'</script>";
	}else{
		echo "<script>alert(123)</script>";
	}
	
}elseif(isset($_GET['did']))
{
	try {
		$rs=mysqli_query($con,"delete from categories where id='$_GET[did]'");
		if(!$rs) {
			$error = "You cannot delete this row";
			throw new Exception($error);
		}  
		else
		{
			echo "<script>window.location.href='?quanly=categories'</script>";
		}
		
	} catch (Exception $e) {
		echo "<script>window.location.href='?quanly=categories'</script>";
		echo $e->getMessage();
		
	}
	
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
											<th class="text-center">Name</th>
											<th class="text-center">Manage</th>
											<th class="text-center">Check</th>
										</tr>
									</thead>
									<tbody>
									<?php 
										$cate=mysqli_query($con,"SELECT * from categories ");
										while($row_cate=mysqli_fetch_array($cate)){
									?>
										<tr>
											
											<td class="text-center"><?php echo $row_cate['id'] ?></td>
											<?php
												if(isset($_GET['update']) &&$_GET['update']==$row_cate['id'])
												{
												
											?>
											<form action="" method="post">
											<td class="text-center">
												
												<input name="cate" style="
													width: 50%;
													text-align: center;
													display: inline-table;
												"  type="text" class="form-control" placeholder="<?php echo $row_cate['name'] ?>">
											
											<td class="text-center"><button name="confirm" class="btn btn-primary">Confirmed</button> <button name="back" class="btn btn-secondary">Back</button></td>
											
											
											</form>
											<td class="text-center"><a class="align-middle" href=""><i class="align-middle" data-feather="eye"></i></a></td>		
											</td>
											<?php
												}else{
											?>
											<td class="text-center"><?php echo $row_cate['name'] ?></td>
											<td class="text-center"><a class="align-middle" href="?quanly=categories&update=<?php echo $row_cate['id'] ?>"><i class="align-middle" data-feather="edit"></i></a> <?php echo "<a class='align-middle' href=\"javascript:delproduct(id=".$row_cate['id'].")\"><i class='align-middle' data-feather='trash'></i></a>";?> </td>
											
											<td class="text-center"><a class="align-middle" href="?quanly=categories&check=<?php echo $row_cate['id'] ?>"><i class="align-middle" data-feather="eye"></i></a></td>
											<?php
												}
											?>
											
										</tr>
										<?php
										}
										?>

										
									</tbody>
								</table>
								
							</div>

							
						</div>

						<div class="col-12 col-lg-4">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0"> Add category</h5>
								</div>
								<form action="" method="post">
								<div class="card-body ">
									<input name="add_cate" type="text" class="form-control" placeholder="Name">
								</div>
								<div class="text-center">
								<button name="add" class="btn btn-success btn-lg">Add</button>
								</div>
								
								</form>
								
							</div>

							
        
								
							
						</div>
					</div>

				</div>
			</main>
		<?php
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
											<th class="text-center">Image</th>
											<th class="text-center">Title</th>
											<th class="text-center">Type</th>
											<th class="text-center">Price</th>
											<th class="text-center">Quantity</th>
										</tr>
									</thead>
									<tbody>
									<?php 
										$clothes=mysqli_query($con,"SELECT * from clothes where category='$id' ");
										while($row_clothes=mysqli_fetch_array($clothes)){
									?>
										<tr>
											
											<td style="width:10%" class="text-center"><?php echo $row_clothes['id']?></td>
											<td style="width:40%" class="text-center ">
												<div class="col-6 col-md-4 col-lg-4 col-xl-3 d-inline-block">
													<img src=".<?php echo $row_clothes['img']?>" class="img-fluid pe-2" alt="Unsplash">
												</div>
												
											</td>
											<td  style="width:20%" class="text-center"><?php echo $row_clothes['title']?></td>
											<td  style="width:20%" class="text-center"><?php echo $row_clothes['sex']?></td>

											<td  style="width:10%" class="text-center"><?php echo $row_clothes['price']?>$</td>
											<td  style="width:10%" class="text-center"><?php echo $row_clothes['quantity']?></td>
											
											
											
											
											
											
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
		?>
		
		<script>
    function delproduct(id){
        var msg = confirm("Are you sure you want to delete this product?");

    if (msg) {
        window.location.href = "?quanly=categories&did="+id;
    }
    }
    </script>
			