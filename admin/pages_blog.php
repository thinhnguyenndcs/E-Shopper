<?php
include_once('../database/connect.php');

if(isset($_POST['back']))
{
	
		echo "<script>window.location.href='?quanly=categories'</script>";
		
	
}if(isset($_POST['add_blog']))
{
	$date = date('Y-m-d H:i:s');
	$title_blog_=$_POST['title'];
	$brieft_=$_POST['bre'];
	
	$hinhanh=$_FILES['hinhanh']['name'];
	
	$hinhanh_tmp=$_FILES['hinhanh']['tmp_name'];
	
	$content=$_POST['content'];
	
	$author=$_SESSION["dangnhap"];
	$cmt=$_POST['cmt'];
	$path='../images/blog/';
	$img='./images/blog/'.$hinhanh;
	$sql_insert_blog=mysqli_query($con,"INSERT INTO `blog` ( title, brieft, content, img, date,author,cmt) VALUES ('$title_blog_', '$brieft_', '$content', '$img', '$date','$author','$cmt');");
	// $count_blog=mysqli_query($con,"SELECT max(id) as id from blog ");
	// $rs=mysqli_fetch_assoc($count_blog);
	// $id_blog=$rs['id'];
	// $sql_insert_author=mysqli_query($con,"INSERT INTO user_blog ( blog_id, role, content, name, date) VALUES ( '$id_blog', 'author', '$content', ".$_SESSION["dangnhap"].", '$date');");
	// echo $id_blog;


	move_uploaded_file($hinhanh_tmp,$path.$hinhanh);
	
}
elseif(isset($_POST['update_blog']))
{
	$date = date('Y-m-d H:i:s');
	$title_blog_=$_POST['title'];
	$brieft_=$_POST['bre'];
	
	$hinhanh=$_FILES['hinhanh']['name'];
	
	$hinhanh_tmp=$_FILES['hinhanh']['tmp_name'];
	
	$content=$_POST['content'];
	
	$cmt=$_POST['cmt'];
	
	
	$path='../images/blog/';
	$img='./images/blog/'.$hinhanh;
	if($hinhanh=='')
	{
		$sql_insert_blog=mysqli_query($con,"UPDATE `blog` SET title = ".$title_blog_." , brieft = ".$brieft_.", content = ".$content." ,cmt='$cmt' WHERE  id=".$_GET['update']."");
	}else{
		
		move_uploaded_file($hinhanh_tmp,$path.$hinhanh);
		$sql_insert_blog=mysqli_query($con,"UPDATE `blog` SET title = ".$title_blog_.",brieft=".$brieft_.",content=".$content.",img='$img',cmt='$cmt' WHERE  id=".$_GET['update']."");
		

	}
	
	echo "<script>window.location.href='?quanly=blog'</script>";
	


	
	
	
	
}
elseif(isset($_GET['delete']))
{
	
	mysqli_query($con,"DELETE FROM blog where id=".$_GET['delete']."");
	echo "<script>window.location.href='?quanly=blog'</script>";
}

?>
			<main class="content">
				<div class="container-fluid p-0">

					<div class="mb-3">
						<h1 class="h3 d-inline align-middle">Blog</h1>
						
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
											
											<th class="text-center">Brieft</th>
											
											
										</tr>
									</thead>
									<tbody>
									<?php 
										$blog=mysqli_query($con,"SELECT * from blog");
										$i=0;
										while($row_blog=mysqli_fetch_array($blog)){
											$i++;
									?>
										<tr id="item" >
											
											<td class="text-center"><?php echo $i ?></td>
											<td  class="text-center">
												<img style="width: 100px;height:100px" src=".<?php echo $row_blog['img'] ?>" alt="">
											</td>
											<td style="width: 20px;"class="text-center"><?php echo $row_blog['title'] ?></td>
											<td style="width:50%" class="text-center"><?php echo $row_blog['brieft'] ?></td>
											
											
											
											<td  class="text-center"><a href="?quanly=blog&update=<?php echo $row_blog['id']?>" class="align-middle"> <i class="align-middle" data-feather="edit"></i></a>  <a class='align-middle' href="?quanly=blog&delete=<?php echo $row_blog['id'] ?>" onclick="return confirm('Are you sure you want to delete this item')"><i class='align-middle' data-feather='trash'></i></a></td>
											
											
											
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
									<h5 class="card-title mb-0"> Update Blog</h5>
								</div>
								<form action="" method="post" enctype="multipart/form-data">
								<div class="card-body ">
									
								
								<h5 class="card-title mb-0">Image</h5>
								<input type="file" placeholder="Thêm hình ảnh" name="hinhanh" class="form-control mb-3">
								
									<h5 class="card-title mb-0">Title</h5>
									<textarea name="title" class="form-control mb-3" rows="2" placeholder="Title"></textarea>
								
									<h5 class="card-title mb-0">Brieft</h5>
									<textarea name="bre" class="form-control mb-3" rows="2" placeholder="Brieft"></textarea>
								
									<h5 class="card-title mb-0">Content</h5>
									<textarea name="content" class="form-control mb-3" rows="2" placeholder="Content"></textarea>
									<h5 class="card-title mb-0">Comment</h5>
									<textarea name="cmt" class="form-control mb-3" rows="2" placeholder="Comment"></textarea>
									<!-- <h5 class="card-title mb-0">Comment</h5>
									<textarea name="cmt" class="form-control mb-3" rows="2" placeholder="Comment"></textarea> -->
								<div class="text-center">
								<button name="update_blog" class="btn btn-success btn-lg">Update</button>
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
									<h5 class="card-title mb-0"> Add Blog</h5>
								</div>
								<form action="" method="post" enctype="multipart/form-data">
								<div class="card-body ">
									
								
								<h5 class="card-title mb-0">Image</h5>
								<input type="file" placeholder="Thêm hình ảnh" name="hinhanh" class="form-control mb-3">
								
									<h5 class="card-title mb-0">Title</h5>
									<textarea name="title" class="form-control mb-3" rows="2" placeholder="Title"></textarea>
								
									<h5 class="card-title mb-0">Brieft</h5>
									<textarea name="bre" class="form-control mb-3" rows="2" placeholder="Brieft"></textarea>
								
									<h5 class="card-title mb-0">Content</h5>
									<textarea name="content" class="form-control mb-3" rows="2" placeholder="Content"></textarea>
									<h5 class="card-title mb-0">Comment</h5>
									<textarea name="cmt" class="form-control mb-3" rows="2" placeholder="Comment"></textarea>
									<!-- <h5 class="card-title mb-0">Comment</h5>
									<textarea name="cmt" class="form-control mb-3" rows="2" placeholder="Comment"></textarea> -->
								<div class="text-center">
								<button name="add_blog" class="btn btn-success btn-lg">Add</button>
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