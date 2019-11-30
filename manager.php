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
<h1>Manager</h1>
<hr />

<section id = "manager-section">
<form method="post" action="manager.php">

<fieldset>
<fieldset><legend>Search Order Details</legend>
	<p class="row">	<label for="order_id">Order number: </label>
		<input type="text" name="order_id" id="order_id" /></p>
	<p class="row">	<label for="firstName">First Name: </label>
		<input type="text" name="firstName" id="firstName" /></p>
	<p class="row">	<label for="lastName">Last Name: </label>
		<input type="text" name="lastName" id="lastName" /></p>

	
	<p><label for="products">Sort by products: </label> 
		<select name="products" id="products">
			<option value=""> Please Select</option>
			<option value="Bookkeeping - Level 1">Bookkeeping - Level 1</option>			
			<option value="Plasterboard Installation">Plasterboard Installation</option>
			<option value="Bartending - Level 3">Bartending - Level 3</option>
		</select>				
		</p>
		
		
</fieldset>
<br />
<fieldset><legend>Others</legend>
	<p><label for="sort">Sort/Display </label> 
	<select name="sort" id="sort">
		<option value=""> Please Select</option>
		<option value="sort_pending">Display Pending Orders</option>			
		<option value="sort_cost">Sort by Order Cost</option>
	</select>				
	</p>
</fieldset>

<fieldset><legend>Update order</legend>
	<p class="row">	<label for="order_id_update">Order ID: </label>
		<input type="text" name="order_id_update" id="order_id_update" /></p>
	<p class="row">	<label for="lastName_update">Last Name: </label>
		<input type="text" name="lastName_update" id="lastName_update" /></p>

	<p><label for="order_status">Order: </label> 
	<select name="order_status" id="order_status">
		<option value=""> Please Select</option>
		<option value="PENDING">PENDING</option>
		<option value="FULFILLED">FULFILLED</option>
		<option value="PAID">PAID</option>
		<option value="ARCHIVED">ARCHIVED</option>
		
	</select>				
	</p>
</fieldset>

<fieldset><legend>Delete order</legend>
	<p class="row">	<label for="order_id_delete">Order ID: </label>
		<input type="text" name="order_id_delete" id="order_id_delete" /></p>
	<p class="row">	<label for="lastName_delete">Last Name: </label>
		<input type="text" name="lastName_delete" id="lastName_delete" /></p>
		
<br/>
<p id = "note">Note: Only pending orders can be cancelled</p>
</fieldset>
	<p><input type="submit" value="Submit" /> 
	<input type= "reset" id="reset" value="Reset Form"/> 
	</p>
</fieldset>

</form>

<?php		
// Thought Co. 2018, How to Write a 'Last Visited' Script in PHP, viewed 23 October, 2018, <https://www.thoughtco.com/you-last-visited-php-script-2693848>.
	if(isset($_COOKIE['AboutVisit'])){
	$last = $_COOKIE['AboutVisit']; 
	}
	$year = 31536000 + time();
	setcookie('AboutVisit', time (), $year) ;
	if (isset ($last)){
	$change = time () - $last;
	echo "<h2>You last logged in on ". date("M,d,Y h:i:s A",$last)."</h2>" ;
	}
?>
</section>
<br />
	
<?php
	require_once ("settings.php");	//connection info
	
	$conn = @mysqli_connect($host,
		$user,
		$pwd,
		$sql_db
	);
	

	// Checks if connection is successful
	if (!$conn) {
		// Displays an error message
		echo "<p>Database connection failure</p>"; // not in production script
	} else {
		// Upon successful connection
		
		$sql_table="orders";			

		function sanitise_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}	
	
	if ($_POST){

	$order_id = $_POST["order_id"];
	$order_id = sanitise_input($order_id);
	
	$firstName = $_POST["firstName"];
	$firstName = sanitise_input($firstName);
	
	$lastName = $_POST["lastName"];
	$lastName = sanitise_input($lastName);
	
	$products = $_POST["products"];
	$products = sanitise_input($products);
	
	$sort = $_POST["sort"];
	$sort = sanitise_input($sort);
	
	$order_id_update = $_POST["order_id_update"];
	$order_id_update = sanitise_input($order_id_update);
	
	$lastName_update = $_POST["lastName_update"];
	$lastName_update = sanitise_input($lastName_update);
	
	$order_id_delete = $_POST["order_id_delete"];
	$order_id_delete = sanitise_input($order_id_delete);
	
	$lastName_delete = $_POST["lastName_delete"];
	$lastName_delete = sanitise_input($lastName_delete);
	
	$order_status = $_POST["order_status"];
	$order_status = sanitise_input($order_status);
	
		// none entered
		if(($order_id == null) && ($firstName == null) && ($lastName == null) && ($products == null)){
			$query = "SELECT order_id,order_time,firstName,lastName,products,order_cost,order_status FROM orders";
		}
		
		// all entered
		if(($order_id != null) && ($firstName != null) && ($lastName != null) && ($products != null)){
		$query = "SELECT order_id,order_time,firstName,lastName,products,order_cost,order_status FROM orders WHERE order_id = '$order_id' AND firstName = '$firstName' AND lastName = '$lastName' AND products = '$products'";
		}
		
		// only 1 is entered
		if(($order_id != null) && ($firstName == null) && ($lastName == null) && ($products == null)){
			$query = "SELECT order_id,order_time,firstName,lastName,products,order_cost,order_status FROM orders WHERE order_id = '$order_id'";
		}
		
		if(($order_id == null) && ($firstName != null) && ($lastName == null) && ($products == null)){
			$query = "SELECT order_id,order_time,firstName,lastName,products,order_cost,order_status FROM orders WHERE firstName = '$firstName'";
		}
		
		if(($order_id == null) && ($firstName == null) && ($lastName != null) && ($products == null)){
			$query = "SELECT order_id,order_time,firstName,lastName,products,order_cost,order_status FROM orders WHERE lastName = '$lastName'";
		}
		
		if(($order_id == null) && ($firstName == null) && ($lastName == null) && ($products != null)){
			$query = "SELECT order_id,order_time,firstName,lastName,products,order_cost,order_status FROM orders WHERE products = '$products'";
		}
			
		// only 2 are entered
		if(($order_id != null) && ($firstName != null) && ($lastName == null) && ($products == null)){
			$query = "SELECT order_id,order_time,firstName,lastName,products,order_cost,order_status FROM orders WHERE order_id = '$order_id' AND firstName = '$firstName'";
		}

		if(($order_id != null) && ($firstName == null) && ($lastName != null) && ($products == null)){
			$query = "SELECT order_id,order_time,firstName,lastName,products,order_cost,order_status FROM orders WHERE order_id = '$order_id' AND lastName = '$lastName'";
		}

		if(($order_id != null) && ($firstName == null) && ($lastName == null) && ($products != null)){
			$query = "SELECT order_id,order_time,firstName,lastName,products,order_cost,order_status FROM orders WHERE order_id = '$order_id' AND products = '$products'";
		}
		
		if(($order_id == null) && ($firstName != null) && ($lastName != null) && ($products == null)){
			$query = "SELECT order_id,order_time,firstName,lastName,products,order_cost,order_status FROM orders WHERE firstName = '$firstName' AND lastName = '$lastName'";
		}

		if(($order_id == null) && ($firstName != null) && ($lastName == null) && ($products != null)){
			$query = "SELECT order_id,order_time,firstName,lastName,products,order_cost,order_status FROM orders WHERE firstName = '$firstName' AND products = '$products'";
		}
		
		if(($order_id == null) && ($firstName == null) && ($lastName != null) && ($products != null)){
			$query = "SELECT order_id,order_time,firstName,lastName,products,order_cost,order_status FROM orders WHERE lastName = '$lastName' AND products = '$products'";
		}

		// only 3 are entered
		if(($order_id != null) && ($firstName != null) && ($lastName != null) && ($products == null)){
			$query = "SELECT order_id,order_time,firstName,lastName,products,order_cost,order_status FROM orders WHERE order_id = '$order_id' AND firstName = '$firstName' AND lastName = '$lastName'";
		}
		
		if(($order_id != null) && ($firstName!= null) && ($lastName == null) && ($products != null)){
			$query = "SELECT order_id,order_time,firstName,lastName,products,order_cost,order_status FROM orders WHERE order_id = '$order_id' AND firstName = '$firstName' AND products = '$products'";
		}
		
		if(($order_id != null) && ($firstName == null) && ($lastName != null) && ($products != null)){
			$query = "SELECT order_id,order_time,firstName,lastName,products,order_cost,order_status FROM orders WHERE order_id = '$order_id' AND lastName = '$lastName' AND products = '$products'";
		}
		
		if(($order_id == null) && ($firstName != null) && ($lastName != null) && ($products != null)){
			$query = "SELECT order_id,order_time,firstName,lastName,products,order_cost,order_status FROM orders WHERE firstName = '$firstName' AND lastName = '$lastName' AND products = '$products'";
		}
		
		// sort by either pending orders or costs
		if($sort == "sort_pending") {
			$query = "SELECT order_id,order_time,firstName,lastName,products,order_cost,order_status FROM orders WHERE order_status = 'PENDING'";
		}
		
		if($sort == "sort_cost") {
			$query = "SELECT order_id,order_time,firstName,lastName,products,order_cost,order_status FROM orders ORDER BY order_cost";
		}
		
		// update status of order
		if(($order_id_update != null) && ($lastName_update != null)) {
			if($order_status != null) {
				mysqli_query($conn, "UPDATE orders SET order_status = '$order_status' WHERE order_id = '$order_id_update' AND lastName = '$lastName_update'");
			}
		}
		
		// cancel a pending order
		if(($order_id_delete != null) && ($lastName_delete != null)) {
			mysqli_query($conn, "DELETE FROM orders WHERE order_id = '$order_id_delete' AND lastName = '$lastName_delete' AND order_status = 'PENDING'");
		}
		
			// execute the query and store result into the result pointer
			$result = mysqli_query($conn, $query);
			
			// checks if the execution was successful
			if(!$result) {
				echo "<p>Something is wrong with ", $query, "</p>";
				header("fix_order.php");
			} else {
				// Display the retrieved records
				echo "<table border=\"1\">\n";
				echo "<tr>\n "
					."<th scope=\"col\">order_id</th>\n "
					."<th scope=\"col\">order_time</th>\n "
					."<th scope=\"col\">firstName</th>\n "
					."<th scope=\"col\">lastName</th>\n "
					."<th scope=\"col\">products</th>\n "
					."<th scope=\"col\">order_cost</th>\n "
					."<th scope=\"col\">order_status</th>\n "
					."</tr>\n ";
				// retrieve current record pointed by the result pointer
				
				while ($row = mysqli_fetch_assoc($result)) {
					echo "<tr>\n ";
					echo "<td>",$row["order_id"],"</td>\n ";
					echo "<td>",$row["order_time"],"</td>\n ";
					echo "<td>",$row["firstName"],"</td>\n ";
					echo "<td>",$row["lastName"],"</td>\n ";
					echo "<td>",$row["products"],"</td>\n ";	
					echo "<td>",$row["order_cost"],"</td>\n ";
					echo "<td>",$row["order_status"],"</td>\n ";
					echo "</tr>\n ";
			}
			echo "</table>\n ";
			// Frees up the memory, after using the result pointer
			mysqli_free_result($result);
			} // if successful query operation
			
			// close the database connection
			mysqli_close($conn);
		} // if successful database connection
	}
	
	
?>

<?php
include 'includes/footer.inc';
?>

</body>
</html>