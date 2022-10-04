<?php
    $id_user=$_SESSION['id_account'];
	$show_orders=mysqli_query($con,"SELECT orders.id,orders.user_id, orders.total,clothes.title,clothes.price,order_details.quantity FROM `orders`  inner join order_details on orders.id=order_details.order_id inner join clothes on order_details.clothing_id=clothes.id WHERE orders.user_id=$id_user");
	$items = '';
    $orders_id = mysqli_query($con, "SELECT id, status, total FROM `orders` WHERE user_id = $id_user");

    $orders_id_list = array();
    while($order_id = mysqli_fetch_array($orders_id)){
        $orders_id_list[] = $order_id;
    }

    $orders_list = array();
    while($show_order=mysqli_fetch_array($show_orders)){
        $orders_list[] = $show_order;
    }

    for($i = 0; $i < count($orders_id_list); $i++){
        $items .= "
        <div class='order'>
            <p><b>Order ID: </b>".$orders_id_list[$i]['id']."</p>
            <p><b>Products list: </b></p>
            <table>
            <thead>
                <tr>
                    <td class='order-product-title'>
                    </td>
                    <td>
                    </td>
                </tr>
            </thead>
            <tbody>
        ";
        for($j = 0; $j < count($orders_list); $j++)
        {
            if($orders_id_list[$i]['id'] == $orders_list[$j]['id']){
                $items .= "
                <tr>
                    <td>
                        <p>".$orders_list[$j]['title']." x ".$orders_list[$j]['quantity']."<p>
                    </td>
                    <td class='order-product-price'>
                        <p>".$orders_list[$j]['price']*$orders_list[$j]['quantity']." $<p>
                    </td>
                </tr>
                ";
            }
        }

        $status = 'Delivering';
        if($orders_id_list[$i]['status']){
            $status = $orders_id_list[$i]['status'];
        }

        $items .= "
            <tr>
                <td>
                    <p><b>Order total:</b></p>
                </td>
                <td class='order-product-price'><b>"
                    .$orders_id_list[$i]['total']." $</b>
                </td>
            <tr>
        </tbody>
        </table>
        <p><b>Status: </b>".$status."</p>
        </div>";
    }
?>


<section id="orders">
	<div class="container">
        <div id="order-items">
            <?php echo $items ?>
        </div>
    </div>
</section>

<style>
    .order{
        border: 1px solid black;
        padding: 15px;
        margin-bottom: 30px;
    }
    #order-items{
        font-size: 17px;
        font-weight: 300;
    }
    .order *{
        margin: 0;
    }
    .order-product-title{
        width: 600px;
    }
    .order-product-price{
        text-align: right;
    }
</style>