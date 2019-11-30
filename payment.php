<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="description" content="Assignment Part 1" />
  <meta name="keywords" content="index, klim, institute, short, courses" />
  <meta name="author" content="Klim Huynh"  />
  <!--Viewport set to scale 1.0-->
  <meta name="viewpoint" content="width=device-width, initial-scale=1.0" />
  <!-- Reference to external style CSS file -->
  <link href="styles/style.css" rel="stylesheet" />
  <!--Reference to external responsive CSS file-->
  <link href="styles/responsive.css" rel="stylesheet" media="screen	and (max-width: 1024px)" />
  <script src="scripts/part2.js"></script>
  <script src="scripts/enhancements.js"></script>
  <title>Payment</title>
 </head>

<body>

<?php
include 'includes/header.inc';
include 'includes/menu.inc';
?>

<div id="timer"></div>	
<section id="payment-section">
<h2>Confirm this</h2>
<form id="bookform" method="post" action="process_order.php" novalidate="novalidate">
	<fieldset>
		<!-- Retreive stored data -->
		<legend>Your Booking</legend>
		<p>Student ID: <span id="confirm_id"></span></p>
		<p>First name: <span id="confirm_fname"></span></p>
		<p>Last name: <span id="confirm_lname"></span></p>
		<p>Email address: <span id="confirm_email"></span></p>
		<p>Billing street address: <span  id="confirm_street"></span></p>
		<p>Billing suburb: <span id="confirm_suburb"></span></p>
		<p>Billing state: <span id="confirm_state"></span></p>
		<p>Billing postcode: <span id="confirm_postcode"></span></p>
		<p>Delivery street address: <span id="confirm_delStreet"></span></p>
		<p>Delivery suburb: <span id="confirm_delSuburb"></span></p>
		<p>Delivery state: <span id="confirm_delState"></span></p>
		<p>Delivery postcode: <span id="confirm_delPostcode"></span></p>
		<p>Telephone: <span id="confirm_telephone"></span></p>
		<p>Prefer method of contact: <span id="confirm_prefer"></span></p>
		<p>Quantity: <span id="confirm_quantity"></span></p>
		<p>Product: <span id="confirm_products"></span></p>
		<p>Product feature: <span id="confirm_features"></span></p>
		<p>Comment:<span id="confirm_comment"></span></p>		
		<p>Total price: $<span  id="confirm_cost"></span></p>
		
		<!-- Stores it again for submission to the server -->
		<input type="hidden" name="studentId" id="studentId" />
		<input type="hidden" name="firstName" id="firstName" />
		<input type="hidden" name="lastName" id="lastName" />
		<input type="hidden" name="emailAd" id="emailAd" />
		<input type="hidden" name="street" id="street" />
		<input type="hidden" name="suburb" id="suburb" />
		<input type="hidden" name="state" id="state" />
		<input type="hidden" name="postcode" id="postcode" />
		<input type="hidden" name="delStreet" id="delStreet" />
		<input type="hidden" name="delSuburb" id="delSuburb" />
		<input type="hidden" name="delState" id="delState" />
		<input type="hidden" name="delPostcode" id="delPostcode" />
		<input type="hidden" name="telephone" id="telephone" />
		<input type="hidden" name="prefer" id="prefer" />	
		<input type="hidden" name="products" id="products" />	
		<input type="hidden" name="quantity" id="quantity" />		
		<input type="hidden" name="features" id="features" />		
		<input type="hidden" name="comment" id="comment" />			
		<input type="hidden" name="cost" id="cost" />
		
		
	</fieldset>
	
	<fieldset>
		<legend>Credit card details</legend>
			<p><label for="cardType">Credit card type</label> 
			<select name="cardType" id="cardType">
				<option value="">Please select</option>
				<option value="visa">Visa</option>
				<option value="mastercard">Mastercard</option>
				<option value="amex">AmEx</option>
			</select>
			</p>
			
			<p><label for="cardName">Name on card</label> 
			<input type="text" name= "cardName" id="cardName" maxlength="40" pattern="^[a-zA-Z ]+$" required="required"/>
			</p>
			
			<p><label for="cardNumber">Credit card number</label> 
				<input type="text" name= "cardNumber" id="cardNumber" pattern="\d{15,16}" required="required"/>
			</p>	
			
			<p><label for="cardExpiry">Credit card expiry date</label>
				<input type="text" name="cardExpiry" id="cardExpiry" pattern="\d{2}\/\d{2}" placeholder="MM/YY" required="required"/>
			</p>

			<p><label for="cardVerify">Card verfication</label>
				<input type="text" name="cardVerify" id="cardVerify" required="required"/>
			</p>
				
			<p><input type= "submit" id="checkout" value="Checkout"/>
			<button type="button" id="cancelButton">Cancel</button>
			</p>
			
	</fieldset>

</form>
</section>

<?php
// $test = true;
// $_SESSION["test"] = $test;
?>

<?php
include 'includes/footer.inc';
?>
</body>
</html>
