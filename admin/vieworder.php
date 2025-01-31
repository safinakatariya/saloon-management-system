
<?php
include 'inc/connection.php';
session_start();
if(!isset($_SESSION["adminid"]))
{
  header('location:index.php');
}

$id = $_SESSION["adminid"];
$o_id=$_GET["oid"];

$ship =$con->query("select * from shipping where order_id='$o_id'");
$ship_address = $ship->fetch_object();
$oid=$ship_address->order_id;

$order =$con->query("select * from order_items where order_id='$oid'");


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta charset="utf-8" />
<title>HRMS Admin</title>

<meta name="description" content="overview &amp; stats" />
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
<?php include 'inc/header.php'; ?>
<div class="main-container ace-save-state" id="main-container">
<script type="text/javascript">
try{ace.settings.loadState('main-container')}catch(e){}
</script>
<?php include 'inc/sidebar.php'; ?>
<div class="main-content">
<div class="main-content-inner">
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
<ul class="breadcrumb">
<li>
<i class="ace-icon fa fa-home home-icon"></i>
<a href="#">Home</a>
</li>
<li class="active">Dashboard</li>
</ul><!-- /.breadcrumb -->

<div class="nav-search" id="nav-search">
<form class="form-search">
<span class="input-icon">
	<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
	<i class="ace-icon fa fa-search nav-search-icon"></i>
</span>
</form>
</div><!-- /.nav-search -->
</div>

<div class="page-content">
<div class="ace-settings-container" id="ace-settings-container">
</div>

<!-- /.ace-settings-box -->
</div><!-- /.ace-settings-container -->

<div class="page-header">
<h1>
Deatais
</h1>
</div><!-- /.page-header -->
<div class="row">
<div class="col-xs-12">
	
				<form method="post">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3">Customer Order</h1>

					<div class="row">
						<div class="col-md-12 ">
							<div class="card mb-3">

								<hr class="my-0" />
								<div class="card-body">
									<h5 class="h6 card-title">Shipping Information</h5>
										<div class="row">
										<div class="col-6">
					     	<ul class="list-unstyled mb-0">
			                               <li class="mb-1"><span data-feather="briefcase" class="feather-sm me-1"></span> First Name: &nbsp<?php echo $ship_address->fname;?></li>
			                               <li class="mb-1"><span data-feather="briefcase" class="feather-sm me-1"></span> Last Name: &nbsp<?php echo $ship_address->lname;?></li>
			                               <li class="mb-1"><span data-feather="briefcase" class="feather-sm me-1"></span> Contact: &nbsp<?php echo $ship_address->contact;?></li>
			                               <li class="mb-1"><span data-feather="briefcase" class="feather-sm me-1"></span> Address: &nbsp<?php echo $ship_address->address;?></li>
				            </ul>
											</div>
											<div class="col-6">
	                        <ul class="list-unstyled mb-0">
			                             <li class="mb-1"><span data-feather="briefcase" class="feather-sm me-1"></span> City: &nbsp<?php echo $ship_address->city;?></li>
			                             <li class="mb-1"><span data-feather="briefcase" class="feather-sm me-1"></span> State: &nbsp<?php echo $ship_address->state;?></li>
			                             <li class="mb-1"><span data-feather="briefcase" class="feather-sm me-1"></span> Pincode: &nbsp<?php echo $ship_address->pincode;?></li>
						   </ul>
								       </div>
								</ul>
									</div>
								<hr class="my-0" />
								   <div class="card-body">
									<h5 class="h6 card-title">Order Item Information</h5>
									<div class="row">
										<div class="col-6">
					                 <table border="0" width="1000" hight="500" >
                                                 <th> <tr>
                                                  		<td>Order Item Id</td>
                                                  		<td>Product Name</td>
                                                  		
                                                  		<td>Quantity</td>
                                                  		<td>Price</td>
                                                  	</tr></th>
                                                  		<?php
                                                  		while ($o=$order->fetch_object()) 
                                                  		{
                                                  		  ?>
                                                  		     <tr>
                                                  		           <td><?php echo $o->order_item_id;?></td>
                                                  		           <td><?php echo $o->product_name;?></td>
                                                  		           
                                                  		           <td><?php echo $o->qty;?></td>
                                                  		           <td><?php echo $o->price;?></td>
                                                  	          </tr>
                                                  	 <?php
                                                  		}

                                                  		?>
                                                  	</table>
											</div>
											
										</ul>
									</div>
								</div>
								
							</div>
						</div>

					</form>	
			
<!-- PAGE CONTENT BEGINS -->
						</div>
					</div>
				</div><!-- /.widget-main -->
			</div><!-- /.widget-body -->
		</div><!-- /.widget-box -->
	</div><!-- /.col -->
	<!-- /.col -->
</div><!-- /.row -->
<!-- PAGE CONTENT ENDS -->
<?php include 'inc/footer.php'; ?>
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

<!--[if lte IE 8]>
<script src="assets/js/excanvas.min.js"></script>
<![endif]-->
<script src="assets/js/jquery-ui.custom.min.js"></script>
<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
<script src="assets/js/jquery.easypiechart.min.js"></script>
<script src="assets/js/jquery.sparkline.index.min.js"></script>
<script src="assets/js/jquery.flot.min.js"></script>
<script src="assets/js/jquery.flot.pie.min.js"></script>
<script src="assets/js/jquery.flot.resize.min.js"></script>

<!-- ace scripts -->
<script src="assets/js/ace-elements.min.js"></script>
<script src="assets/js/ace.min.js"></script>

<!-- inline scripts related to this page -->
<script type="text/javascript">
jQuery(function($) {
$('.easy-pie-chart.percentage').each(function(){
var $box = $(this).closest('.infobox');
var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
var size = parseInt($(this).data('size')) || 50;
$(this).easyPieChart({
barColor: barColor,
trackColor: trackColor,
scaleColor: false,
lineCap: 'butt',
lineWidth: parseInt(size/10),
animate: ace.vars['old_ie'] ? false : 1000,
size: size
});
})

$('.sparkline').each(function(){
var $box = $(this).closest('.infobox');
var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
$(this).sparkline('html',
	 {
		tagValuesAttribute:'data-values',
		type: 'bar',
		barColor: barColor ,
		chartRangeMin:$(this).data('min') || 0
	 });
});


//flot chart resize plugin, somehow manipulates default browser resize event to optimize it!
//but sometimes it brings up errors with normal resize event handlers
$.resize.throttleWindow = false;

var placeholder = $('#piechart-placeholder').css({'width':'90%' , 'min-height':'150px'});
var data = [
{ label: "social networks",  data: 38.7, color: "#68BC31"},
{ label: "search engines",  data: 24.5, color: "#2091CF"},
{ label: "ad campaigns",  data: 8.2, color: "#AF4E96"},
{ label: "direct traffic",  data: 18.6, color: "#DA5430"},
{ label: "other",  data: 10, color: "#FEE074"}
]
function drawPieChart(placeholder, data, position) {
$.plot(placeholder, data, {
series: {
pie: {
show: true,
tilt:0.8,
highlight: {
opacity: 0.25
},
stroke: {
color: '#fff',
width: 2
},
startAngle: 2
}
},
legend: {
show: true,
position: position || "ne", 
labelBoxBorderColor: null,
margin:[-30,15]
}
,
grid: {
hoverable: true,
clickable: true
}
})
}
drawPieChart(placeholder, data);

/**
we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
so that's not needed actually.
*/
placeholder.data('chart', data);
placeholder.data('draw', drawPieChart);


//pie chart tooltip example
var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
var previousPoint = null;

placeholder.on('plothover', function (event, pos, item) {
if(item) {
if (previousPoint != item.seriesIndex) {
previousPoint = item.seriesIndex;
var tip = item.series['label'] + " : " + item.series['percent']+'%';
$tooltip.show().children(0).text(tip);
}
$tooltip.css({top:pos.pageY + 10, left:pos.pageX + 10});
} else {
$tooltip.hide();
previousPoint = null;
}

});

/////////////////////////////////////
$(document).one('ajaxloadstart.page', function(e) {
$tooltip.remove();
});




var d1 = [];
for (var i = 0; i < Math.PI * 2; i += 0.5) {
d1.push([i, Math.sin(i)]);
}

var d2 = [];
for (var i = 0; i < Math.PI * 2; i += 0.5) {
d2.push([i, Math.cos(i)]);
}

var d3 = [];
for (var i = 0; i < Math.PI * 2; i += 0.2) {
d3.push([i, Math.tan(i)]);
}


var sales_charts = $('#sales-charts').css({'width':'100%' , 'height':'220px'});
$.plot("#sales-charts", [
{ label: "Domains", data: d1 },
{ label: "Hosting", data: d2 },
{ label: "Services", data: d3 }
], {
hoverable: true,
shadowSize: 0,
series: {
lines: { show: true },
points: { show: true }
},
xaxis: {
tickLength: 0
},
yaxis: {
ticks: 10,
min: -2,
max: 2,
tickDecimals: 3
},
grid: {
backgroundColor: { colors: [ "#fff", "#fff" ] },
borderWidth: 1,
borderColor:'#555'
}
});


$('#recent-box [data-rel="tooltip"]').tooltip({placement: tooltip_placement});
function tooltip_placement(context, source) {
var $source = $(source);
var $parent = $source.closest('.tab-content')
var off1 = $parent.offset();
var w1 = $parent.width();

var off2 = $source.offset();
//var w2 = $source.width();

if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
return 'left';
}


$('.dialogs,.comments').ace_scroll({
size: 300
});


//Android's default browser somehow is confused when tapping on label which will lead to dragging the task
//so disable dragging when clicking on label
var agent = navigator.userAgent.toLowerCase();
if(ace.vars['touch'] && ace.vars['android']) {
$('#tasks').on('touchstart', function(e){
var li = $(e.target).closest('#tasks li');
if(li.length == 0)return;
var label = li.find('label.inline').get(0);
if(label == e.target || $.contains(label, e.target)) e.stopImmediatePropagation() ;
});
}

$('#tasks').sortable({
opacity:0.8,
revert:true,
forceHelperSize:true,
placeholder: 'draggable-placeholder',
forcePlaceholderSize:true,
tolerance:'pointer',
stop: function( event, ui ) {
//just for Chrome!!!! so that dropdowns on items don't appear below other items after being moved
$(ui.item).css('z-index', 'auto');
}
}
);
$('#tasks').disableSelection();
$('#tasks input:checkbox').removeAttr('checked').on('click', function(){
if(this.checked) $(this).closest('li').addClass('selected');
else $(this).closest('li').removeClass('selected');
});


//show the dropdowns on top or bottom depending on window height and menu position
$('#task-tab .dropdown-hover').on('mouseenter', function(e) {
var offset = $(this).offset();

var $w = $(window)
if (offset.top > $w.scrollTop() + $w.innerHeight() - 100) 
$(this).addClass('dropup');
else $(this).removeClass('dropup');
});

})
</script>
</body>
</html>
