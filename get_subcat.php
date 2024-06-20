<?php
$con=new mysqli("localhost","root","","saloon");
$id=$_POST['cat'];
echo "$id"; exit;
$select=$con->query("select * from sub_catogery where Cat_id='$id'");
?>
<option value="">select Subcategory</option>
<?php
while($row=$select->fetch_object())
{
	?>
	<option value="<?php echo $row->Sub_id; ?>"><?php echo $row->Sub_Name; ?></option>
	<?php
}
?>
