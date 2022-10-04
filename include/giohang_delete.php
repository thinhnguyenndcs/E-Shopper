<?php
    include('./database/connect.php');
    
    if(isset($_GET['id_giohang_de']))
{
        echo "<script>
        q=confirm('Are you sure you want to delete this product?'
        <script>";
		
        $rs=mysqli_query($con,"delete from cart_details where clothing_id='$_GET[did]'");
		if(!$rs) {
			echo "You cannot delete this row";
			
		}  
		else
		{
			echo "<script>window.location.href='?quanly=cart'</script>";
		}
}
?>