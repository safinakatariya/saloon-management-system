<?php
   include 'inc/connection.php';
session_start();
   if(!isset($_SESSION["userid"]))
   {
    header('location:login.php');
   }
   $userid=$_SESSION["userid"];
//echo "select c.Cart_id,c.Date,ct.Cat_Name,sb.Sub_Name,p.Pro_Name,p.Pro_Name,p.Image //from cart c inner join category ct ON c.Cat_id=ct.Cat_id inner join sub_catogery sb //ON sb.Sub_id=c.Sub_id inner join product p ON p.Pro_id=c.Pro_id";exit;
   $data=$con->query("select c.Cart_id,c.Date,ct.Cat_Name,sb.Sub_Name,p.Price,p.Pro_Name,p.Image,p.Description,p.Quantity from cart c inner join category ct ON c.Cat_id=ct.Cat_id inner join sub_catogery sb ON sb.Sub_id=c.Sub_id inner join product p ON p.Pro_id=c.Pro_id ");
   $read_data=$data->fetch_object();
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

        <style type="text/css">
            .table>tbody>tr>td, .table>tfoot>tr>td{
    vertical-align: middle;
}
@media screen and (max-width: 600px) {
    table#cart tbody td .form-control{
        width:20%;
        display: inline !important;
    }
    .actions .btn{
        width:36%;
        margin:1.5em 0;
    }
    
    .actions .btn-info{
        float:left;
    }
    .actions .btn-danger{
        float:right;
    }
    
    table#cart thead { display: none; }
    table#cart tbody td { display: block; padding: .6rem; min-width:320px;}
    table#cart tbody tr td:first-child { background: #333; color: #fff; }
    table#cart tbody td:before {
        content: attr(data-th); font-weight: bold;
        display: inline-block; width: 8rem;
    }
    
        </style>
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
            <div class="col-md-12">
                <div class="col-md-5">
                    
                </div>
                <h3 align="center">Shopping Cart</h3>
            </div>

            <div class="col-md-1"></div>
            <div class="col-md-10">
                  <table id="cart" class="table table-hover table-condensed">
                    <thead>
                        <tr>
                            <th >Product</th>
                            <th >Price</th>
                            <th >Quantity</th>
                            <th  class="text-center">Subtotal</th>
                            <th ></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td data-th="Product">
                                <div class="row">
                                    <div class="col-sm-2 hidden-xs"><img src="admin/images/<?php echo $read_data->Image; ?>" alt="..." height="60" width="60" class="img-responsive"/></div>
                                    <div class="col-sm-10">
                                        <h4 class="nomargin"><?php echo $read_data->Pro_Name; ?></h4>
                                        <p><?php echo $read_data->Description; ?></p>
                                    </div>
                                </div>
                            </td>
                            <td data-th="Price"><?php echo $read_data->Price; ?></td>
                            <td data-th="Quantity">
                                <input type="number" class="form-control text-center" value="1">
                            </td>
                            <td data-th="Subtotal" class="text-center"><?php echo $read_data->Price; ?></td>
                            <td class="actions" data-th="">
                                <button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
                                <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>                                
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        
                        <tr>
                            <td ><a href="#" class="btn btn-info" ><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                            <td colspan="2" class="hidden-xs"></td>
                            <td class="hidden-xs text-center"><strong>Total $1.99</strong></td>
                            <td><a href="#" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
                        </tr>
                    </tfoot>
                </table>
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