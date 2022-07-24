<?php
session_start();
include ('connection.php');
if (empty($_SESSION['uID'])) {
	echo '<script language="javascript">';
    echo 'alert("Please login to continue")';  
    echo '</script>';
    echo "<script>location.replace('index.php')</script>";
}else{
$username=$_SESSION['Username'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Vegefoods</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body class="goto-here">
		<div class="py-1 bg-primary">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <span class="text">+ 1235 2355 98</span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						    <span class="text">youremail@email.com</span>
					    </div>
					    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
						    <span class="text">3-5 Business days delivery &amp; Free Returns</span>
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div>
    
    <!--Nav Bar-->
    	<?php
    		include ('navbar.php');
    	?>
    <!--End of NavBar-->

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Wishlist</span></p>
            <h1 class="mb-0 bread">My Wishlist</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>&nbsp;</th>
						        <th>Product List</th>
						        <th>&nbsp;</th>
						        <th>Price</th>
						        <th>Quantity</th>
						        <th>Update</th>
						      </tr>
						    </thead>
						    <tbody>
						    	<?php
						    	$show_wqry="SELECT * FROM wishlist_tbl WHERE User_name = '$username'";
                    			$show_wrun=mysqli_query($conn,$show_wqry);
                          $a=0;
                    			while ($row = mysqli_fetch_array($show_wrun)) {
                          ?>
						      <tr class="text-center">
						        <td class="product-remove"><a href="removewishproduct.php?id=<?php echo $row['ID']; ?>" title="Remove Product frm whishlist" name="remove_wishs"><span class="ion-ios-close"></span></a></td>
						        
						        <td class="image-prod"><img class="img" src="images/<?php echo $row ['Pro_img']; ?>" alt="img"></td>
						        
						        <td class="product-name">
						        	<h3><?php echo $row ['Pro_name']; ?></h3>
						        	<?php
						        		$productId=0;
						        		$productId=$row ['Pro_id'];
						        		//pd means product details
						        		$show_pdqry="SELECT * FROM products_tbl WHERE ID = '$productId'";
                    					$show_pdrun=mysqli_query($conn,$show_pdqry);
                    					if (!empty($show_pdrun)) {
                    					while ($pdrow = mysqli_fetch_array($show_pdrun)) {
						        	?>
						        	<p><?php echo $pdrow ['P_description']; ?><!--Far far away, behind the word mountains, far from the countries--></p>
						        </td>
						        
						        <td class="price"><?php echo $pdrow ['P_price']; 
						        	                     $ProductPrice=$pdrow ['P_price'];
						        ?></td>
						        <?php 
						        	}
						    	} ?>
						        <td class="quantity">
						        <!-- <input type="number" name="qunatity" id="qun" value="1" max="100" min="1"> -->
                      <input type="number" name="quantity" id="qun<?php echo $a; ?>" class="form-control" value="1" min="1" max="100">
					          </td>
						        
						        <td class="product-remove">
						        <a href="#" name="wishtocart" title="Add to Cart" class="add-to-cart d-flex justify-content-center align-items-center mx-1" onclick="getQuantity(<?php echo $row['ID']; ?>,<?php echo $a; ?>,<?php echo $ProductPrice; ?>)"><span><i class="ion-ios-cart"></i></span></a>
						        <a href="#" onclick="getIDs(<?php echo $row['Pro_id']; ?>,<?php echo $row['ID']; ?>)" name="wish_to_buy" title="Proceed to buy" class="buy-now d-flex justify-content-center align-items-center text-center"><span><i class="ion-ios-menu"></i></span></a>
						       	</td>
						      </tr><!-- END TR-->
						    	<?php
                    $a++;
						  		}
						  		?>
						  		<!--remain product-->
						  	
						    </tbody>
						  </table>
					  </div>
    			</div>
    		</div>
			</div>
		</section>

		<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
      <div class="container py-4">
        <div class="row d-flex justify-content-center py-5">
          <div class="col-md-6">
          	<h2 style="font-size: 22px;" class="mb-0">Subcribe to our Newsletter</h2>
          	<span>Get e-mail updates about our latest shops and special offers</span>
          </div>
          <div class="col-md-6 d-flex align-items-center">
            <form action="#" class="subscribe-form">
              <div class="form-group d-flex">
                <input type="text" class="form-control" placeholder="Enter email address">
                <input type="submit" value="Subscribe" class="submit px-3">
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    
    <!-- footer start -->
    <?php
        include ('footer.php');
    ?>
    <!-- footer end -->

  <!-- <script>
		$(document).ready(function(){

		var quantitiy=0;
		   $('.quantity-right-plus').click(function(e){
		        
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		            
		            $('#quantity').val(quantity + 1);

		          
		            // Increment
		        
		    });

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		      
		            // Increment
		            if(quantity>0){
		            $('#quantity').val(quantity - 1);
		            }
		    });
		    
		});
	</script> -->
    
  </body>
</html>
<script type="text/javascript">
  function getQuantity(ID,qn,price) {
    var Id = ID;
    var qunn = 'qun'+qn;
    pq=document.getElementById(qunn).value;
    document.location.href="whish-to-cart.php?id="+Id+"&ProQuantity="+pq+"&ProductPrice="+price;
  }
  function getIDs(pro_id,wish_id) {
    var id = pro_id;
    var wish_id = wish_id;
    document.location.href="product-single.php?id="+id+"&wish_id="+wish_id+"&cart_id="+0;
  }
</script>
<?php
}
?>