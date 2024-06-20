<?php
include 'inc/connection.php';
$id=$_GET["subcatid"];
if(!isset($_GET["subcatid"]))
{
    header('location:see_subcat.php');
}
$products=$con->query("select * from product where Sub_id='$id'");
$rowcount=$products->num_rows;
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
                    <h1 class="text-center">ITEMS!!! </h1>
                </div>
            </div>
        </div><main>
             <div class="container" >
   
                <div class="text-center padded-box pb-0">
                        <h2>Start Purchasing</h2>
                        <p class="lead"></p>
                           <div class="padded-box row">
                            <?php 
                            if($rowcount==0)
                            {
                                echo "No Products are available Of This Company";
                            }
                            else
                            {
                                while($row=$products->fetch_object())
                                {
                              ?>
                                <div class="col-md-3">
                                <div class="card text-center">
                                <img class="card-img-top a" src="admin/images/<?php echo $row->Image;?>" alt="Card image cap">
                                <div class="card-body">
                                <a href="see_iteam.php?productid=<?php echo $row->Pro_id; ?>">
                                <h5 class="card-text zoom"><?php echo $row->Pro_Name; ?></h5>
                            </a>
                          </div>
                        </div>
                    </div>
                              <?php
                            }
                        }
                            ?>
                </div>
                </div>
            </div>  
            </div>
            </div>
                </div>
        </main>  
<?php include 'inc/footer.php'; ?>
        <!-- Bootcamp JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

    </body>
</html>