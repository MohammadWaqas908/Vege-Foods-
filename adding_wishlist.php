<?php
include 'connection.php';
session_start();
if (!empty($_SESSION['uID'])) {
    $pro_id = $_GET['id'];
    $username=$_SESSION['Username'];  
    $qry1="SELECT * FROM `products_tbl` WHERE ID = '$pro_id'";
    $run1=mysqli_query($conn,$qry1);
    $row1 = mysqli_fetch_array($run1);
    $pro_name=$row1['P_name'];
    $pro_img=$row1['P_image'];
    $wishlink='wishlink';
    if (isset($wishlink)) {
        $wish_qry="INSERT INTO wishlist_tbl(User_name,Pro_id,Pro_name,Pro_img) VALUES('$username','$pro_id','$pro_name','$pro_img')";
        $wish_run=mysqli_query($conn,$wish_qry);
       	if ($wish_run) {
      		echo '<script language="javascript">';
      		echo 'alert("Product is added to your Wish List")';  
      		echo '</script>';
      		echo "<script>location.replace('index.php')</script>";
    	}else{
      		echo '<script language="javascript">';
      		echo 'alert("Product is not added to your Wish List")';  
      		echo '</script>';

      		//echo "<script>location.replace('index.php')</script>";
    	}
    }
}else{
	echo '<script language="javascript">';
    echo 'alert("Please login to continue")';  
    echo '</script>';
    echo "<script>location.replace('index.php')</script>";
}
?>