<?php
	$id_user=$_SESSION['id_account'];
	$show_giohang=mysqli_query($con,"SELECT carts.id,carts.user_id,cart_details.clothing_id,clothes.status,clothes.img,clothes.title,clothes.price,cart_details.quantity,clothes.quantity as quantity_stock FROM carts,cart_details,clothes where carts.id=cart_details.cart_id and cart_details.clothing_id=clothes.id and carts.user_id=".$_SESSION['id_account']."");
	$subtotal=0;
	$tong=0;
	$items = '';
	$order_id = '';
	while($row_show_giohang=mysqli_fetch_array($show_giohang))
	{
		if($order_id == '') $order_id = $row_show_giohang['id'];
		$subtotal=$row_show_giohang['price']*$row_show_giohang['quantity'];
		$tong=$tong+$subtotal;
		$items .= "<tr>
			<td class='cart_product'>
				<img style='height:150px; width=350px' src='".$row_show_giohang['img']."' alt=''>
			</td>
			<td class='cart_description'>
				<h4>".$row_show_giohang['title']."</h4>
				<p>Web ID:".$row_show_giohang['id']."</p>
			</td>
			<td class='cart_price'>
				<p>".$row_show_giohang['price'].'$'."</p>
			</td>
			<td class='cart_quantity'>
				<div class='cart_quantity_button' style='display: flex; align-items: center; justify-content: center'>
					<input class='cart_quantity_input' type='text' name='quantity' value='".$row_show_giohang['quantity']."' autocomplete='off' size='2' disabled='true'>
				</div>
			</td>
			<td class='cart_total'>
				<p class='cart_total_price'>".$subtotal.'$'."</p>
			</td>
		</tr>";
	}
	if($rp_code=isset($_GET['vnp_ResponseCode'])){
		if($rp_code == '00'){
			echo 1;
		}
		else{

		}
	}
?>


<section id="cart_items">
		<div class="container">
			<div style="margin-bottom: 75px">
				<a href="?quanly=cart"><button class="button-32" role="button">< Back to Cart</button></a>
			</div>
			<div class="review-payment">
				<h2><b>Cart & Payment</h2>
			</div>

			<div class="table-responsive cart_info">
				<table class="table table-condensed" style="text-align: center">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description">Title</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
						</tr>
					</thead>
					<tbody>
						<?php echo $items ?>

						<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									<tr>
										<td>Cart Sub Total</td>
										<td>
											<span id="cart-sub-total"><?php echo $tong ?></span>
											<span> $ </span>
										</td>
									</tr>
									<tr class="shipping-cost">
										<td>Shipping Cost</td>
										<td><?php
										$fee=mysqli_query($con,"SELECT fee as fee from carts where user_id=$id_user");
										$row_fee=mysqli_fetch_assoc($fee);
										echo $row_fee['fee'];
										?>$</td>							
									</tr>
									<tr>
										<td>Total</td>
										<td>
											<span id="last-total"><?php echo $tong+$row_fee['fee'] ?></span>
											<span> $ </span>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="payment-options" style="text-align: center">
				<form method="post" action="vnpay_php/vnpay_create_payment.php">
					<input id="payment" name="amount" value="<?php echo ($tong+$row_fee['fee'])*23000 ?>" hidden="true"/>
					<input id="payment" name="order_id" value="<?php echo $order_id ?>" hidden="true"/>
					<?php
						if($tong != 0) echo "<button type='submit' name='redirect' class='btn btn-default get'>Pay by VNPay</button>"
					?>
				</form>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<script src="js/jquery.js"></script>