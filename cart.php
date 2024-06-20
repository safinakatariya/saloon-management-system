<?php
include 'inc/connection.php';
$pid=$_GET["pid"];
session_start();
/// add to cart
if(isset($_REQUEST["pid"]))
{
    $pid= $_REQUEST["pid"];
    $pro= $con->query("select * from product where Pro_id='$pid'");
    $p_data = $pro->fetch_object();
    
   
  //  echo count($_SESSION['cart']);
    
    if(isset($_SESSION["cart"]) && count($_SESSION["cart"])!=0)
    {
       // echo "1"; exit;
        $count=0;
        foreach($_SESSION["cart"] as $cart_items)
        {
           
            if($cart_items["idea_id"]==$pid)
            {
                $count++;
                $_SESSION["cart"][$pid]["Quantity"]= $_SESSION["cart"][$pid]["Quantity"]+1; 
                //header('location:../shoppingcart.php');
            }
       
        }
        if($count==0)
        {
            
            $_SESSION["cart"][$pid]["Pro_id"]=$p_data->Pro_id;
            $_SESSION["cart"][$pid]["Pro_Name"]=$p_data->Pro_Name;
            $_SESSION["cart"][$pid]["Price"]=$p_data->Price;
            $_SESSION["cart"][$pid]["Quantity"]=1;

            header('location:shoppingcart.php');
        }
     
    }
    else
    {
        
            $_SESSION["cart"][$pid]["Pro_id"]=$p_data->Pro_id;
            $_SESSION["cart"][$pid]["Pro_Name"]=$p_data->Pro_Name;
            $_SESSION["cart"][$pid]["Price"]=$p_data->Price;
            $_SESSION["cart"][$pid]["Quantity"]=1;
        
            header('location:shoppingcart.php');
  
    }  
            
}

/// delete values from cart

if(isset($_REQUEST["remove_cartid"]))
{
    $pid= $_REQUEST["remove_cartid"];
   
   
    unset( $_SESSION["cart"][$pid]);
    header('location:shoppingcart.php');
}

if(isset($_REQUEST["updatecart"]))
{
   
      foreach($_SESSION["cart"] as $cart_items)
        {
          
            foreach($_REQUEST["cart"] as $data )
            {
                foreach($data as $k=>$v)
                {
                    if($cart_items["idea_id"]==$k)
                    {
                       $_SESSION["cart"][$k]["quantity"]=$v;
                    }
                }
            }
            
        }
    
        header('location:shoppingcart.php');
     
     
}




?>