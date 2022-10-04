<?php
include('database/connect.php');
if (isset($_GET['category'])) {
	$category = $_GET['category'];
	$id;
	$sql_temp = mysqli_query($con, "SELECT * FROM categories"); // bool
	while ($res = mysqli_fetch_array($sql_temp)) {
		if ($res['name'] == $category)
			$id = $res['id'];
		else
			continue;
	}
	$sql_product = mysqli_query($con, "SELECT * FROM clothes WHERE '$id' = category AND clothes.status ='active'");
} else $sql_product = mysqli_query($con, "SELECT * FROM clothes WHERE clothes.status='active' ORDER BY category");
?>
<div class="col-sm-9 padding-left ">
	<div class="row features_items">
		<!--features_items-->
		<h2 class="title text-center">Features Items</h2>
		<?php
		if (mysqli_num_rows($sql_product) > 0) {
			while ($product = mysqli_fetch_array($sql_product)) {
		?>
				<div class="col-sm-4">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<?php
								$num_item_on_cart = 0;
								if (isset($_SESSION['id_account'])) {
									$session_value = $_SESSION['id_account'];
									$id = $product['id'];
									$query = "SELECT cart_details.quantity, clothes.quantity 
											as cart_check FROM `cart_details`  
											inner join `carts` on carts.id=cart_details.cart_id 
											inner join `clothes` on cart_details.clothing_id=clothes.id WHERE cart_details.clothing_id = '$id' and carts.user_id = '$session_value'";
									$check_cart = mysqli_query($con, $query);
									$num_item_on_cart=0;
									if ($check_cart->num_rows != 0) {
										$row = mysqli_fetch_row($check_cart);
										$num_item_on_cart = $row[0];
									}
								} else {
									$session_value = '';
								}
								?>
								<input type="hidden" id="session-value" value="<?php echo $session_value ?>">
								<!--check total item after adding is out of range-->
								<img id="product-img" src=" <?php echo  $product['img'] ?> " alt="Hình ảnh sản phẩm" />
								<h2 id="product-price"> $ <?php echo $product['price'] ?>$</h2>
								<p id="product-title"> <?php $title = $product['title'];
														if (str_word_count($title) > 4) {
															$piece = explode(" ", $title);
															$title = implode(" ", array_splice($piece, 0, 4));
															echo "$title ...";
														} else echo $title;
														?></p>
								<?php
								if ($product['quantity'] > 0) {
									echo "<button id='add-to-cart' class='btn btn-default add-to-cart'  product-id='" . $product['id'] . "' remain-quantity='" . $product['quantity'] . "' num-item-on-cart='".$num_item_on_cart ."'>
									<i class='fa fa-shopping-cart'></i>Add to cart</button>";
								} else {
									echo "<button class='btn btn-default add-to-cart'><i class='fa-solid fa-sync fa-spin'></i>Out of Stock</button>";
								}
								?>

							</div>

							<div class="product-overlay">
								<div class="overlay-content">
									<h2> $ <?php echo $product['price'] ?>$</h2>
									<p> <?php echo $product['title'] ?> </p>

									<?php if ($product['quantity'] > 0) {
										echo "<button id='add-to-cart' class='btn btn-default add-to-cart'  product-id='" . $product['id'] . "' remain-quantity='" . $product['quantity'] ."' num-item-on-cart='".$num_item_on_cart ."'>
										<i class='fa fa-shopping-cart'></i>Add to cart</button>";
									}
									?>
								</div>
							</div>

						</div>
						<div class="choose">
							<ul class="nav nav-pills nav-justified">
								<li><a href="?quanly=product&id=<?php echo $product['id'] ?>"><i class="fa fa-plus-square"></i>Detail</a></li>

							</ul>
						</div>
					</div>



				</div>
		<?php }
		} ?>


	</div>
	<!--features_items-->
	<!-- <ul class="pagination">
		<li class="active"><a href="">1</a></li>
		<li><a href="">2</a></li>
		<li><a href="">3</a></li>
		<li><a href="">&raquo;</a></li>
	</ul> -->
</div> <!-- space for item-->