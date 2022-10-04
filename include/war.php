<?php
include("../database/connect.php");
if(isset($_GET['district']))
{
    $war=mysqli_query($con,"SELECT * from war order by id_district=".$_GET['district']." desc");
    while($row_war=mysqli_fetch_array($war)){

        echo "<option value=".$row_war['id'].">".$row_war['name']."</option>";
    }
}

?>