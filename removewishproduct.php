<?php
include ('connection.php');
$wp_id = $_GET['id'];
$delwish_qry="DELETE FROM wishlist_tbl WHERE ID='$wp_id'";
$delwish_run=mysqli_query($conn,$delwish_qry);
if ($delwish_run) {
	echo '<script language="javascript">';
    echo 'alert("Product is remove from your whish list")';  
    echo '</script>';
    echo "<script>location.replace('wishlist.php')</script>";
}
?>