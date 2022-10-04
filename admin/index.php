<?php
session_start();
include('../database/connect.php');
?>
<?php
if (isset($_POST['dangnhap'])) {
    $taikhoan = $_POST['taikhoan'];
    $matkhau = $_POST['matkhau'];
    if ($matkhau == '' || $taikhoan == '') {
        echo '<p>Xin nhập đủ<p>';
    } else {
        $sql_select_admin = mysqli_query($con, "SELECT * from users where email='$taikhoan' AND password = '$matkhau' AND role='admin' limit 1");
        $row_dangnhap = mysqli_fetch_array($sql_select_admin);
        $count = mysqli_num_rows($sql_select_admin);
        if ($count > 0) {
            $_SESSION["dangnhap"] = $row_dangnhap['name'];

            $_SESSION["admin_id"] = $row_dangnhap['id'];
            header('Location:  home.php');
        } else {
            echo "Tài khoản mật khẩu sai";
        }
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">

    <title>Login #6</title>
  </head>
  <body>
  

  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('img/ESHOP.png');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <div class="d-flex justify-content-center ">
              <img style="width: 300px;" src="img/ES.png" alt="">
            </div>
            <form action="#" method="post">
              <div class="form-group first">
                
                <input name="taikhoan" type="text" class="form-control" placeholder="email" id="username">

              </div>
              <div class="form-group last mb-3">
                
                <input name="matkhau" type="password" placeholder="password" class="form-control" id="password">
                
              </div>

              <input name="dangnhap" style="background-color: #942f24;border: none;font-size:16px;font-weight: 900;" type="submit" value="Log In" class="btn btn-block btn-primary">

              
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    
  </div>
    
  </body>
</html>