<?php
session_start();
include('../database/connect.php');
if(isset($_POST['test2']))
{
    if(isset($_POST['war']))
    {
    $district=$_POST['district'];
    $war=$_POST['war'];
       

$url = "https://dev-online-gateway.ghn.vn/shiip/public-api/v2/shipping-order/fee";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
"token: dd544c3f-aa84-11ec-ac64-422c37c6de1b",
   "Content-Type: application/json",
   "ShopId: 86380",
   "Content-Type: text/plain"
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = <<<DATA
{
    "from_district_id":3695,
    "service_id":53320,
    "service_type_id":null,
    "to_district_id":$district,
    "to_ward_code":$war,
    "height":50,
    "length":20,
    "weight":100,
    "width":20,
    "insurance_value":1000000,
    "coupon": null
    }
DATA;

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
$a=json_decode($resp,true);

// $sum= count($a['data']);
// for($i=0;$i<$sum;$i++)
// {
//     echo $a['data'][$i]['WardCode']."--".$a['data'][$i]['WardName'];
//     echo "\r\n";
// }
$ship=ceil($a['data']['total']/23500);
$update_Cart=mysqli_query($con,"UPDATE carts set fee='$ship',war_id='$war',district_id='$district' where user_id=".$_SESSION["id_account"]." ");
    }else{
        $ship=0;
    }

    $total=mysqli_query($con, "SELECT SUM(cart_details.quantity*clothes.price) as total  FROM cart_details,clothes, carts WHERE cart_details.clothing_id=clothes.id and carts.id=cart_details.cart_id and carts.user_id=".$_SESSION['id_account']."");
    $row_total=mysqli_fetch_array($total);
    
    $row_total_res=0;
    $row_code_percen=0;
    if(isset($_POST['code_amount']))
    {
        
        $code_amount=mysqli_query($con,"SELECT * from amount_discounts as ad, vouchers where ad.id=vouchers.id and code=".$_POST['code_amount']."");
        if($code_amount)
        {
            $total_res=mysqli_fetch_array($code_amount);
            $row_total_res=(int)$total_res['amount'];
            
        }
    }
    
    if(isset($_POST['code_gift']))
    {
        $code_percen=mysqli_query($con,"SELECT * from percentage_discounts as per, vouchers where per.id=vouchers.id and code=".$_POST['code_gift']."");
        if($code_percen)
        {
            $code_percen_res=mysqli_fetch_array($code_percen);
            $row_code_percen=$code_percen_res['percent'];
        }
    }
    if($row_total_res==0 && $row_code_percen==0)
    {
        echo "<li >Sum <span>".$row_total['total']."$</span> </li>
        <li>Coupon Code <span>0$</span></li>
        <li>Gift Code <span>0%</span></li>
        <li>Ship <span>".$ship."$</span></li>
        <li>Total <span>";
        echo $row_total['total']+$ship;
        echo "$</span></li>";
    }elseif($row_total_res==0 && $row_code_percen!=0){
        echo "<li >Sum<span>".$row_total."$</span> </li>
        <li>Coupon Code <span>0$</span></li>
        <li>Gift Code <span>".$row_code_percen."</span></li>
        <li>Ship <span>".$ship."$</span></li>
        <li>Total <span>";
        echo $row_total*$row_code_percen/100+$ship;
        echo "$</span></li>";
        
    }
    elseif($row_total_res!=0 && $row_code_percen==0){
        echo "<li >Sum<span>".$row_total['total']."$</span> </li>
        <li>Coupon Code <span>".$row_total_res."$</span></li>
        <li>Gift Code <span>0%</span></li>
        <li>Ship <span>".$ship."$</span></li>

        <li>Total <span>";
        echo $row_total['total']-$row_total_res +$ship;
        echo "$</span></li>";
    }elseif($row_total_res!=0 && $row_code_percen!=0){
        echo "<li >Sum<span>".$row_total['total']."$</span> </li>
        <li>Coupon Code <span>".$row_total_res."$</span></li>
        <li>Gift Code <span>".$row_code_percen."%</span></li>
        <li>Ship <span>".$ship."$</span></li>

        <li>Total <span>";
        echo ($row_total['total']-$row_total_res)*(100-$row_code_percen)/100+$ship;
    echo "$</span></li>";}
    else{
        echo "<li >Sum<span>".$row_total['total']."$</span> </li>
        <li>Coupon Code <span>0$</span></li>
        <li>Gift Code <span>0%</span></li>
        <li>Ship <span>".$ship."$</span></li>

        <li>Total <span>";
        echo $row_total['total']+$ship ;
        echo "$</span></li>";
    }
    
}

							


if(isset($_GET['war']))
{

}
?>