<?php
	
	if (session_status() === PHP_SESSION_NONE) {
		session_start();
	}
	$email = $password = $role = $idAccount = $name = "NULL";
	
	//echo get_current_file_url();
	if (!empty($_SESSION)) {
		$name	=	checkSession('name');
		$email 	= checkSession('email');
		$password 	= checkSession('password');
		$idAccount 	= checkSession('id_account');
		$role		= checkSession('role');
		if ($name !="NULL" && $email != "NULL" && $password != "NULL" && $idAccount != "NULL" && $role != "NULL") {?>
			<li><a href=""><i class="fa fa-user"></i> <?= $name ?></a></li>
			<li><a href="?quanly=cart"><i class="fa fa-shopping-cart"></i> Cart</a></li>
			<li><a href="?quanly=orders"><i class="fa fa-money-check"></i> Orders</a></li>
			<li><a href="include/logout.php"><i class="fa fa-lock"></i> Logout</a></li>
		<?php return;
		}
	}?>
    <li><a href=""><i class="fa fa-user"></i> Account</a></li>
	<li><a href="?quanly=cart"><i class="fa fa-shopping-cart"></i> Cart</a></li>
	<li><a href="?quanly=login"><i class="fa fa-lock"></i> Login</a></li>
<?php		
	$_SESSION['current-url'] = current_url();
	
	function checkSession($input){
		$inputContent = "NULL";
		if (!empty($_SESSION[$input])) {
			$inputContent = $_SESSION[$input];
		}
		return $inputContent;
	}
	function get_current_file_url($Protocol='http://') {
	   return $Protocol.$_SERVER['HTTP_HOST'].str_replace($_SERVER['DOCUMENT_ROOT'], '', realpath(__DIR__)); 
	}
	function current_url() {
		$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		$validURL = str_replace("&", "&amp;", $url);
		return $validURL;
	}
?>