<?php
include 'inc/connection.php';
session_start();
if(!isset($_SESSION["userid"]))
{
    header('location:login.php');
}
//$categories=$con->query("select * from category");
$userid=$_SESSION["userid"];
if(isset($_POST["submit"]))
{
    //print_r($_POST);exit;
    $Date1=$_POST["date"];
    $unix1=strtotime($Date1);
    $Date=date("Y-m-d",$unix1);
    $Ftime=$_POST["ftime"];
    $Totime=$_POST["totime"];
    $Category=$_POST["category"];
    $Description=$_POST["msg"];
    //echo "select* from appointment where (From_time between '$Ftime' and '$Totime' or To_time between '$Ftime' and '$Totime') and Date='$Date'";exit;
    //echo "insert into appointment(Date,User_id,From_time,To_time,Category,Description,Status) values('$Date','$userid','$Ftime','$Totime','$Category','$Description')";exit;
    $check=$con->query("select * from appointment where (From_time between '$Ftime' and '$Totime' or To_time between '$Ftime' and '$Totime') and Date='$Date'");
    $rowcount=$check->num_rows;
    if($rowcount==1)
    {
        echo "<script>alert('This time Already Appointment Choose Another Time')</script>";
    }
    else
    {
            $book=$con->query("insert into appointment(Date,User_id,From_time,To_time,Category,Description) values('$Date','$userid','$Ftime','$Totime','$Category','$Description')");
            if($book)
            {
              echo "<script>alert('Your Appointment Successfully booked')</script>";  
            }
            else
            {
                echo "<script>alert('Fail To Book Your Appointment')</script>";
            }
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
          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js">
</script>
    </head>
  
    <body>

        <?php include 'inc/header.php'; ?>
        <!-- Jumbtron / Slider -->
        <div class="jumbotron-wrap">
            <div class="container">
                <div class="jumbotron jumbotron-narrow">
                    <h1 class="text-center">booking </h1>
                </div>
            </div>
        </div>
        <!-- Main content area -->
        <main class="container">
            <div class="row">
                <div class="col-sm-4">
                    <img src="images/4.jpg" height="500px" width="400px">
                </div>
                <div class="col-sm-1"></div>
                <!-- Main content -->
                <div class="col-sm-6" style="background-color:#8fbc8f; margin-bottom: 50px;">
                       <br/>
                       <form method="post">
                        <fieldset>
                            <legend>Book Your Appointment Here..!!</legend>
                            <div class="form-group">
                                <label for="exampleInputName">Date</label>
                                <input type="date" class="form-control" id="date" name="date" required=""> 
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName">From</label>
                                <input type="time" class="form-control" id="ftime" name="ftime" required=""> 
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName">To Time</label>
                                <input type="time" class="form-control" id="totime" name="totime" required=""> 
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName">Category</label>
                                <select class="form-control" name="category" id="category" required="">
                                   <option value="">Select Category</option>
                                   <option value="Facial">Facial</option>
                                   <option value="Body waxing">Body waxing</option>
                                   <option value="Makeup">Makeup</option>
                                   <option value="Hair Cut">Hair Cut</option>
                                   <option value="Hair Styling">Hair Styling</option>
                                   <option value="Hair Coloring">Hair Coloring</option>
                                   <option value="Hair Care Treatment">Hair Care Treatment</option>
                                   <option value="Head Message">Head Message</option>
                                   <option value="Face Threading">Face Threading</option>
                                   <option value="Manicure">Manicure</option>
                                   <option value="Pedicure">Pedicure</option>
                                </select>
                            </div>
                           <div class="form-group">
                                <label for="exampleInputName">Your Message</label>
                              
                                <textarea id="msg" name="msg" class="form-control">
                                </textarea>
                            </div> 
                            <button type="submit" class="btn btn-primary" name="submit">Book Appointment</button>
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