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
  <title>Receipt</title>
 </head>
 
<body>

<?php
include 'includes/header.inc';
include 'includes/menu.inc';
?>

<h1>Receipt</h1>
<?php
	require_once ("settings.php");	//connection info
	
	$conn = mysqli_connect($host,
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
		
		// Set up the SQL command to query or add data into the table
		
		$query = "SELECT order_id, studentId, firstName, lastName, emailAd, street, suburb, state, postcode, delStreet, delSuburb, delState, delPostcode, telephone, prefer, products, quantity, features, comment, cost, cardType, cardName, cardNumber, cardExpiry, cardVerify, order_cost, order_time, order_status FROM orders WHERE order_id=(SELECT MAX(order_id) FROM orders)";
		// execute the query and store result into the result pointer
		$result = mysqli_query($conn, $query);
		
		// checks if the execution was successful
		if(!$result) {
			echo "<p>Something is wrong with ", $query, "</p>";
		} else {
			echo "<table>\n";
			while ($row = mysqli_fetch_assoc($result)) {
			
			echo "<tr>\n ";
			echo "<th scope=\"col\">order_id</th>\n ";
			echo "<td>",$row["order_id"],"</td>\n ";
			echo "</tr>\n";
			
			echo "<tr>\n ";
			echo "<th scope=\"col\">student_id</th>\n ";
			echo "<td>",$row["studentId"],"</td>\n ";
			echo "</tr>\n";
			
			echo "<tr>\n ";
			echo "<th scope=\"col\">firstName</th>\n ";
			echo "<td>",$row["firstName"],"</td>\n ";
			echo "</tr>\n";

			echo "<tr>\n ";
			echo "<th scope=\"col\">lastName</th>\n ";
			echo "<td>",$row["lastName"],"</td>\n ";
			echo "</tr>\n";
			
			echo "<tr>\n ";
			echo "<th scope=\"col\">emailAd</th>\n ";
			echo "<td>",$row["emailAd"],"</td>\n ";
			echo "</tr>\n";

			echo "<tr>\n ";
			echo "<th scope=\"col\">street</th>\n ";
			echo "<td>",$row["street"],"</td>\n ";
			echo "</tr>\n";
			
			echo "<tr>\n ";
			echo "<th scope=\"col\">suburb</th>\n ";
			echo "<td>",$row["suburb"],"</td>\n ";
			echo "</tr>\n";
		
			echo "<tr>\n ";
			echo "<th scope=\"col\">state</th>\n ";
			echo "<td>",$row["state"],"</td>\n ";
			echo "</tr>\n";	

			echo "<tr>\n ";
			echo "<th scope=\"col\">postcode</th>\n ";
			echo "<td>",$row["postcode"],"</td>\n ";
			echo "</tr>\n";
			
			echo "<tr>\n ";
			echo "<th scope=\"col\">delStreet</th>\n ";
			echo "<td>",$row["delStreet"],"</td>\n ";
			echo "</tr>\n";

			echo "<tr>\n ";
			echo "<th scope=\"col\">delSuburb</th>\n ";
			echo "<td>",$row["delSuburb"],"</td>\n ";
			echo "</tr>\n";
			
			echo "<tr>\n ";
			echo "<th scope=\"col\">delPostcode</th>\n ";
			echo "<td>",$row["delPostcode"],"</td>\n ";
			echo "</tr>\n";

			echo "<tr>\n ";
			echo "<th scope=\"col\">telephone</th>\n ";
			echo "<td>",$row["telephone"],"</td>\n ";
			echo "</tr>\n";
			
			echo "<tr>\n ";
			echo "<th scope=\"col\">prefer</th>\n ";
			echo "<td>",$row["prefer"],"</td>\n ";
			echo "</tr>\n";
			
			echo "<tr>\n ";
			echo "<th scope=\"col\">products</th>\n ";
			echo "<td>",$row["products"],"</td>\n ";
			echo "</tr>\n";			
			
			echo "<tr>\n ";
			echo "<th scope=\"col\">quantity</th>\n ";
			echo "<td>",$row["quantity"],"</td>\n ";
			echo "</tr>\n";

			echo "<tr>\n ";
			echo "<th scope=\"col\">features</th>\n ";
			echo "<td>",$row["features"],"</td>\n ";
			echo "</tr>\n";
			
			echo "<tr>\n ";
			echo "<th scope=\"col\">comment</th>\n ";
			echo "<td>",$row["comment"],"</td>\n ";
			echo "</tr>\n";
			
			echo "<tr>\n ";
			echo "<th scope=\"col\">cost</th>\n ";
			echo "<td>",$row["cost"],"</td>\n ";
			echo "</tr>\n";
			
			echo "<tr>\n ";
			echo "<th scope=\"col\">cardType</th>\n ";
			echo "<td>",$row["cardType"],"</td>\n ";
			echo "</tr>\n";

			echo "<tr>\n ";
			echo "<th scope=\"col\">cardName</th>\n ";
			echo "<td>","****","</td>\n ";
			echo "</tr>\n";		

			echo "<tr>\n ";
			echo "<th scope=\"col\">cardNumber</th>\n ";
			echo "<td>","****","</td>\n ";
			echo "</tr>\n";				
			
			echo "<tr>\n ";
			echo "<th scope=\"col\">cardExpiry</th>\n ";
			echo "<td>","****","</td>\n ";
			echo "</tr>\n";	
			
			echo "<tr>\n ";
			echo "<th scope=\"col\">cardVerify</th>\n ";
			echo "<td>","****","</td>\n ";
			echo "</tr>\n";
			
			echo "<tr>\n ";
			echo "<th scope=\"col\">order_cost</th>\n ";
			echo "<td>",$row["order_cost"],"</td>\n ";
			echo "</tr>\n";

			echo "<tr>\n ";
			echo "<th scope=\"col\">order_time</th>\n ";
			echo "<td>",$row["order_time"],"</td>\n ";
			echo "</tr>\n";
			
			echo "<tr>\n ";
			echo "<th scope=\"col\">order_status</th>\n ";
			echo "<td>",$row["order_status"],"</td>\n ";
			echo "</tr>\n";			

			}
		echo "</table>\n ";
		// Frees up the memory, after using the result pointer
		mysqli_free_result($result);
		} // if successful query operation
		
		// close the database connection
		mysqli_close($conn);
	} // if successful database connection
?>

<?php
include 'includes/footer.inc';
?>

</body>
</html>