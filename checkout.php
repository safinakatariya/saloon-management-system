<?php
session_start();
error_reporting(0);
include 'inc/connection.php';
if (!isset($_SESSION['cart']))
 {
  header('location:index.php');
}

 $userid = $_SESSION["userid"];
 $profile_result = $con->query("select * from user where User_id ='$userid'");
 $profile = $profile_result->fetch_object();





if(isset($_POST["submit"]))
{

   // order generate
    $order_date  = date("Y-m-d");
    $customer_id = $_SESSION['userid'];
    $t =  $_SESSION['sum'];
    $con->query("insert into orders(Date,User_id,total) values ('$order_date','$customer_id','$t')");
    $order_id = $con->insert_id;   // last inserted id(order id)

    $_SESSION['order_id'] = $order_id;
  



     // order items insert
   foreach($_SESSION["cart"]  as $cart)
                  {
                      $p= $cart["Price"];
                      $q= $cart["Quantity"];
                      
                      $sum=$sum+($p*$q);
                      $_SESSION['sum'] =  $_SESSION['sum'] +  $p * $q;
                      $pname = $cart["Pro_Name"];
                      $pprice = $cart["Price"];
                      $pid = $cart["Pro_id"];
                      $qty = $_GET['qty'];

        
 $w =$con->query("INSERT INTO `order_items`(`product_id`, `order_id`, `product_name`, `price`, `qty`) VALUES ('$pid','$order_id','$pname','$pprice','$q')");
         }

  




   //shipping address
    $fname=$_POST["fname"];
    $lname=$_POST["lname"];
    $state=$_POST["state"];
    $city=$_POST["city"];
    $address=$_POST["address"];
    $pincode=$_POST["pincode"];
    $contact=$_POST["contact"];
    $userid = $_SESSION["userid"];
  
    
    

   
     $e =$con->query("insert into shipping(fname,lname,state,city,address,pincode,contact,user_id,order_id) values ('$fname','$lname','$state','$city','$address','$pincode','$contact','$userid','$order_id')");
   


     //payment_method
    $payment_method = $_POST['payment_method'];
    if($payment_method=='cod')
    {
       
        echo "<script>alert('Your Order has been Placed Successfully'); document.location='success.php';</script>";
    }
    else
    {
         header('location:payment.php');
    }

    
}
?>

<!doctype html>
<html lang="en">
<head>
    <title>Turning Head</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Main CSS -->   
    <link rel="stylesheet" href="css/style.css">

    <!-- Font Awesome -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style type="text/css" media="screen">
        .widget { margin-bottom: 30px; background-color: #e9ebef; padding: 50px; border-radius: 6px; }
.widget:last-child { border-bottom: 0px; }
.widget-title { color: #094bde; font-size: 16px; font-weight: 700; text-transform: uppercase; margin-bottom: 25px; letter-spacing: 1px; display: table; line-height: 1; }

    </style>



</head>

<body onload="setcity(<?php echo $profile->Sid;?>)">

  <?php include 'inc/header.php'; ?>
  <!-- Jumbtron / Slider -->
  <div class="jumbotron-wrap">
    <div class="container">
        <div class="jumbotron jumbotron-narrow">
            <h1 class="text-center">Check Out </h1>
        </div>
    </div>
</div>


<!-- Main content area -->
<main class="container">
    <div class="row mt-5">


 <form method="post">
        <div class="col-sm-7">
           
            <div class="panel panel-primary" >
                <div class="panel-heading">Shipping Details</div>

            </div>
            
                <div class="form-row">
                 <div class="form-group col-md-6">
                  <input type="text" id="fname" name="fname" placeholder="First Name" class="form-control"  required="" value="<?php echo $profile->FName;?>">
              </div>
              <div class="form-group col-md-6">
                  <input id="lname" name="lname" placeholder="Last Name" class="form-control" type="text" required="" value="<?php echo $profile->LName;?>">
              </div>

              <div class="form-group col-md-12">
                  <input id="street" name="street" placeholder="Street Address" class="form-control" type="text" required="">
              </div>

              <div class="form-group col-md-12">
                  <input id="area" name="area" placeholder="Area" class="form-control" type="text" required="">
              </div>

              <div class="form-row">
                  <div class="form-group col-md-6">
                      <input type="text" name="state" id="state" class="form-control" placeholder="State">
                </div>
                <div class="form-group col-md-6">
                  <input type="text" name="city" id="city" class="form-control" placeholder="City">
              </div>
              <div class="form-group col-md-12">
                  <textarea id="address" name="address" cols="40" rows="5" class="form-control" placeholder="Enter Your Address"><?php echo $profile->Address;?></textarea>
              </div>
              <div class="form-group col-md-6">
                  <input id="pincode" name="pincode" placeholder="Enter Zip Code" class="form-control" type="text">
              </div>
              <div class="form-group col-md-6">
                  <input id="contact" name="contact" placeholder="Other Contact Number" class="form-control" type="text">
              </div>
          </div>
      </div>


      
     

</div>

<div class="col-sm-5">
    <div class="panel panel-primary" >
                <div class="panel-heading">Order Details</div>

     </div>
     <div class="widget">
                        <h4 class="widget-title">Order Summary</h4>
                      

                      <?php
                  $sum=0;
                  $total=0;
                  $_SESSION['sum'] = 0;
                  foreach($_SESSION["cart"]  as $cart)
                  {
                      $p= $cart["Price"];
                      $q= $cart["Quantity"];
                      
                      $sum=$sum+($p*$q);
                      $_SESSION['sum'] =  $_SESSION['sum'] +  $p * $q;
                      
                      
                      ?>
                        <div class="summary-block">
                            <div class="summary-content">
                                <div class="summary-head">
                                  <h5 class="summary-title"><?php echo $cart["Pro_Name"];?></h5>
                                  <p class="summary-text">Rs<?php echo $cart["Price"];?></p></div>

                                <input type="hidden" name="pname" id="pname" value="<?php echo $cart["Pro_Name"] ;?>">
                                <input type="hidden" name="pprice" id="pprice" value="<?php echo $cart["Price"] ;?>">
                                <input type="hidden" name="pid" id="pid" value="<?php echo $cart["Pro_id"] ;?>">
                                <div class="summary-price">
                              <input type="hidden" name="qty" id="qty" value="<?php echo $q;?>" name="cart['q'][<?php echo $cart["Pro_id"];?>]">
                                    
                                </div>
                                
                            </div>
                         <!--    <?php $total = $total + $cart["Price"]; ?> -->
                         <?php $total = $sum; ?>
                        </div>
                         <?php   
                            }
                           ?>
                           <p>Total = <?php echo $total; ?></p>
                           <input type="hidden" name="total" id="total" value="<?php echo $sum ;?>">
                       

                    </div>
    <br/>
    <div class="panel panel-primary"> 
        <div class="panel-heading">Payment Method</div>

    </div>
    <div class="form-row">

       <div class="form-group col-md-12">
        <input type="radio" name="payment_method" id="cash" value="cod">Cash On Delivery
        <input type="radio" name="payment_method" id="online" value="online">Online
         
      </div>

  </div>

   <div class="form-row float-right">
        <button type="submit" class="btn btn-danger mb-5 mt-2 " id="submit" name="submit" >Place Oder</button>
    </div>

</form>
</div>
</div> 
</main>


<?php include 'inc/footer.php'; ?>

<!-- Bootcamp JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


</body>
</html>