<?php
include 'connection.php';
@session_start();
?>
<nav class="navbar navbar-expand-md navbar-dark">
            <div class="container">

                <!-- Company name shown on mobile -->
                <a class="navbar-brand" href="#"><span>MAKEOVER</span>PARADISE</a>
                <!-- Mobile menu toggle -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Main navigation items -->
                <div class="collapse navbar-collapse" id="mainNavbar">
                    <ul class="navbar-nav mr-auto justify-content-end">
                        <li class="nav-item">
                                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                        </li>

                       <li class="nav-item">
                                <a class="nav-link" href="about.php">About Us</a>
                        </li>
                        
                        <li class="nav-item">
                                <a class="nav-link" href="contact.php">Contact Us</a>
                        </li>     
                         <li class="nav-item">
                                <a class="nav-link" href="service.php">Buy Products</a>
                        </li>                    
                        <?php
                        if(!isset($_SESSION["userid"]))
                        {
                            ?>
                            <li class="nav-item">
                                <a class="nav-link" href="login.php">Sign In</a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link" href="register.php">Sign Up</a>
                        </li>   
                            <?php
                        }
                        else
                        {
                            ?>
                         <li class="nav-item">
                                <a class="nav-link" href="book_appointment.php">Appointment</a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link" href="shoppingcart.php">Cart</a>
                        </li>
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php" style="color:red"><i class="fa fa-sign-out"></i>Logout</a>
                        </li>
                       
                            <?php
                        }
                        ?>
                   </ul>

                </div>  



            </div>
        </nav>
