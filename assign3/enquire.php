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
  <title>Enquire</title>
</head>
 
<body>

<?php
include 'includes/header.inc';
include 'includes/menu.inc';
?>

	<hr	/>
<!-- A form -->
<section id="enquire-section">
<h2>Fill out this form</h2>
	<form id="enquireform" method="post" action="payment.php" novalidate="novalidate">
	
		<label for="debugButton">Debug mode</label> 
			<input type="checkbox" id="debugButton" name="debugButton" value="debugButton"/>
		
	
		<p><label for="studentId">Student ID (optional)</label> 
			<input type="text" name= "studentId" id="studentId" pattern="\d{7,10}"/>
		</p>
		<p><label for="firstName">First name:</label>
			<input type="text" name= "firstName" id="firstName" maxlength="25" pattern="^[a-zA-Z]+$" required="required"/>
		</p>
		<p><label for="lastName">Last name:</label>
			<input type="text" name= "lastName" id="lastName" maxlength="25" pattern="^[a-zA-Z]+$" required="required"/>
		</p>
		<p><label for="emailAd">Email address</label>
			<input type="text" name= "emailAd" id="emailAd" required="required"/>
		</p>
		<fieldset id="billingAddress">
			<legend>Billing Address:</legend>				
			<p><label for="street">Street address</label> 
			<input type="text" name= "street" id="street" maxlength="40" required="required"/>
			</p>					
			<p><label for="suburb">Suburb/Town</label> 
			<input type="text" name= "suburb" id="suburb" maxlength="20" required="required"/>
			</p>	
			<p><label for="state">State</label> 
			<select name="state" id="state">
				<option value=""> Please Select</option>
				<option value="vic">VIC</option>			
				<option value="nsw">NSW</option>
				<option value="qld">QLD</option>
				<option value="nt">NT</option>
				<option value="wa">WA</option>
				<option value="sa">SA</option>
				<option value="tas">TAS</option>
				<option value="act">ACT</option>
			</select>				
			</p>			
			<p>Postcode
			<input type="text" name= "postcode" id="postcode" pattern="\d{4}" required="required"/>
			</p>	
		</fieldset>
		
		<!-- This is part of JavaScript Enhancement 2 -->
		<label for="isDifferentAd">Billing address different from Delivery Address</label> 
			<input type="checkbox" id="isDifferentAd" name="isDifferentAd" value="isDifferentAd" checked="checked"/>
		
		<fieldset id="delAddress">
			<legend>Delivery Address:</legend>				
			<p><label for="delStreet">Street address</label> 
			<input type="text" name= "delStreet" id="delStreet" maxlength="40" required="required"/>
			</p>					
			<p><label for="delSuburb">Suburb/Town</label> 
			<input type="text" name= "delSuburb" id="delSuburb" maxlength="20" required="required"/>
			</p>	
			<p><label for="delState">State</label> 
			<select name="delState" id="delState">
				<option value=""> Please Select</option>
				<option value="vic">VIC</option>			
				<option value="nsw">NSW</option>
				<option value="qld">QLD</option>
				<option value="nt">NT</option>
				<option value="wa">WA</option>
				<option value="sa">SA</option>
				<option value="tas">TAS</option>
				<option value="act">ACT</option>
			</select>				
			</p>
			<p>Postcode
			<input type="text" name= "delPostcode" id="delPostcode" pattern="\d{4}" required="required"/>
			</p>	
		</fieldset>		
		
		<p><label for="telephone">Telephone number</label>
		<input type="tel" name= "telephone" id="telephone" pattern="\d{10}" placeholder="0300000000" required="required"/>
		</p>
		
		<fieldset id="prefer">
		<legend>Preferred Contact</legend>
			<label for="email">Email</label> 
			<input type="radio" id="email" name="preferred" value="email" required="required"/><br />
			<label for="post">Post</label> 
			<input type="radio" id="post" name="preferred" value="post" required="required"/><br />
			<label for="phone">Phone</label> 
			<input type="radio" id="phone" name="preferred" value="phone" required="required"/><br />
		</fieldset>
		
		<section id="tables">
		  <h2>Course prices</h2>
		  <!-- Table with courses and its price -->
		  <table id="product-table">
			 <caption>Payment must be made before commencement</caption>
			 <thead>
				<tr>
				  <th scope="col">Course name</th>
				  <th scope="col">Duration (Days)</th>
				  <th scope="col">Typical total course fee ($AUD)</th>
				</tr>
			</thead>
			<tbody>
			 <tr>
			   <th scope="row">Bookkeeping - Level 1</th>
			   <td>5</td>
			   <td>$400</td>
			 </tr>
			 <tr>
			   <th scope="row">Plasterboard Installation</th>
			   <td>3</td>
			   <td>$450</td>
			 </tr>
			  <tr>
			   <th scope="row">Bartending - Level 3</th>
			   <td>7</td>
			   <td>$900</td>
			 </tr>
			</tbody>
			</table>
		</section>
		
		<p><label for="products">Products</label> 
			<select name="products" id="products">
				<option value="none"> Please Select</option>
				<option value="Bookkeeping - Level 1">Bookkeeping - Level 1</option>			
				<option value="Plasterboard Installation">Plasterboard Installation</option>
				<option value="Bartending - Level 3">Bartending - Level 3</option>
			</select>
		</p>
		<p><label for="quantity">Quantity</label> 
			<input type="number" name= "quantity" id="quantity" min="1" max="999999" required="required"/>
		</p>				
			
		<p id="features">Product features</p>
		<p><label for="general">General</label> 
			<input type="checkbox" id="general" name="features[]" value="general"/>
				
		<label for="fees">Fees</label> 
			<input type="checkbox" id="fees" name="features[]" value="fees"/>
				
		<label for="online">Studying Online</label> 
			<input type="checkbox" id="online" name="features[]" value="online"/>
			
		<label for="working">Working with Students</label> 
			<input type="checkbox" id="working" name="features[]" value="working"/>
		</p>
		<p><label for="comment">Comment</label>
		<br	/>
		<textarea id="comment" name="comment" placeholder="Write description of your enquiry here..." rows="4" cols="40"></textarea>			
		</p>
		
		<p><input type= "submit" id="pay" value="Pay Now"/>
			<input type= "reset" id="reset" value="Reset Form"/>
		</p>
</form>	
</section>

<?php
include 'includes/footer.inc';
?>

</body>
</html>