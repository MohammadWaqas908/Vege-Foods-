<?php
include ('connection.php');
if (!empty($_SESSION['Username'])) {
	$active_user=$_SESSION['Username'];
}else{
	$active_user="";
}
$cart_no_qry="SELECT * FROM cart_tbl WHERE User_name = '$active_user'";
$cart_no_run=mysqli_query($conn,$cart_no_qry);
if (!empty($cart_no_run)) {
	$count=0;
	while ($data_cart = mysqli_fetch_array($cart_no_run)) {
		$count++;
	}
}else{
	$count=0;
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">Vegefoods</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
	          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
              <div class="dropdown-menu" style="margin-top: 0;" aria-labelledby="dropdown04">
              	<a class="dropdown-item" href="shop.php">Shop</a>
              	<a class="dropdown-item" href="wishlist.php">Wishlist</a>
                <a class="dropdown-item" href="cart.php">Cart</a>
              </div>
            </li>
	          <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="blog.php" class="nav-link">Blog</a></li>
	          <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
	          <li class="nav-item cta cta-colored"><a href="cart.php" class="nav-link"><span class="icon-shopping_cart"></span>[<?php echo $count ?>]</a></li>
	          <?php
	          if (!empty($_SESSION['uID'])) {?>
	          	<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['Username']; ?></a>
              	<div class="dropdown-menu" style="margin-top: 0;" aria-labelledby="dropdown04">
              		<a class="dropdown-item" href="logout.php">Logout</a>
              	</div></li>
              	<?php
			  }else{?>
			 	<li class="nav-item"><a href="login.php" class="nav-link">Login/Register</a></li>
			  <?php } ?>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->	
</body>
</html>