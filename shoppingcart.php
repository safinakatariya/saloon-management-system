<?php
session_start();
error_reporting(0);
include 'inc/connection.php';
if(!isset($_SESSION["userid"]))
{
  header('location:login.php');
}
 
//Set useful variables for paypal form
$paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; //Test PayPal API URL
$paypal_id = 'vipasha0123@gmail.com'; //Business Email
   
if(isset($_REQUEST["updatecart"]))
{
   
    foreach($_SESSION["cart"] as $cart_items)
      {
        
          foreach($_REQUEST["cart"] as $data )
          {
              foreach($data as $k=>$v)
              {
                  if($cart_items["Pro_id"]==$k)
                  {
                     $_SESSION["cart"][$k]["Quantity"]=$v;
                  }
              }
          }
          
      }
  
      header('location:shoppingcart.php');
     
     
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

  </head>
  
    <body>

       <?php include 'inc/header.php'; ?>
        <!-- Jumbtron / Slider -->
        <div class="jumbotron-wrap">
            <div class="container">
                <div class="jumbotron jumbotron-narrow">
                    <h1 class="text-center">Shopping Cart</h1>
                </div>
            </div>
        </div>
        <!-- Main content area -->
      <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
    
                <h1 align="center">Shopping Cart</h1>
                
                <br/>
            
            <form method="post" action="<?php //echo $paypal_url; ?>">
                
              <input type="hidden" name="business" value="<?php echo $paypal_id; ?>">
              <!-- Specify a Buy Now button. -->
              <input type="hidden" name="cmd" value="_xclick">
              <!-- Specify URLs -->
              <input type='hidden' name='cancel_return' value='http://localhost/paypal_integration_php/cancel.php'>
		          <input type='hidden' name='return' value='http://localhost/Saloon/order.php'>

        
	           <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Serial</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Amount</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sum=0;
                  $_SESSION['sum'] = 0;
                  foreach($_SESSION["cart"]  as $cart)
                  {
                      $p= $cart["Price"];
                      $q= $cart["Quantity"];
                      
                      $sum=$sum+($p*$q);
                      $_SESSION['sum'] =  $_SESSION['sum'] +  $p * $q;
                      
                      
                      ?>
                         <tr>
                            <td><?php echo $cart["Pro_id"];?></td>
                            <td><?php echo $cart["Pro_Name"];?></td>
                            <td><?php echo $cart["Price"];?></td>
                            <td>
                               
                                
                                <input type="text"  value="<?php echo $q;?>" name="cart['q'][<?php echo $cart["Pro_id"];?>]">
                            
                            </td>
                            <td><?php echo  $p*$q;?></td>
                            <td class="center">
                                <a class="btn btn-danger" href="cart.php?remove_cartid=<?php echo $cart["Pro_id"];?>">
                                    <i class="glyphicon glyphicon-trash icon-white"></i>
                                   Remove
                                </a>
                             </td>
        
                </tr>	 
                     
                      
                       <!-- Specify details about the item that buyers will purchase. -->
        <input type="hidden" name="item_name" value="<?php echo $cart["Pro_Name"] ?>">
        <input type="hidden" name="item_number" value="<?php echo $cart['Pro_id']; ?>">
        <input type="hidden" name="amount" value="<?php echo $cart['Price']; ?>">
        <input type="hidden" name="currency_code" value="USD">
        
                   <?php   
                  }
                  
                  
                  ?>
               
          
		
                <tr><td class="center" colspan="4" align="right">
                      
                        
                        <button type='submit' name='updatecart' class="btn btn-info" value="update"> <i class="glyphicon glyphicon-edit icon-white"></i>Update Cart</button>


                        <a href="checkout.php" class="btn btn-danger">Check Out</a>
                        
                         <!-- <input type="image" name="submit" border="0"
        src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" alt="PayPal - The safer, easier way to pay online">
        <img alt="" border="0" width="1" height="1" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif"  > -->
        </td>
        
        <th>Total Order</th>
        <td><h3><?php echo $sum." Rs"; ?><h3></td>
          </tr>
        
                
				</tbody>
            </table>
            
      
          </form>  
		
		
            
			
			
	
</div>
            </div>
        </div>
  


        <!-- Footer -->
        <?php include 'inc/footer.php'; ?>



        <!-- Bootcamp JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

    </body>
</html>