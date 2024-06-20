 <?php
include 'inc/connection.php';
if(isset($_POST["submit"]))
{
    $Name=$_POST["name"];
    $Email=$_POST["email"];
    $Contact=$_POST["contact"];
    $Sub=$_POST["subject"];
    $Message=$_POST["msg"];
    $inquiry=$con->query("insert into inquiry(Name,Subject,Description,Email,Contact) values('$Name','$Sub','$Message','$Email','$Contact')");
    if($inquiry)
    {
        echo "<script>alert('Your Query has been sent Successfully')</script>";
    }
    else
    {
        echo "<script>alert('Fail to Send Query')</script>";
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
                    <h1 class="text-center">Contact Us </h1>
                </div>
            </div>
        </div>

    
        <!-- Main content area -->
        <main class="container">
            <div class="row">
                <div class="col-sm-4">
                    <img src="images/contactUs.png">
                </div>
                <div class="col-sm-1"></div>
                <!-- Main content -->
                <div class="col-sm-6">
                       <br/>
                       <form method="post">
                        <fieldset>
                            <legend>Drop Your Query Here !..</legend>
                            <div class="form-group">
                                <label for="exampleInputName">Full Name</label>
                                <input type="text" class="form-control" id="fullname" name="name"> 
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName">Email</label>
                                <input type="text" class="form-control" id="email" name="email"> 
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName">Contact</label>
                                <input type="text" class="form-control" id="contact" name="contact"> 
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName">Subject</label>
                                <input type="text" class="form-control" id="subject" name="subject"> 
                            </div>

                           <div class="form-group">
                                <label for="exampleInputName">Your Message</label>
                              
                                <textarea id="msg" name="msg" class="form-control">
                                </textarea>
                            </div>

                            <button type="submit" class="btn btn-primary" name="submit">Send Inquiry</button>
                        </fieldset>

                       </form>
                       <br/>

                    </article>
                </div>

              
                <!-- Sidebar -->
                
                
                
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