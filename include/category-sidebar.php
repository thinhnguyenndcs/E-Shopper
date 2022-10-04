<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>						
						<div class="panel-group category-products" id="accordian">
						<?php							
	$query = "select * from categories where 1";
	$result = mysqli_query($con, $query);
	$maxitem = 7;
	while($row = mysqli_fetch_array($result)){
		if ($row[0]==$maxitem+1){break;}
		$name=$row["name"];		
	?>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title"><a class="cate" id="<?=$name?>"	href="?quanly=product&category=<?=$name?>"><?= $name; ?></a></h4>
			</div>
		</div>	
<?php }	?>						
</div>
	<div class="shipping text-center">
		<img src="images/home/shipping.jpg" alt="" />
	</div>
</div>
</div>
