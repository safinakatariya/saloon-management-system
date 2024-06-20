<?php
$con=new mysqli("localhost","root","","saloon");
$id=$_POST['city'];
//echo $id;exit;
$select=$con->query("select * from city where Sid='$id'");
?>
<option value="">select City</option>
<?php
while($getcity=$select->fetch_object())
{
	?>
	<option value="<?php echo $getcity->Cid; ?>">
		<?php echo $getcity->CName; ?></option>
	<?php
}
?>