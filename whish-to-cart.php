<?php
include 'connection.php';
session_start();
if (!empty($_SESSION['uID'])) {
    $wp_id = $_GET['id'];
    $pro_qunatity = $_GET['ProQuantity']; 
    $uname=$_SESSION['Username'];  
    $qry1="SELECT * FROM `wishlist_tbl` WHERE ID = '$wp_id'";
    $run1=mysqli_query($conn,$qry1);
    $row1 = mysqli_fetch_array($run1);
    $pro_name=$row1['Pro_name'];
    $pro_img=$row1['Pro_img'];
    $pro_price=$_GET['ProductPrice'];
    $totalPrice=$pro_price*$pro_qunatity;
    $productid=$row1['Pro_id'];
    $wishtocart='wishtocart';
    if (isset($wishtocart)) {
        $cart_qry="INSERT INTO cart_tbl(User_name,Product_id,Product_name,T_Price,Product_Quantity,Product_img) VALUES('$uname','$productid','$pro_name','$totalPrice','$pro_qunatity','$pro_img')";
        $cart_run=mysqli_query($conn,$cart_qry);
       	if ($cart_run) {
          $delwish_qry="DELETE FROM wishlist_tbl WHERE ID='$wp_id'";
      		$delwish_run=mysqli_query($conn,$delwish_qry);
          if ($delwish_run) {
            echo '<script language="javascript">';
            echo 'alert("Product is added to your cart and remove from whish list")';  
            echo '</script>';
            echo "<script>location.replace('cart.php')</script>";
          }else{
          echo '<script language="javascript">';
          echo 'alert("Product is not added to your Cart and not remove from whish list")';  
          echo '</script>';
          echo "<script>location.replace('wishlist.php')</script>";
        }
    	}else{
      		echo '<script language="javascript">';
      		echo 'alert("Product is not added to your Cart")';  
      		echo '</script>';
          echo "<script>location.replace('wishlist.php')</script>";
    	}
    }
}else{
	echo '<script language="javascript">';
    echo 'alert("Please login to continue")';  
    echo '</script>';
    echo "<script>location.replace('index.php')</script>";
}
?>