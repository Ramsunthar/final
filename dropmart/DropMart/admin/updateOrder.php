<?php
session_start();
$oid = $_GET["id"];
$status=$_POST["status"];

include "../dbconfig.php";

$sql="UPDATE `orders` SET  `deliveryStatus` = '".$status."' WHERE `orders`.`id` = ".$oid.";";

if(  mysqli_query($con,$sql))
{
  echo "File uploaded Successfully";
}
else
{
  echo "Opps something is wrong, Please select the file again";
}

header('Location:manage-orders.php');

?>
