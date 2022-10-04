<?php
//include_once('../database/connect.php');
$query = "select * from clothes where clothes.status='active' ";
$result = mysqli_query($con, $query);
$group_item = '';
$item_list = array();
$i = 0;
$j = 0;
$num_item_on_cart = 0;
$session_value = '';
if (isset($_SESSION['id_account'])) {
	$session_value = $_SESSION['id_account'];
}

while ($row = mysqli_fetch_array($result)) {
	$id = $row['id'];
	$query2 = "SELECT cart_details.quantity, clothes.quantity 
											as cart_check FROM `cart_details`  
											inner join `carts` on carts.id=cart_details.cart_id 
											inner join `clothes` on cart_details.clothing_id=clothes.id WHERE cart_details.clothing_id = '$id' and carts.user_id = '$session_value'";
	$check_cart = mysqli_query($con, $query2);
	$num_item_on_cart=0;
	if ($check_cart->num_rows != 0) {
		$row1 = mysqli_fetch_row($check_cart);
		$num_item_on_cart = $row1[0];
	}
	$remain_quantity=$row['quantity'];
	if ($remain_quantity>0)
	{
		$temp = '<div class="col-sm-4">
		<div class="product-image-wrapper">
			<div class="single-products">
				<div class="productinfo text-center">
				<a href="?quanly=product&id=' . $row['id'] . '"> <img src="' . $row["img"] . '" alt="" /> </a> 
					<h2>' . $row["price"] . '</h2>
					<p>' . $row["title"] . '</p>
					<button id="add-to-cart" class="btn btn-default add-to-cart"  product-id="'.$id.'" remain-quantity="'. $remain_quantity.'" num-item-on-cart="'.$num_item_on_cart.'">
						<i class="fa fa-shopping-cart"></i>Add to cart</button>
				</div>                    
			</div>
		</div>
	</div>';
	}
	else{
		$temp = '<div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
							<a href="?quanly=product&id=' . $row['id'] . '"> <img src="' . $row["img"] . '" alt="" /> </a> 
                                <h2>' . $row["price"] . '</h2>
                                <p>' . $row["title"] . '</p>
                                <button class="btn btn-default add-to-cart"><i class="fa-solid fa-sync fa-spin"></i>Out of Stock</button>
                            </div>                    
                        </div>
                    </div>
                </div>';
	}
	
	array_push($item_list, $temp);
}
$item_list = array_reverse($item_list);
while (count($item_list) != 0) {
	if ($i == 0) {
		$group_item .= '<div class="item active">';
	} else {
		$group_item .= '<div class="item">';
	}
	for ($j = 0; $j <= 2; $j++) {
		$temp = array_pop($item_list);
		$group_item .= $temp;
	}
	$group_item .= '</div>';
	$i++;
}


?>
<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
	<div class="carousel-inner">
		<?php echo $group_item; ?>
	</div>
	<a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
		<i class="fa fa-angle-left"></i></a>
	<a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
		<i class="fa fa-angle-right"></i></a>
</div>