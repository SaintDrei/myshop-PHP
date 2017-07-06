<?php 
 if(isset($_REQUEST['pid']) &&
     isset($REQUEST['qty']));
{
    
    //http://localhost:8080/myshop/addtocart.php?p=2&qty=20
    include "function.php";
    include "config.php";
    
    $productID = $_REQUEST['p'];
    $quantity = $_REQUEST['qty'];
    addToCart($con, $productID, $quantity);
    
}

?>