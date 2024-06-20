
<?php
include 'inc/connection.php';
session_start();
if(!isset($_SESSION["userid"]))
{
    header('location:login.php');
}
$userid=$_SESSION["userid"];
$date=date('Y-m-d');

$con->query("INSERT INTO `orders`(`Date`, `User_id`,`Status`) values('$date','$userid','pending') ");
$order_id=$con->insert_id;

foreach($_SESSION["cart"]  as $cart)
{
    $p= $cart["Price"];
    $q= $cart["Quantity"];
    $pid= $cart["Pro_id"];
    $total=$p*$q;
    $con->query("INSERT INTO `orderdetails`(`Orderid`, `P_id`, `Quantity`, `Price`, `Total`) values('$order_id','$pid','$q','$p','$total')"); 
}
  
//shipping details

$fname=$_POST["fname"];
$lname=$_POST["lname"];
$street=$_POST["street"];
$area=$_POST["area"];
$state=$_POST["state"];
$city=$_POST["city"];
$address=$_POST["address"];
$pincode=$_POST["pincode"];
$contact=$_POST["contact"];

$con->query("INSERT INTO `shipping`(`fname`, `lname`, `street`, `area`, `state_id`, `city_id`, `address`, `pincode`, `contact`, `user_id`, `order_id`) VALUES('$fname','$lname','$street','$area','$state','$city','$address','$pincode','$contact','$userid','$order_id')");

$payment_method=$_POST["payment_method"];                    
if($payment_method == 'cod')
{
	echo "<script>alert('your Order Has been Placed..');document.location='http://localhost/Saloon/success.php';</script>";
}
else
{
	?>
	<?php
}


?>