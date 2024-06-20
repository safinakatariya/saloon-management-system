<?php
include 'inc/connection.php';
session_start();
if(isset($_POST["submit"]))
{
    $User=$_POST["username"];
    $Password=$_POST["password"];
    $login=$con->query("select * from user where (Email='$User' or Contact='$User') and Password='$Password'");
    $rowcount=$login->num_rows;
    if($rowcount==1)
    {
        $fetch=$login->fetch_object();
        $_SESSION["userid"]=$fetch->User_id;
        header('location:index.php');
    }
    else
    {
        echo "<script>alert('Invalid UserName or Password');document.location='login.php';</script>";
    }
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
    </head>
  
    <body>

        <?php include 'inc/header.php'; ?>

        <!-- Jumbtron / Slider -->
        <div class="jumbotron-wrap">
            <div class="container">
                <div class="jumbotron jumbotron-narrow">
                    <h1 class="text-center">Login Here</h1>
                </div>
            </div>
        </div>

    
        <!-- Main content area -->
        <main class="container">
            <div class="row">
                <div class="col-sm-3"></div>
                <!-- Main content -->
                <div class="col-sm-6">
                       <br/>
                        <fieldset>
                            <legend>Login Here !..</legend>
                            <form method="post">
                            <div class="form-group">
                                <label for="exampleInputName">Username</label>
                                <input type="text" class="form-control" id="userid" name="username" required="" placeholder="Enter Userid">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail">Password</label>
                                <input type="Password" class="form-control" id="password" aria-describedby="emailHelp" name="password" required=""
                                placeholder="Enter Password">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit">Login</button>
                        </fieldset>
                        </form>
                       <br/>

                    </article>
                </div>

                <div class="col-sm-2"></div>
                <!-- Sidebar -->
                
                
                
            </div> 
        </main>


        <!-- Footer -->
       <?php include 'inc/footer.php'; ?>



        <!-- Bootcamp JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

    </body>
</html>