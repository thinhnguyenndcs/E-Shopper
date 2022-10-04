<?php
session_start();
ob_start();
include_once('../database/connect.php');
function checkInput($input){
	$inputContent = "NULL";
	if (!empty($_POST[$input])) {
		$inputContent = $_POST[$input];
	}
	return $inputContent;
}
function addCookie() {
	setcookie ("member_name",$_POST["email"],time()+ (10 * 365 * 24 * 60 * 60));
	setcookie ("member_pass",$_POST["password"],time()+ (10 * 365 * 24 * 60 * 60));
}
function removeCookie() {
	if(isset($_COOKIE["member_name"])) {
		setcookie ("member_name","");
	}
	if(isset($_COOKIE["member_pass"])) {
		setcookie ("member_pass","");
	}
}
if(!empty($_POST)) {	
	$email	= checkInput('email');
	$password	= checkInput('password');
	$query = "Select * from users where email = '".$email."' AND 
		PASSWORD = '".$password."' and role='client' ";
    $result = mysqli_query($con,$query);
	$user = mysqli_fetch_array($result);
	if($user) {
		
		$_SESSION["id_account"] = $user["id"];
		$_SESSION["role"] = $user["role"];
		$_SESSION['email']	= $email;
		$_SESSION['password']	= $password;
        $_SESSION['name']=$user['name'];
		if(!empty($_POST["remember"])) {
			if ($_POST["remember"] == "true") {
				addCookie();
			} else {
				removeCookie();
			}
		} else {
			removeCookie();
		}
		$currentUrl = "Location:./index.php";		
		echo $currentUrl;
	} else {
		removeCookie();
		echo "Invalid login";

	}
}


?>
