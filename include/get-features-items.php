<?php
$query = "select * from clothes where clothes.status='active'";
$result = mysqli_query($con, $query);
$maxitem = 6;
$num_item_on_cart = 0;
$session_value ='';
if (isset($_SESSION['id_account'])) {
	$session_value = $_SESSION['id_account'];
}

while ($row = mysqli_fetch_array($result)) {
	if ($row[0] == $maxitem + 1) {
		break;
	}
	$title = $row["title"];
	$price = $row["price"];
	$img = $row["img"];
	$id = $row['id'];
	$remain_quantity = $row['quantity'];
?>
	<div class="col-sm-4">
		<div class="product-image-wrapper">
			<div class="single-products">
			<input type="hidden" id="session-value" value="<?php echo $session_value ?>">
				<div class="productinfo text-center">
					<img src="<?= $img; ?>" alt="" />
					<h2><?= $price; ?>$</h2>
					<p><?php if (str_word_count($title) > 4) {
							$piece = explode(" ", $title);
							$title = implode(" ", array_splice($piece, 0, 4));
							echo "$title ...";
						} else echo $title; ?></p>
					<?php
					if ($session_value != '') {
						$query2 = "SELECT cart_details.quantity, clothes.quantity 
						as cart_check FROM `cart_details`  
						inner join `carts` on carts.id=cart_details.cart_id 
						inner join `clothes` on cart_details.clothing_id=clothes.id WHERE cart_details.clothing_id = '$id' and carts.user_id = '$session_value'";
						$check_cart = mysqli_query($con, $query2);
						$num_item_on_cart=0;
						if ($check_cart->num_rows != 0) {
							$row = mysqli_fetch_row($check_cart);
							$num_item_on_cart = $row[0];
						}
					}
					?>
					<?php
								if ($remain_quantity > 0) {
									echo "<button id='add-to-cart' class='btn btn-default add-to-cart'  product-id='".$id."' remain-quantity='". $remain_quantity."' num-item-on-cart='". $num_item_on_cart."'>
									<i class='fa fa-shopping-cart'></i>Add to cart</button>";
								} else {
									echo "<button class='btn btn-default add-to-cart'><i class='fa-solid fa-sync fa-spin'></i>Out of Stock</button>";
								}
								?>
					
				</div>
				<div class="product-overlay">
					<div class="overlay-content">
						<h2><?= $price; ?>$</h2>
						<p><?= $title; ?></p>
						<?php
								if ($remain_quantity > 0) {
									echo "<button id='add-to-cart' class='btn btn-default add-to-cart'  product-id='".$id."' remain-quantity='". $remain_quantity."' num-item-on-cart='". $num_item_on_cart."'>
									<i class='fa fa-shopping-cart'></i>Add to cart</button>";
								} else {
									echo "<button class='btn btn-default add-to-cart'><i class='fa-solid fa-sync fa-spin'></i>Out of Stock</button>";
								}
								?>
					</div>
				</div>
			</div>
			<div class="choose">
				<ul class="nav nav-pills nav-justified">
					<li><a href="?quanly=product&id=<?php echo $id ?>"><i class="fa fa-plus-square"></i>Detail</a></li>

				</ul>
			</div>
		</div>
	</div>
<?php }	?>	