<?php
// session_start();
// session_id();
include("../database/connect.php");
$a=array();
$id_=$_SESSION["id_account"];

$clothes=mysqli_query($con,"SELECT clothes.id as id,cart_details.quantity as quantity, clothes.price as price, clothes.title as name_clothes FROM carts,cart_details,clothes WHERE carts.id=cart_details.cart_id and cart_details.clothing_id=clothes.id and carts.user_id=$id_");
while($row_clothes=mysqli_fetch_array($clothes))
{
    $r=	
    array(
    "name"=>$row_clothes['name_clothes'],
    "quantity"=> (int)$row_clothes['quantity'],
    "price"=> (int)$row_clothes['price'],
    "weight"=> (int)100
    );
    array_push($a,$r);
}
$test=json_encode($a);
$url = "https://dev-online-gateway.ghn.vn/shiip/public-api/v2/shipping-order/create";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
"token: dd544c3f-aa84-11ec-ac64-422c37c6de1b",
   "Content-Type: application/json",
   "ShopId: 86380"
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
$name='';
$phone='';
$address='';
$war='';
$district='';
$select_userinfo=mysqli_query($con,"SELECT users.name as name, users.phone_no as phone, users.address as address,carts.war_id as war,carts.district_id as district FROM users,carts WHERE users.id=carts.user_id and users.id=$id_ ");
while($row_clothes=mysqli_fetch_array($select_userinfo))
{
    $name=$row_clothes['name'];
    $phone=$row_clothes['phone'];
    $address=$row_clothes['address'];
    $war=$row_clothes['war'];
    $district=$row_clothes['district'];
}

$data = <<<DATA
{
    "payment_type_id": 2,
    "required_note": "KHONGCHOXEMHANG",
    "to_name": "$name",
    "to_phone": "$phone",
    "to_address": "$address",
    "to_ward_code": "$war",
    "to_district_id": "$district",
    "cod_amount": 0,
    "weight": 200,
    "length": 1,
    "width": 19,
    "height": 10,
    "deliver_station_id": null,
    "insurance_value": 1000000,
    "service_id": 0,
    "service_type_id":2,
    "items": $test
         
     
}
DATA;

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
$x=json_decode($resp );
$rs=$x->{'data'}->{'order_code'};
?>