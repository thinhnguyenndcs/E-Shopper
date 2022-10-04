<?php
    ob_start();
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Thông tin thanh toán</title>
        <!-- Bootstrap core CSS -->
        <link href="assets/bootstrap.min.css" rel="stylesheet"/>
        <!-- Custom styles for this template -->
        <link href="assets/jumbotron-narrow.css" rel="stylesheet"/>
        <script src="assets/jquery-1.11.3.min.js"></script>
    </head>
    <body>
        <?php
        require_once("./config.php");
        $vnp_SecureHash = $_GET['vnp_SecureHash'];
        $inputData = array();
        foreach ($_GET as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }
        
        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }
 
        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
        ?>
        <!--Begin display -->
        <div class="container">
            <div class="header clearfix">
                <h3 class="text-muted">Thông tin đơn hàng</h3>
            </div>
            <div class="table-responsive">
                <div class="form-group">
                    <label >Mã đơn hàng:</label>
                    
                    <label><?php echo $_GET['vnp_TxnRef'] ?></label>
                </div>    
                <div class="form-group">

                    <label >Số tiền:</label>
                    <label><?=number_format($_GET['vnp_Amount']/100) ?> VNĐ</label>
                </div>  
                <div class="form-group">
                    <label >Nội dung thanh toán:</label>
                    <label><?php echo $_GET['vnp_OrderInfo'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Mã phản hồi:</label>
                    <label><?php echo $_GET['vnp_ResponseCode'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Mã GD Tại VNPAY:</label>
                    <label><?php echo $_GET['vnp_TransactionNo'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Mã Ngân hàng:</label>
                    <label><?php echo $_GET['vnp_BankCode'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Thời gian thanh toán:</label>
                    <label><?php echo $_GET['vnp_PayDate'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Kết quả:</label>
                    <label>
                        <?php
                        if ($secureHash == $vnp_SecureHash) {
                            if ($_GET['vnp_ResponseCode'] == '00') {
                                $order_id = $_GET['vnp_TxnRef'];
                                $money = $_GET['vnp_Amount']/100/23000;
                                $note = $_GET['vnp_OrderInfo'];
                                $vnp_response_code = $_GET['vnp_ResponseCode'];
                                $code_vnpay = $_GET['vnp_TransactionNo'];
                                $code_bank = $_GET['vnp_BankCode'];
                                $time = $_GET['vnp_PayDate'];
                                $date_time = substr($time, 0, 4) . '-' . substr($time, 4, 2) . '-' . substr($time, 6, 2) . ' ' . substr($time, 8, 2) . ':' . substr($time, 10, 2) . ':' . substr($time, 12, 2);
                                $user_id = $_SESSION['id_account'];
                                include('../database/connect.php');
                                $sql = "SELECT * FROM payments WHERE order_id = '$order_id'";
                                $query = mysqli_query($con, $sql);
                                $row = mysqli_num_rows($query);

                                if(!$row){
                                    include("ghn.php");
                                    
                                    $add_order = mysqli_query($con, "INSERT INTO `payments` (`order_id`, `user_id`, `money`, `note`, `vnp_response_code`, `code_vnpay`, `code_bank`, `time`) VALUES ('$order_id', '$user_id', '$money', '$note', '$vnp_response_code', '$code_vnpay', '$code_bank','$date_time')");
                                    mysqli_query($con, "INSERT INTO orders (id, user_id,status, total,ghn_id) VALUES ('$order_id', '$user_id','confirmed', '$money','$rs')");
                                    
                                    $items = mysqli_query($con, "SELECT * FROM `cart_details` WHERE `cart_id` = '$order_id'");

                                    while($item = mysqli_fetch_array($items)){
                                        $clothing_id = $item['clothing_id'];
                                        $quantity = $item['quantity'];
                                        mysqli_query($con, "INSERT INTO `order_details` (`order_id`, `clothing_id`, `quantity`) VALUES ('$order_id', '$clothing_id', '$quantity')");
                                    }
                                    
                                }

                                mysqli_query($con, "DELETE FROM `cart_details` WHERE cart_id = '$order_id'");
                                mysqli_query($con, "DELETE FROM `carts` WHERE id = '$order_id'");
                                
                                echo "GD Thanh cong";
                            } else {
                                echo "GD Khong thanh cong";
                            }
                        } else {
                            echo "Chu ky khong hop le";
                        }
                        ?>

                    </label>
                </div> 
            </div>
            <?php
                if ($_GET['vnp_ResponseCode'] == '00') {
                    echo "
                    <a href='../index.php?quanly=orders'>
                        <button>Quay lại</button>
                    </a>";
                }
                else{
                    echo "
                    <a href='../index.php?quanly=checkout'>
                        <button>Quay lại</button>
                    </a>";
                }
            ?>
            
            <p>
                &nbsp;
            </p>
        </div>  
    </body>
</html>
