<?php
include 'inc/connection.php';
session_start();
if(!isset($_GET["cartid"]))
{
	header('location:see_iteam.php');
}
$userid=$_SESSION["userid"];
$id=$_GET["cartid"];
if(!isset($_SESSION["userid"]))
{
	header('location:login.php');
}
$Date=date("Y-m-d");
$data=$con->query("select * from product where Pro_id='$id'");
$read_cart=$data->fetch_object();
$cat=$read_cart->Cat_id;
$sub_cat=$read_cart->Sub_id;
//echo "insert into cart(User_id,Cat_id,Sub_id,Pro_id,Date) values
	//('$userid','$cat','$sub_cat','$id','$Date')";exit;
$add_cart=$con->query("insert into cart(User_id,Cat_id,Sub_id,Pro_id,Date) values
	('$userid','$cat','$sub_cat','$id','$Date')");
if($add_cart)
{
	echo "<script>alert('Your Product Has been Added Succefully');document.location='service.php';</script>";
}
else
{
	echo "<script>alert('Fail to Add Iteam in Cart');document.location='service.php';</script>";
}
?>