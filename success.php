<?php
session_start();
include 'inc/connection.php';
if (!isset($_SESSION['cart']))
 {
  header('location:index.php');
}



$order_id = $_SESSION['order_id'];
$r = $con->query("update orders set Status='completed' where order_id = '$order_id'");
if ($r){
      session_destroy();
     
   }

    

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

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style type="text/css" media="screen">
        .widget { margin-bottom: 30px; background-color: #e9ebef; padding: 50px; border-radius: 6px; }
.widget:last-child { border-bottom: 0px; }
.widget-title { color: #094bde; font-size: 16px; font-weight: 700; text-transform: uppercase; margin-bottom: 25px; letter-spacing: 1px; display: table; line-height: 1; }

    </style>



</head>



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
   
<div class="container">
                <div class="row">

                          <h1 style="color: green; font-style: italic; text-align: center;" >Your Order has been Placed Successfully</h1><br/>
                         
                </div>
                 <br/><h3>Want to continue shopping ? <a href="index.php"> Click Here ?</a></h3> 
                 <br><br><br><br><br><br><br>
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