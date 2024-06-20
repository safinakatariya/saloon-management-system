<?php
$con=new mysqli("localhost","root","","saloon");
$id=$_POST['city'];
//echo $id;exit;
$select=$con->query("select * from city where Sid='$id'");

while($row = $select->fetch_object())
{
	$cities[] = $row;
}

echo json_encode($cities);
?>