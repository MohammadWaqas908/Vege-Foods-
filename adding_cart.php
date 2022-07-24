<?php
include 'connection.php';
session_start();
if (!empty($_SESSION['uID'])) {
    $pro_id = $_GET['id'];
    $wish_id=$_GET['wish_id'];
    $ProQuantity=$_GET['ProQuantity'];
    $username=$_SESSION['Username'];  
    $qry1="SELECT * FROM `products_tbl` WHERE ID = '$pro_id'";
    $run1=mysqli_query($conn,$qry1);
    $row1 = mysqli_fetch_array($run1);
    $pro_name=$row1['P_name'];
    $pro_price=$row1['P_price'];
    $pro_img=$row1['P_image'];
    $pro_quantity=1;
    if ($ProQuantity != 1) {
      $pro_quantity=$ProQuantity;
    }
    $total_price=$pro_quantity*$pro_price;
    $wishlink='wishlink';
    if (isset($wishlink)) {
        $cart_qry="INSERT INTO cart_tbl(User_name,Product_id,Product_name,T_Price,Product_Quantity,Product_img) VALUES('$username','$pro_id','$pro_name','$total_price','$pro_quantity','$pro_img')";
        $cart_run=mysqli_query($conn,$cart_qry);
       	if ($cart_run) {
          if ($wish_id !=0) {
              $delwish_qry="DELETE FROM wishlist_tbl WHERE ID='$wish_id'";
              $delwish_run=mysqli_query($conn,$delwish_qry);
              echo '<script language="javascript">';
              echo 'alert("Product is added to your cart List and also remove from wish List")';  
              echo '</script>';
              echo "<script>location.replace('cart.php')</script>";
            }else{
          		echo '<script language="javascript">';
          		echo 'alert("Product is added to your cart List")';  
          		echo '</script>';
          		echo "<script>location.replace('cart.php')</script>";
            }
    	}else{
      		echo '<script language="javascript">';
      		echo 'alert("Product is not added to your cart List")';  
      		echo '</script>';
          echo "<script>location.replace('index.php')</script>";
    	}
    }
}else{
	echo '<script language="javascript">';
    echo 'alert("Please login to continue")';  
    echo '</script>';
    echo "<script>location.replace('index.php')</script>";
}
?>