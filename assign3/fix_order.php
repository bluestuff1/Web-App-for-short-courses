<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="description" content="Assignment Part 3" />
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
  <title>Fix Order</title>
 </head>

<body>

<?php
include 'includes/header.inc';
include 'includes/menu.inc';
?>

<?php
session_start();

// $test = false;
// $_SESSION["test"] = $test ;
?>

<form method="post" action="process_order.php" novalidate="novalidate">

<section id="fix_order-section">
<h2>Errors</h2>

<?php 

$errMsg = $_SESSION["errMsg"];
echo $errMsg;

?>

</section>

<section id="fix_order-section2">
<?php
$studentId = $_SESSION['data']['studentId'];
$firstName = $_SESSION['data']['firstName'];
$lastName = $_SESSION['data']['lastName'];
$emailAd = $_SESSION['data']['emailAd'];
$street = $_SESSION['data']['street'];
$suburb = $_SESSION['data']['suburb'];
$state = $_SESSION['data']['state'];
$postcode = $_SESSION['data']['postcode'];
$delStreet = $_SESSION['data']['delStreet'];
$delSuburb = $_SESSION['data']['delSuburb'];
$delState = $_SESSION['data']['delState'];
$delPostcode = $_SESSION['data']['delPostcode'];
$telephone = $_SESSION['data']['telephone'];
$prefer = $_SESSION['data']['prefer'];
$products = $_SESSION['data']['products'];
$quantity = $_SESSION['data']['quantity'];
$features = $_SESSION['data']['features'];
$comment = $_SESSION['data']['comment'];
$cost = $_SESSION['data']['cost'];
$order_cost = $_SESSION['data']['order_cost'];
$cardType = $_SESSION['data']['cardType'];
$cardName = $_SESSION['data']['cardName'];
$cardNumber = $_SESSION['data']['cardNumber'];
$cardExpiry = $_SESSION['data']['cardExpiry'];
$cardVerify = $_SESSION['data']['cardVerify'];

echo '<p><label for="studentId">Student ID (optional) </label>
<input type="text" name = "studentId" id="studentId" value="'.$studentId.'" pattern="\d{7,10}"/></p>';

echo '<p><label for="firstName">First name: </label>
<input type="text" name = "firstName" id="firstName" value="'.$firstName.'" maxlength="25" pattern="^[a-zA-Z]+$" required="required"/></p>';

echo '<p><label for="lastName">Last name: </label>
<input type="text" name = "lastName" id="lastName" value="'.$lastName.'" maxlength="25" pattern="^[a-zA-Z]+$" required="required"/></p>';

echo '<p><label for="emailAd">Email Address: </label>
<input type="text" name = "emailAd" id="emailAd" value="'.$emailAd.'" required="required"/></p>';

echo '<fieldset id="billingAddress">
<legend>Billing Address: </legend>
<p><label for="street">Street address</label>
<input type="text" name="street" id="street" value="'.$street.'"/></p>';

echo '<p><label for="suburb">Suburb/Town</label> 
<input type="text" name= "suburb" id="suburb" value="'.$suburb.'" maxlength="20" required="required"/>
</p>';

echo '<p><label for="state">State</label> 
	<select name="state" id="state">
		<option value=""> Please Select</option>';
		
		if($state == "vic") {
			echo '<option value="vic" selected="selected">VIC</option>';
		}
		else {
			echo '<option value="vic">VIC</option>';
		}
		
		if($state == "nsw") {
			echo '<option value="nsw" selected="selected">NSW</option>';
		}
		else {
			echo '<option value="nsw">NSW</option>';
		}
		
		if($state == "qld") {
			echo '<option value="qld" selected="selected">QLD</option>';
		}
		else {
			echo '<option value="qld">QLD</option>';
		}

		if($state == "nt") {
			echo '<option value="nt" selected="selected">NT</option>';
		}
		else {
			echo '<option value="nt">NT</option>';
		}	

		if($state == "nt") {
			echo '<option value="nt" selected="selected">NT</option>';
		}
		else {
			echo '<option value="nt">NT</option>';
		}	
		
		if($state == "wa") {
			echo '<option value="wa" selected="selected">WA</option>';
		}
		else {
			echo '<option value="wa">WA</option>';
		}
		
		if($state == "sa") {
			echo '<option value="sa" selected="selected">SA</option>';
		}
		else {
			echo '<option value="SA">WA</option>';
		}
		
		if($state == "tas") {
			echo '<option value="wa" selected="selected">WA</option>';
		}
		else {
			echo '<option value="wa">WA</option>';
		}
		
		if($state == "act") {
			echo '<option value="act" selected="selected">ACT</option>';
		}
		else {
			echo '<option value="act">ACT</option>';
		}
	
echo '</select>				
	</p>';

echo '<p>Postcode
		<input type="text" name= "postcode" id="postcode" value="'.$postcode.'" pattern="\d{4}" required="required"/>
		</p>	
	</fieldset>';

echo '<fieldset id="delAddress">
			<legend>Delivery Address:</legend>				
			<p><label for="delStreet">Street address</label> 
			<input type="text" name= "delStreet" id="delStreet" value="'.$delStreet.'" maxlength="40" required="required"/>
			</p>					
			<p><label for="delSuburb">Suburb/Town</label> 
			<input type="text" name= "delSuburb" id="delSuburb" value="'.$delSuburb.'" maxlength="20" required="required"/>
			</p>';	
			
echo '<p><label for="delState">State</label> 
	<select name="delState" id="delState">
		<option value=""> Please Select</option>';
		
		if($delState == "vic") {
			echo '<option value="vic" selected="selected">VIC</option>';
		}
		else {
			echo '<option value="vic">VIC</option>';
		}
		
		if($delState == "nsw") {
			echo '<option value="nsw" selected="selected">NSW</option>';
		}
		else {
			echo '<option value="nsw">NSW</option>';
		}
		
		if($delState == "qld") {
			echo '<option value="qld" selected="selected">QLD</option>';
		}
		else {
			echo '<option value="qld">QLD</option>';
		}

		if($delState == "nt") {
			echo '<option value="nt" selected="selected">NT</option>';
		}
		else {
			echo '<option value="nt">NT</option>';
		}	

		if($delState == "nt") {
			echo '<option value="nt" selected="selected">NT</option>';
		}
		else {
			echo '<option value="nt">NT</option>';
		}	
		
		if($delState == "wa") {
			echo '<option value="wa" selected="selected">WA</option>';
		}
		else {
			echo '<option value="wa">WA</option>';
		}
		
		if($delState == "sa") {
			echo '<option value="sa" selected="selected">SA</option>';
		}
		else {
			echo '<option value="SA">WA</option>';
		}
		
		if($delState == "tas") {
			echo '<option value="wa" selected="selected">WA</option>';
		}
		else {
			echo '<option value="wa">WA</option>';
		}
		
		if($delState == "act") {
			echo '<option value="act" selected="selected">ACT</option>';
		}
		else {
			echo '<option value="act">ACT</option>';
		}
	
echo '</select>				
	</p>';
	
echo '<p>Postcode
		<input type="text" name= "delPostcode" id="delPostcode" value="'.$delPostcode.'" pattern="\d{4}" required="required"/>
		</p>	
	</fieldset>';


echo	'<p><label for="telephone">Telephone number</label>
		<input type="tel" name= "telephone" id="telephone" pattern="\d{10}" value="'.$telephone.'" placeholder="0300000000" required="required"/>
		</p>';

echo	'<fieldset id="prefer">
		<legend>Preferred Contact</legend>
			<label for="email">Email</label> 
			<input type="radio" id="email" name="prefer" value="email"/><br />
			<label for="post">Post</label> 
			<input type="radio" id="post" name="prefer" value="post"/><br />
			<label for="phone">Phone</label> 
			<input type="radio" id="phone" name="prefer" value="phone"/><br />
		</fieldset>';
		
echo '<p><label for="products">Products</label> 
			<select name="products" id="products">
				<option value="none"> Please Select</option>';
				
if($products == "Bookkeeping - Level 1") {
	echo '<option value="Bookkeeping - Level 1" selected="selected">Bookkeeping - Level 1</option>';
}
else {			
	echo '<option value="Bookkeeping - Level 1">Bookkeeping - Level 1</option>';
}

if($products == "Plasterboard Installation") {
	echo '<option value="Plasterboard Installation" selected="selected">Plasterboard Installation</option>';
}
else {			
	echo '<option value="Plasterboard Installation">Plasterboard Installation</option>';
}

if($products == "Bartending - Level 3") {
	echo '<option value="Bartending - Level 3" selected="selected">Bartending - Level 3</option>';
}
else {			
	echo '<option value="Bartending - Level 3">Bartending - Level 3</option>';
}
				
echo '</select>
		</p>';

echo	'<p><label for="quantity">Quantity</label> 
			<input type="number" name= "quantity" id="quantity" value="'.$quantity.'" min="1" max="999999" required="required"/>
		</p>';
					
echo '<p><label for="features">Features</label> 
		<select name="features" id="features">
			<option value=""> Please Select</option>
			<option value="General">General</option>			
			<option value="Fees">Fees</option>
			<option value="Studying Online">General</option>
			<option value="Working with students">Working with students</option>
		</select>				
		</p>';		

echo 	'<p><label for="comment">Comment</label>
		<br	/>
		<textarea id="comment" name="comment"  rows="4" cols="40">'.$comment.'</textarea>			
		</p>';	
		
echo '<fieldset>
		<legend>Credit card details</legend>
			<p><label for="cardType">Credit card type</label> 
			<select name="cardType" id="cardType">
				<option value="">Please select</option>
				<option value="visa">Visa</option>
				<option value="mastercard">Mastercard</option>
				<option value="amex">AmEx</option>
			</select>
			</p>';
			
			echo'<p><label for="cardName">Name on card</label> 
			<input type="text" name= "cardName" id="cardName" maxlength="40" pattern="^[a-zA-Z ]+$" required="required"/>
			</p>';
			
			echo '<p><label for="cardNumber">Credit card number</label> 
				<input type="text" name= "cardNumber" id="cardNumber" pattern="\d{15,16}" required="required"/>
			</p>';	
			
			
			echo '<p><label for="cardExpiry">Credit card expiry date</label>
				<input type="text" name="cardExpiry" id="cardExpiry" pattern="\d{2}\/\d{2}" placeholder="MM/YY" required="required"/>
			</p>';

			echo '<p><label for="cardVerify">Card verfication</label>
				<input type="text" name="cardVerify" id="cardVerify" required="required"/>
			</p>	
	</fieldset>';

		
echo	'<p><input type= "submit" id="submit" value="Submit"/>
			<input type= "reset" id="reset" value="Reset Form"/>
		</p>';
?>
</section>
</form>
<br />

<?php
include 'includes/footer.inc';
?>
</body>
</html>