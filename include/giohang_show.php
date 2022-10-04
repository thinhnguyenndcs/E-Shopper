
<?php
session_start();
include('../database/connect.php');
if(isset($_POST['test1']))
{	
	$id_user=$_SESSION['id_account'];
    $show_giohang=mysqli_query($con,"SELECT carts.id,carts.user_id,cart_details.clothing_id,clothes.status,clothes.img,clothes.title,clothes.price,cart_details.quantity,clothes.quantity as quantity_stock FROM carts,cart_details,clothes where carts.id=cart_details.cart_id and carts.user_id='$id_user' and cart_details.clothing_id=clothes.id ");
    
	$i=0;
    $subtotal=0;
    $tong=0;
    while($row_show_giohang=mysqli_fetch_array($show_giohang))
    {
		$i++;
        $subtotal=$row_show_giohang['price']*$row_show_giohang['quantity'];
        $tong=$tong+$subtotal;
    echo "
	
    <tr>
	<td class='cart_price text-center'>
								<p>".$i."</p>
							</td>
	<td  class=' text-center '>
	
		<img style='height:150px; width=350px' src='".$row_show_giohang['img']."' class='img-fluid pe-2' alt='Unsplash'>
	
	
</td>
							<td style='width:25%' class='cart_description text-center'>
								<h4><a href='product-details.php'>".$row_show_giohang['title']."</a></h4>
								<p>Web ID:".$row_show_giohang['clothing_id']."</p>
							</td>
							<td class='cart_price text-center'>
								<p>".$row_show_giohang['price'].'$'."</p>
							</td>
							<td class='d-none d-xl-table-cell text-center'>
								
									
									
									<input style='
									width: 60%;
									text-align: center;
									display: inline-table;
									
									margin-bottom: 12px;
									font-size: 18px;
								'class='form-control' id='soluong_item_giohang' min='1' max='".$row_show_giohang['quantity_stock']."' id_slgh=".$row_show_giohang['clothing_id']." type='number' value=".$row_show_giohang['quantity']."   >
								
							</td>
							<td class='cart_price text-center'>
								<p >".$subtotal.'$'."</p>
							</td>
							
							<td class='d-none d-xl-table-cell text-center'><a class='align-middle' href=\"javascript:delproduct(id=".$row_show_giohang['clothing_id'].")\"'><i class='fa-solid fa-trash xoa_item_giohang' style='
							color:red;
							margin-bottom: 15px;
							font-size: 15px;'
						></i></a></td>
						</tr>
                        ";
    }
}
