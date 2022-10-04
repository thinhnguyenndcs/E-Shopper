<?php
$con = mysqli_connect("localhost","root","","fashionshop");
if (!$con)
  {
  die('Could not connect: ' );
  };

$con -> set_charset("utf8");

?>