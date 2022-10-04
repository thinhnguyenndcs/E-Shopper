<?php
if(isset($_SESSION['id_account']))
{

}
else{
	echo "<script>alert('You must login!!')</script>";
	echo "<script>window.location.href='?quanly=home'</script>";
}
if(isset($_GET['district']))
{
	// echo "<script>alert(1)</script>";
}
if(isset($_GET['did']))
{
	try {
		$rs=mysqli_query($con,"delete from cart_details where clothing_id='$_GET[did]'");
		if(!$rs) {
			$error = "You cannot delete this row";
			throw new Exception($error);
		}  
		else
		{
			echo "<script>window.location.href='?quanly=cart'</script>";
		}
		
	} catch (Exception $e) {
		echo "<script>window.location.href='?quanly=cart'</script>";
		echo $e->getMessage();
		
	}
	
}

?>
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart'<?php echo $_SESSION['name'] ?></li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-hover my-0">
					<thead>
						<tr>
						<td class="d-none d-xl-table-cell text-center">Id</td>
							<td class="d-none d-xl-table-cell text-center"></td>
							<td class="d-none d-xl-table-cell text-center">Title</td>
							<td class="d-none d-xl-table-cell text-center">Price</td>
							<td class="d-none d-xl-table-cell text-center">Quantity</td>
							<td class="d-none d-xl-table-cell text-center">Total</td>
							<td class="d-none d-xl-table-cell text-center"></td>
						</tr>
					</thead>
					<tbody id="cart_id">
						

						
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<form action="" method="post">
					<div class="chose_area">
						<ul class="user_option">
							
							<li>
								
								<label>Use Coupon Code</label>
								<input id="code_amount" type="text" > 
							</li>
							<li>
								
								<label>Use Gift Code</label>
								<input style="margin-left: 26px;" id="code_gift" type="text" > 
							</li>
							</ul>
							<ul class="user_info">
							<li class="single_field">
								<label>District:</label>
								
								<select onchange="changeSelect()" id="district">
								<option  selected>District</option>
								<?php
									$districts=mysqli_query($con,"SELECT * from districts order by id desc");
									while($row_districts=mysqli_fetch_array($districts)){
								?>
								<option value="<?php echo $row_districts['id'] ?>"><?php echo $row_districts['name'] ?></option>
										<?php
									}
								?>
									
								</select>
								
							</li>
							<li class="single_field">
								<label>War</label>
								<select id="war">
									<option>Select</option>
									
								</select>
							
							</li>
							
						</ul>
						
						
						<input type="button"  class="btn btn-default update" value="Update" >
					</div>	
						</form>
					
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul id="total_cart">
							
						</ul>
							
							<a  class="btn btn-default check_out" href="?quanly=checkout">Check Out</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->


	<script src="./js/jquery.js"></script>
	<script>
	function changeSelect(){
		var e = document.getElementById("district");
		var strUser = e.value;
		// window.location.href='?quanly=cart&district='+strUser;
	}
	
    function delproduct(id){
        var msg = confirm("Are you sure you want to delete this product?");

    if (msg) {
        window.location.href = "?quanly=cart&did="+id;
    }
    }
	$(document).ready(function(){
		showDataGioHang();
		showTotal();
	$('#district').change(function() {
		var e = document.getElementById("district");
		var district = e.value;
		$.ajax({
				url:'./include/war.php',
				type:'GET',
				data:{
                    
					district:district,
					
				},
				success:function(res){
					$('#war').html(res);
				}
			})
		
	
	});
	$('.update').click(function() {
		var code_amount=document.getElementById("code_amount").value;
        var code_gift=document.getElementById("code_gift").value;
		var e1 = document.getElementById("district");
		var district = e1.value;
		var e2 = document.getElementById("war");
		var war = e2.value;
		$.ajax({
				url:'./include/giohang_total.php',
				type:'POST',
				data:{
                    test2:2,
					district:district,
					war:war,
					code_amount:code_amount,
					code_gift:code_gift
					
				},
				success:function(res){
					
					$('#total_cart').html(res);
					
				}
			})
		
	
	});
	function showDataGioHang(){
        $.ajax({
            url:'./include/giohang_show.php',
            type:'POST',
            data:{
                test1:1
            },
            success:function(res){
                
                $('#cart_id').html(res);
                
            
            
            }
        })
    }
	function showTotal(){
        $.ajax({
            url:'./include/giohang_total.php',
            type:'POST',
            data:{
                test2:1
            },
            success:function(res){
                
                $('#total_cart').html(res);
                
            
            
            }
        })
    }
	$(document).on('input','#soluong_item_giohang',function(){
		var id_giohang=$(this).attr('id_slgh');
		var sl_gh=$(this).val();
		$.ajax({
				url:'./include/giohang_sl.php',
				type:'POST',
				data:{
                    
					id_giohang:id_giohang,
					sl_gh:sl_gh
				},
				success:function(res){
					
					showDataGioHang();
					showTotal()
				}
			})
	})
})
    </script>
