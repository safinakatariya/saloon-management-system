<?php
include 'inc/connection.php';
$id=$_GET["productid"];
if(!isset($_GET["productid"]))
{
    header('location:see_product.php');
}
$product=$con->query("select p.Pro_id,p.Pro_Name,p.Description,p.Image,p.Price,p.Quantity, sb.Sub_id,sb.Sub_Name,sb.Cat_id,cat.Cat_Name from product p inner join Sub_catogery sb ON p.Sub_id=sb.Sub_id inner join Category cat ON p.Cat_id=cat.Cat_id where Pro_id='$id'");
$re_pro=$product->fetch_object();
//echo '<pre>';
//print_r($re_pro);exit;
?>
<!doctype html>
<html lang="en">
    <head>
        <title>MAKEOVER PARADISE</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Main CSS --> 
        <link rel="stylesheet" href="css/style.css">
        <!-- Font Awesome -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    </head>
    <body>
        <?php include 'inc/header.php'; ?>
        <!-- Jumbtron / Slider -->
        <div class="jumbotron-wrap">
            <div class="container">
                <div class="jumbotron jumbotron-narrow">
          <h1 class="text-center">Product Detail .....</h1>
                </div>
            </div>
        </div>

    
        <!-- Main content area -->
        <main class="container">
            <div class="row">
                <div class="col-sm-4">
                    <img src="admin/images/<?php echo $re_pro->Image; ?>" height="400px" width="400px">
                   
         <a href="cart.php?pid=<?php echo $re_pro->Pro_id; ?>" class="btn btn-primary" style="height: 30px; margin-left: 10px;margin-top: 10px"><span style="position: relative;bottom: 10px;">Add To Cart </span></a>

         <a href="" class="btn btn-primary" style="height: 30px;margin-left: 10px;margin-top: 10px">  <span style="position: relative;bottom: 10px;">Buy Now</span></a>
               <br/><br/>
                   
                     
                </div>
                <div class="col-sm-1"></div>
                <!-- Main content -->
                <div class="col-sm-6" style="margin-bottom: 50px; margin-left: 100px;   ">
                	<div class="lab"><!---lable  css aplay in this class--->
                	<label class="label" style="font-size: 20px; font-family: italic; color: black;;font-weight: 600">Product Name :</label>
                	 <label class="label" style="font-size: 20px; font-family: italic; color: black; margin-left: 50px; "><?php echo $re_pro->Pro_Name; ?></label>
                	 </div>
                	 <div class="lab1"><!---ariyal-lable  css aplay in this class--->

                	 <label class="aria-label" style="font-size: 20px; font-family: italic; color: black; ;font-weight: 600 "> Product-Price : </label>
                	  <label class="label" style="font-size: 20px; font-family: italic; color: black; margin-left: 60px; "><?php echo $re_pro->Price; ?> Rs</label>
                	</div>
                	 <label class="label" style="font-size: 20px; font-family: italic; color: black;font-weight: 600  ">Available Quantity :</label>
                	  <label class="label" style="font-size: 20px; font-family: italic; color: black; margin-left: 20px; "><?php echo $re_pro->Quantity; ?>
                	  </label>
                	
<div class="n" style="">
           <label class="label" style="font-size: 20px; font-family: italic; color: black; float: left;;font-weight: 600 ">Description :</label> </div>
           <div style=" height:auto; width: 400px; float: left; line-height: 30px; margin-left: 20px; justify-content: all;">
           <label class="label" style="font-size: 20px; font-family: italic; color: black;   float: left; margin-left: 20px;"><?php echo $re_pro->Description; ?></label></div>                         </div> </div> 
        </main>

        <?php include 'inc/footer.php'; ?>
        <!-- Bootcamp JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

    </body>
</html>