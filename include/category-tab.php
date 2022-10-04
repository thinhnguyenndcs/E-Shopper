<?php
$query = "select * from categories where 1";
$result = mysqli_query($con, $query);
$tab_menu = '';
$tab_content = '';
$i = 0;
$num_item_on_cart = 0;
$session_value = '';
if (isset($_SESSION['id_account'])) {
    $session_value = $_SESSION['id_account'];
}
while ($row = mysqli_fetch_array($result)) {
    if ($i == 0) {
        $tab_menu .= '<li class="active"><a href="#' . $row["id"] . '" data-toggle="tab">' . $row["name"] . '</a></li>';
        $tab_content .= '<div id="' . $row["id"] . '" class="tab-pane fade active in">';
    } else {
        $tab_menu .= '<li><a href="#' . $row["id"] . '" data-toggle="tab">' . $row["name"] . '</a></li>';
        $tab_content .= '<div id="' . $row["id"] . '" class="tab-pane fade">';
    }

    $product_query = "select * from clothes where clothes.category = '" . $row["id"] . "'";
    $product_result = mysqli_query($con, $product_query);


    while ($sub_row = mysqli_fetch_array($product_result)) {
        if ($sub_row[0] == 5) {
            break;
        }
        $id = $sub_row['id'];
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
        if($sub_row['quantity'] >0){
            $tab_content .= '
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                        <a href="?quanly=product&id='.$sub_row['id'].'"><img src="' . $sub_row["img"] . '" alt="" /></a>
                            <h2>' . $sub_row["price"] . '</h2>
                            <p>' . $sub_row["title"] . '</p>
                            <button id="add-to-cart" class="btn btn-default add-to-cart"  product-id="' . $sub_row['id'] . '" remain-quantity="' . $sub_row['quantity'] . '" num-item-on-cart="' . $num_item_on_cart . '">
									<i class="fa fa-shopping-cart"></i>Add to cart</button>
                        </div>                    
                    </div>
                </div>            
        </div>';
        }
        
        else{
            $tab_content .= '
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <a href="?quanly=product&id='.$sub_row['id'].'"><img src="' . $sub_row["img"] . '" alt="" /></a>
                            
                            <h2>' . $sub_row['price'] . '</h2>
                            <p>' . $sub_row["title"] . '</p>
                            <button class="btn btn-default add-to-cart"><i class="fa-solid fa-sync fa-spin"></i>Out of Stock</button>
                        </div>                    
                    </div>
                </div>            
        </div>';
        }
       
    }
    $tab_content .= '</div>';
    $i++;
}
?>
<div class="col-sm-12">
    <ul class="nav nav-tabs">
        <?= $tab_menu ?>
    </ul>
</div>
<div class="tab-content">
    <?= $tab_content ?>
</div>