<?php
session_start();
include ('connection.php');
$Pro_id=$_GET['id'];
$ProQuantity=$_GET['ProQuantity'];
$subtotal=$_GET['subtotal'];
$wish_id=$_GET['wish_id'];
$cart_id=$_GET['cart_id'];
$subt=$subtotal;
$dlvry=5;
$disc=1;
$total=$subt+$dlvry-$disc;
if (isset($_POST['submit'])) {
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$country=$_POST['country'];
	$address1=$_POST['address1'];
	$address2=$_POST['address2'];
	if($address2==""){
		$address2="null";
	}
	$city=$_POST['city'];
	$postcode=$_POST['postcode'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$payment=$_POST['payment'];
	$termCondition=$_POST['termCondition'];
	$qry="INSERT INTO checkout_tbl(First_name,Last_name,Country,Address1,Address2,City,Postcode,Phone,Email,Pro_ID,Pro_Qunatity,Total_amount,Payment_Method,TermCondition) VALUES('$fname','$lname','$country','$address1','$address2','$city','$postcode','$phone','$email','$Pro_id','$ProQuantity','$total','$payment','$termCondition')";
	$run=mysqli_query($conn,$qry);
	if ($run) {
      	if ($wish_id !=0) {
            $delwish_qry="DELETE FROM wishlist_tbl WHERE ID='$wish_id'";
            $delwish_run=mysqli_query($conn,$delwish_qry);
            echo '<script language="javascript">';
            echo 'alert("Your order is placed successfully and also product remove from wish List")';  
            echo '</script>';
            echo "<script>location.replace('index.php')</script>";
        }else if ($cart_id !=0) {
            $delcart_qry="DELETE FROM cart_tbl WHERE ID='$cart_id'";
			$delcart_run=mysqli_query($conn,$delcart_qry);
            echo '<script language="javascript">';
            echo 'alert("Your order is placed successfully and also product remove from your carts")';  
            echo '</script>';
            echo "<script>location.replace('index.php')</script>";
        }
        else {
          	echo '<script language="javascript">';
          	echo 'alert("Your order is placed successfully")';  
          	echo '</script>';
          	echo "<script>location.replace('index.php')</script>";
        }
    }else{
      echo '<script language="javascript">';
      echo 'alert("Your order is not placed successfully")';  
      echo '</script>';
      //echo "<script>location.replace('index.php')</script>";
    }

}
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
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Checkout</span></p>
            <h1 class="mb-0 bread">Checkout</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-7 ftco-animate">
			<form action="" method="post" class="billing-form">
				<h3 class="mb-4 billing-heading">Billing Details</h3>
	          	<div class="row align-items-end">
	          		<div class="col-md-6">
	                <div class="form-group">
	                	<label for="firstname">Firt Name</label>
	                  <input type="text" class="form-control" name="fname" placeholder="Firt Name"  minlength="3" required="">
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                	<label for="lastname">Last Name</label>
	                  <input type="text" class="form-control" name="lname"  minlength="3" placeholder="Last Name" required="">
	                </div>
                </div>
                <div class="w-100"></div>
		            <div class="col-md-12">
		            	<div class="form-group">
		            		<label for="country">State / Country</label>
		            		<div class="select-wrap">
		                  <div class="icon"><span class="ion-ios-arrow-down"></span></div>
		                  <select name="country" id="" class="form-control" required="">
		                  	<option value="Pakisant">Pakisant</option>
		                    <option value="Italy">Italy</option>
		                    <option value="Philippines">Philippines</option>
		                    <option value="South Korea">South Korea</option>
		                    <option value="Hongkong">Hongkong</option>
		                    <option value="Japan">Japan</option>
		                  </select>
		                </div>
		            	</div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                	<label for="streetaddress">Street Address</label>
	                  <input type="text" class="form-control" name="address1" minlength="3" placeholder="House number and street name" required="">
	                </div>
		            </div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                  <input type="text" class="form-control"  minlength="3" name="address2" placeholder="Appartment, suite, unit etc: (optional)">
	                </div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                	<label for="towncity">Town / City</label>
	                  <input type="text" class="form-control" name="city" minlength="3" placeholder="Town / City" required="">
	                </div>
		            </div>
		            <div class="col-md-6">
		            	<div class="form-group">
		            		<label for="postcodezip">Postcode / ZIP *</label>
	                  <input type="text" class="form-control" name="postcode" minlength="3" placeholder="Postcode / ZIP *" required="">
	                </div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-6">
	                <div class="form-group">
	                	<label for="phone">Phone</label>
	                  <input type="text" class="form-control" minlength="3" name="phone" placeholder="countrycode-number" required="">
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                	<label for="emailaddress">Email Address</label>
	                  <input type="email" class="form-control" name="email" minlength="3" placeholder="example@abc.com" required="">
	                </div>
                </div>
                <div class="w-100"></div>
                <div class="col-md-12">
                	<div class="form-group mt-4">
										<div class="radio">
										  <!-- <label class="mr-3"><input type="radio" name="optradio"> Create an Account? </label> --><!-- 
										  <label><input type="radio" name="optradio"> Ship to different address</label> -->
										</div>
									</div>
                </div>
	            </div>
					</div>
					<div class="col-xl-5">
	           <div class="row mt-5 pt-3">
	          	<div class="col-md-12 d-flex mb-5">
	          		<div class="cart-detail cart-total p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Cart Total</h3>
	          			<p class="d-flex">
		    						<span>Subtotal</span>
		    						<span>$<?php echo $subtotal; ?></span>
		    					</p>
		    					<p class="d-flex">
		    						<span>Delivery</span>
		    						<span>$5.00</span>
		    					</p>
		    					<p class="d-flex">
		    						<span>Discount</span>
		    						<span>$1.00</span>
		    					</p>
		    					<hr>
		    					<p class="d-flex total-price">
		    						<span>Total</span>
		    						<span>$<?php echo $total;?></span>
		    					</p>
								</div>
	          	</div>
	          	<div class="col-md-12">
	          		<div class="cart-detail p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Payment Method</h3>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" name="payment" value="Direct Bank Tranfer" class="mr-2" required="" > Direct Bank Tranfer</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" name="payment" class="mr-2" value="Check Payment" required=""> Check Payment</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" name="payment" class="mr-2" value="Cash On Delivery" required=""> Cash On Delivery</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<div class="checkbox">
											   <label><input type="checkbox" value="1" name="termCondition" class="mr-2" required=""> I have read and accept the terms and conditions</label>
											</div>
										</div>
									</div>
									<button type="submit" name="submit" class="btn btn-primary py-3 px-4">Place an order</button>
									<button type="reset" name="reset" class="btn btn-primary py-3 px-4">Clear</button>
								</div>

	         </form><!-- END -->
	          </div>
	        </div>
          </div> <!-- .col-md-8 -->
        </div>
      </div>
    </section> <!-- .section -->

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

  <script>
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
	</script>
    
  </body>
</html>