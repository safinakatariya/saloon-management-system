<?php

include 'inc/connection.php';
session_start();
if(!isset($_SESSION["adminid"]))
{
  header('location:index.php');
}
$order_id=$_REQUEST['order_id'];
$orders=$con->query("SELECT product.Pro_id as pid,product.Pro_Name as pname,order_items.qty,order_items.price,order_items.price FROM product INNER JOIN order_items ON product.Pro_id=order_items.product_id WHERE order_items.order_id='$order_id'");
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>All Orders</title>

		<meta name="description" content="Static &amp; Dynamic Tables" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="assets/js/ace-extra.min.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="no-skin">
<?php  


include 'inc/header.php'; ?>
		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>
			<?php 
                        
                        include 'inc/sidebar.php'; ?>
			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Home</a>
							</li>

							<li>
								<a href="all_cat.php">All Categories</a>
							</li>
						</ul><!-- /.breadcrumb -->

					
					</div>

					<div class="page-content">
						
						<div class="page-header">
							<h1>All Orders Items</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="row">
									
								</div><!-- /.row -->

								
								<div class="row">
									<div class="col-xs-12">
										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
										<div>
							<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<td>ProductId</td>
														<td>ProductName</td>
														<td>Quantity</td>
														<td>Price</td>
														<td>Shipping Detail</td>
                                                                                                                
													</tr>
												</thead>
												<?php
												while($row=$orders->fetch_object())
												{
													$a=$con->query("select * from shipping where order_id=$order_id");
													$result= $a->fetch_object();
												?>
                                                                                                    <tr>
                                                                       <td><?php echo $row->pid; ?></td>
                                                                       <td><?php echo $row->pname; ?></td>
                                                                       <td><?php echo $row->qty; ?></td>
                                                                       <td><?php echo $row->price; ?></td>
                                                                       <td><?php echo $result->address."-".$result->pincode.",".$result->city."<br>".$result->contact; ?></td>
                                                                                                           
                                                                                                            
                                                                                                            
                                                                                                    </tr>
                                                                                                <?php
                                                                                                    }
                                                                                                    ?>	
							</table>
								</div>
							</div>
						</div>

								
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<?php include 'inc/footer.php'?>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->
		<script src="assets/js/jquery.dataTables.min.js"></script>
		<script src="assets/js/jquery.dataTables.bootstrap.min.js"></script>
		<script src="assets/js/dataTables.buttons.min.js"></script>
		<script src="assets/js/buttons.flash.min.js"></script>
		<script src="assets/js/buttons.html5.min.js"></script>
		<script src="assets/js/buttons.print.min.js"></script>
		<script src="assets/js/buttons.colVis.min.js"></script>
		<script src="assets/js/dataTables.select.min.js"></script>

		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			$(document).ready(function(){
				$('#dynamic-table').DataTable();
			});	
		</script>
	</body>
</html>