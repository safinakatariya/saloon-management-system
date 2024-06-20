<?php
include 'inc/connection.php';
$state=$con->query("select * from state");
if(isset($_POST["submit"]))
{
    $Fname=$_POST["fname"];
    $Lname=$_POST["lname"];
    $Contact=$_POST["contact"];
    $Email=$_POST["email"];
    $Gender=$_POST["gender"];
    $DOB1=$_POST["dob"];
    $dob=strtotime($DOB1);
    $DOB=date("Y-m-d",$dob);
    $State=$_POST["state"];
    $City=$_POST["city"];
    $Address=$_POST["address"];
    $Password=$_POST["password"];
    $CPassword=$_POST["cpassword"];
    $check=$con->query("select * from user where Email='$Email' or Contact='$Contact'");
    //echo  "insert into user (FName,LName,Email,Contact,Gender,DOB,
          // Address,Sid,Cid,Password,Status,Role_id) values('$Fname','$Lname','$Email','$Contact','$Gender','$DOB','$Address','$State','$City','$Password','0','2')";
           //exit;
    if($check->num_rows>0)
    {
        echo "<script>alert('Email or Contact Already Exist');document.location='register.php';</script>";
    }
    else
    {
        if($Password==$CPassword)
        {
           $store=$con->query("insert into user (FName,LName,Email,Contact,Gender,DOB,
           Address,Sid,Cid,Password,Status,Role_id) values('$Fname','$Lname','$Email','$Contact','$Gender','$DOB','$Address','$State','$City','$Password','0','2')");
           if($store)
           {
                echo "<script>alert('Thanks For Registration');document.location='login.php';</script>";
           }
        }
        else
        {
            echo "<script>alert('Password not Match');document.location='register.php';</script>";
        }
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
                    <h1 class="text-center">Register Here !!! </h1>
                </div>
            </div>
        </div>

    
        <!-- Main content area -->
        <main class="container">
            <div class="row">
              
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                     <h4 class="pb-4">Please fill with your details</h4>
                <form method="post">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <input id="fname" name="fname" placeholder="First Name" class="form-control" type="text" required="">
                        </div>
                         <div class="form-group col-md-6">
                          <input id="lname" name="lname" placeholder="Last Name" class="form-control" type="text" required="">
                        </div>
                         <div class="form-group col-md-6">
                          <input id="contact" name="contact" placeholder="Mobile Number" class="form-control" type="text" required="">
                        </div>
                        <div class="form-group col-md-6">
                          <input type="email" class="form-control" id="email" name="email" placeholder="Email" required="">
                        </div>
                      </div>
                    <div class="form-row">
                        <div class="form-row">
                        
                        <div class="form-group col-md-6">
                          <select id="gender" class="form-control" name="gender">
                              <option value="">Select Gender</option>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                          </select>  
                        </div>
                        <div class="form-group col-md-6">
                            <input id="dob" name="dob"  class="form-control" required="required" type="date">
                        </div>
                        <div class="form-group col-md-6">
                                  <select id="state" class="form-control" name="state" onchange="return getcity();">
                                    <option value="">Select State</option>
                                    <?php
                                        while($row=$state->fetch_object())
                                        {
                                            ?>
                                            <option value="<?php echo $row->Sid; ?>"><?php echo $row->SName; ?></option>
                                            <?php
                                        }
                                    ?>
                                  </select>
                        </div>
                        <div class="form-group col-md-6">
                                  <select id="city" class="form-control" name="city" required=""></select>
                        </div>
                        <div class="form-group col-md-12">
                                  <textarea id="address" name="address" cols="40" rows="5" class="form-control" placeholder="Enter Your Address"></textarea>
                        </div>
                        <div class="form-group col-md-6">
                          <input id="password" name="password" placeholder="Enter Password" class="form-control" type="password">
                        </div>
                        <div class="form-group col-md-6">
                          <input id="cpassword" name="cpassword" placeholder="Enter Confirm Password" class="form-control" type="password">
                        </div>
                    </div>
                    </div>
                    
                    
                    <div class="form-row">
                        <button type="submit" class="btn btn-danger" name="submit" style="margin-left: 350px;">Register..!!</button>
                    </div>
                    <br/>
                </form>
                    
                </div>
                
                <div class="col-sm-2"></div>
            </div> 
        </main>


       <?php include 'inc/footer.php'; ?>

        <!-- Bootcamp JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript">
        function getcity()
        {
            var state=document.getElementById("state").value;
            //alert(state);
            $.ajax({
                type:"POST",
                url:"get_city.php",
                data:"city="+state,
                success:function(ans)
                {
                    document.getElementById("city").innerHTML=ans;
                }
            });    
        }
    </script>


    </body>
</html>