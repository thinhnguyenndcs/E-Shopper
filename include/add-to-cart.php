<?php 
include('../database/connect.php');
if (isset($_POST['id'])){
    $product_id = $_POST['id'];
    $quantity = $_POST['quantity'];
    $user_id = $_POST['user_id'];
    $remain_quantity = $_POST['remain_quantity'];
    $response_array['status']='';
    $sql_cart = mysqli_query($con, "SELECT * FROM carts WHERE '$user_id' = user_id");
     if ($sql_cart->num_rows == 0)   // user do not have cart  before
     {
         
        $case1 = mysqli_query($con, "INSERT INTO carts (user_id) VALUES ('$user_id')");
        
        $query_cart_id = mysqli_query($con, "SELECT * FROM carts WHERE carts.user_id = '$user_id'");
         $row = mysqli_fetch_row($query_cart_id);
         $cart_id = $row[0 ];
         $result1 = mysqli_query($con, "INSERT INTO cart_details (cart_id, clothing_id, quantity) VALUES ('$cart_id','$product_id','$quantity')");
        
     }
     else if($sql_cart->num_rows > 0) // user have cart
     {
        
        $query = "SELECT  carts.id, cart_details.clothing_id, cart_details.quantity, clothes.quantity 
         FROM `carts`  
        inner join `cart_details` on carts.id=cart_details.cart_id 
        inner join `clothes` on cart_details.clothing_id=clothes.id WHERE carts.user_id = '$user_id' AND cart_details.clothing_id = '$product_id'";
        $query_cart_id = mysqli_query($con, $query);
        // do not have this item in cart
        if ($query_cart_id -> num_rows == 0)
        {
            $recent_cart_id = mysqli_query($con,"SELECT carts.id FROM  `carts`  WHERE carts.user_id = '$user_id'");
            $row = mysqli_fetch_row($recent_cart_id);
            $cart_id= $row['0'];
            $result2 = mysqli_query($con, "INSERT INTO cart_details (cart_id, clothing_id, quantity) VALUES ('$cart_id','$product_id','$quantity')");
           
       // have this item in cart but can add more // check out range in product.php
        }else
        {
            $row = mysqli_fetch_row($query_cart_id);
                $new_quantity = $quantity + $row[2];
                $result3 = mysqli_query($con,"UPDATE cart_details SET quantity = '$new_quantity' WHERE clothing_id = '$product_id' ");
        }}
     
}  ?>