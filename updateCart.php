<?php
include 'connection.php';
session_start();
$cp_id = $_GET['id'];
$p_price = $_GET['price'];
$pro_qunatity = $_GET['ProQuantity'];
$totalPrice=$p_price*$pro_qunatity;
$up_qry="UPDATE cart_tbl SET Product_Quantity='$pro_qunatity',T_Price='$totalPrice' WHERE ID='$cp_id'";
$up_run=mysqli_query($conn,$up_qry);
if ($up_run) {
    echo '<script language="javascript">';
    echo 'alert("Product Update Successfully.")';  
    echo '</script>';
    echo "<script>location.replace('cart.php')</script>";
}else{
    echo '<script language="javascript">';
    echo 'alert("Product is not Updated Yet Please \n Try Agin")';  
    echo '</script>';
    echo "<script>location.replace('cart.php')</script>";
}
?>