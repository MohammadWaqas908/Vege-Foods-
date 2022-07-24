<?php
include ('connection.php');
$wp_id = $_GET['id'];
$delcart_qry="DELETE FROM cart_tbl WHERE ID='$wp_id'";
$delcart_run=mysqli_query($conn,$delcart_qry);
if ($delcart_run) {
	echo '<script language="javascript">';
    echo 'alert("Product is remove from your your")';  
    echo '</script>';
    echo "<script>location.replace('cart.php')</script>";
}else{
	echo '<script language="javascript">';
    echo 'alert("Product is not remove from your Carts")';  
    echo '</script>';
    echo "<script>location.replace('cart.php')</script>";
}
?>