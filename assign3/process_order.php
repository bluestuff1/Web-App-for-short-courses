<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="description" content="This is used to process booking" />
	<meta name="keywords" content="process, booking" />
	<meta name="author" content="Klim Huynh"  />
  <title>Booking Confirmation</title>
</head>
<body>

<?php
session_start();
?>

<?php
	require_once ("settings.php");	//connection info
	
	function sanitise_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
	// $test = $_SESSION["test"];

	// if($test == false) {
		// header("location: payment.php");
	// }
	// else{
		// $test = true;
	// }
	
	if(!$_POST) {
		header("location: payment.php");
	}
	else {
	$studentId = $_POST["studentId"];
	$studentId = sanitise_input($studentId);

	$firstName = $_POST["firstName"];
	$firstName = sanitise_input($firstName);

	$lastName = $_POST["lastName"];
	$lastName = sanitise_input($lastName);

	$emailAd = $_POST["emailAd"];
	$emailAd = sanitise_input($emailAd);

	$street = $_POST["street"];
	$street = sanitise_input($street);
	
	$suburb = $_POST["suburb"];
	$suburb = sanitise_input($suburb);

	$state = $_POST["state"];
	$state = sanitise_input($state);

	$postcode = $_POST["postcode"];
	$postcode = sanitise_input($postcode);
	
	$delStreet = $_POST["delStreet"];
	$delStreet = sanitise_input($delStreet);

	$delSuburb = $_POST["delSuburb"];
	$delSuburb = sanitise_input($delSuburb);

	$delState = $_POST["delState"];
	$delState = sanitise_input($delState);
	
	$delPostcode = $_POST["delPostcode"];
	$delPostcode = sanitise_input($delPostcode);

	$telephone = $_POST["telephone"];
	$telephone = sanitise_input($telephone);

	$prefer = $_POST["prefer"];
	$prefer = sanitise_input($prefer);

	$products = $_POST["products"];
	$products = sanitise_input($products);
	
	if ($products == 'Bookkeeping - Level 1') {
		$product_cost = 400;
	}
	else if ($products == 'Plasterboard Installation') {
		$product_cost = 450;
	}
	else if ($products == 'Bartending - Level 3') {
		$product_cost = 900;
	}

	$quantity = $_POST["quantity"];
	$quantity = sanitise_input($quantity);

	$features = $_POST["features"];
	$features = sanitise_input($features);

	$comment = $_POST["comment"];
	$comment = sanitise_input($comment);

	$cost = ($product_cost * $quantity);
	$cost = sanitise_input($cost);
	
	$order_cost = ($product_cost * $quantity);
	$order_cost = sanitise_input($order_cost);
	
	$cardType = $_POST["cardType"];
	$cardType = sanitise_input($cardType);

	$cardName = $_POST["cardName"];
	$cardName = sanitise_input($cardName);

	$cardNumber = $_POST["cardNumber"];
	$cardNumber = sanitise_input($cardNumber);

	$cardExpiry = $_POST["cardExpiry"];
	$cardExpiry = sanitise_input($cardExpiry);

	$cardVerify = $_POST["cardVerify"];
	$cardVerify = sanitise_input($cardVerify);

	$nowDate = new \DateTime('now');
	$nowMonth = $nowDate->format('m');
	$nowYear = $nowDate->format('Y');
	
	$cardMonth = substr($cardExpiry,0,2);
	$cardYear = substr($cardExpiry,3,4) + 2000;

	$data = array('studentId' => $studentId, 'firstName' => $firstName, 'lastName' => $lastName, 'emailAd' => $emailAd, 'street' => $street, 'suburb' => $suburb, 'state' => $state, 'postcode' => $postcode, 'delStreet' => $delStreet, 'delSuburb' => $delSuburb, 'delState' => $delState, 'delPostcode' => $delPostcode, 'telephone' => $telephone, 'prefer' => $prefer, 'products' => $products, 'quantity' => $quantity, 'features' => $features, 'comment' => $comment, 'cost' => $cost, 'order_cost' => $order_cost, 'cardType' => $cardType, 'cardName' => $cardName, 'cardNumber' => $cardNumber, 'cardExpiry' => $cardExpiry, 'cardVerify' => $cardVerify);
	$_SESSION["data"] = $data;
	
	$conn = @mysqli_connect($host,
		$user,
		$pwd,
		$sql_db
	);
	
	$errMsg = "";
	
	if (!preg_match("/^(\s*|\d{7,10})$/", $studentId)) {
		$errMsg .= "<p>Student id must have 7-10 numbers</p>";
	}
	
	if ($firstName == "") {
		$errMsg .= "<p>You must enter your first name.</p>";
	}
	else if (!preg_match("/^[a-zA-Z]*$/",$firstName)) {
		$errMsg .= "<p>Only alpha letters allowed in your first name.</p>";
	}

	if ($lastName == "") {
		$errMsg .= "<p>You must enter your last name.</p>";
	}
	else if (!preg_match("/^[a-zA-Z-]+$/",$lastName)) {
		$errMsg .= "<p>Only alpha letters and a hyphen allowed in your last name.</p>";
	}

	if ($emailAd == "") {
		$errMsg .= "<p>You must enter your email address.</p>";
	}
	else if (!preg_match("/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/", $emailAd)) {
		$errMsg .= "<p>Please enter a valid email address</p>";
	}
	
	if ($street == "") {
		$errMsg .= "<p>You must enter a Billing Street Address</p>";
	}
	else if (!preg_match("/^[a-zA-Z0-9 ]{1,40}$/", $street)){
		$errMsg .= "<p>You must enter a valid Billing Street Address</p>";
	}
	
	// validate billing address
	switch($state)	{
	case "vic":
		if (!preg_match("/^[3,8][0-9]{3}$/",$postcode)) {
			$errMsg .= "<p>The billing post code should match with the state $state</p>";
		}
		break;
	case "nsw":
		if (!preg_match("/^[1,2][0-9]{3}$/",$postcode)) {
			$errMsg .= "<p>The billing post code should match with the state $state</p>";
		}
		break;
	case "qld":
		if (!preg_match("/^[4,9][0-9]{3}$/",$postcode)) {
			$errMsg .= "<p>The billing post code should match with the state $state</p>";
		}
		break;
	case "nt":
		if (!preg_match("/^[0][0-9]{3}$/",$postcode)) {
			$errMsg .= "<p>The billing post code should match with the state $state</p>";
		}
		break;
	case "wa":
		if (!preg_match("/^[6][0-9]{3}$/",$postcode)) {
			$errMsg .= "<p>The billing post code should match with the state $state</p>";
		}
	break;
	case "sa":
		if (!preg_match("/^[5][0-9]{3}$/",$postcode)) {
			$errMsg .= "<p>The billing post code should match with the state $state</p>";
		}
		break;
	case "tas":
		if (!preg_match("/^[7][0-9]{3}$/",$postcode)) {
			$errMsg .= "<p>The billing post code should match with the state $state</p>";
		}
	break;
	case "act":
		if (!preg_match("/^[0][0-9]{3}$/",$postcode)) {
			$errMsg .= "<p>The billing post code should match with the state $state</p>";
		}
		break;
	default:
		$errMsg .= "<p>Please select a billing state and postcode</p>";
	}
	
	if ($delStreet == "") {
		$errMsg .= "<p>You must enter a Delivery Street Address</p>";
	}
	else if (!preg_match("/^[a-zA-Z0-9 ]{1,40}$/", $delStreet)){
		$errMsg .= "<p>You must enter a valid Delivery Street Address</p>";
	}
	
	// validate delivery address
	switch($delState)	{
	case "vic":
		if (!preg_match("/^[3,8][0-9]{3}$/",$delPostcode)) {
			$errMsg .= "<p>The delivery post code should match with the state $delState</p>";
		}
		break;
	case "nsw":
		if (!preg_match("/^[1,2][0-9]{3}$/",$delPostcode)) {
			$errMsg .= "<p>The delivery post code should match with the state $delState</p>";
		}
		break;
	case "qld":
		if (!preg_match("/^[4,9][0-9]{3}$/",$delPostcode)) {
			$errMsg .= "<p>The delivery post code should match with the state $delState</p>";
		}
		break;
	case "nt":
		if (!preg_match("/^[0][0-9]{3}$/",$delPostcode)) {
			$errMsg .= "<p>The delivery post code should match with the state $delState</p>";
		}
		break;
	case "wa":
		if (!preg_match("/^[6][0-9]{3}$/",$delPostcode)) {
			$errMsg .= "<p>The delivery post code should match with the state $delState</p>";
		}
	break;
	case "sa":
		if (!preg_match("/^[5][0-9]{3}$/",$delPostcode)) {
			$errMsg .= "<p>The delivery post code should match with the state $delState</p>";
		}
		break;
	case "tas":
		if (!preg_match("/^[7][0-9]{3}$/",$delPostcode)) {
			$errMsg .= "<p>The delivery post code should match with the state $delState</p>";
		}
	break;
	case "act":
		if (!preg_match("/^[0][0-9]{3}$/",$delPostcode)) {
			$errMsg .= "<p>The delivery post code should match with the state $delState</p>";
		}
		break;
	default:
		$errMsg .= "<p>Please select a delivery state and postcode</p>";
	}
	
	if ($telephone == "") {
		$errMsg .= "<p>You must enter your phone number.</p>";
	}
	else if (!preg_match("/\d{10}/",$telephone)) {
		$errMsg .= "<p>Phone numbers must have 10 digits.</p>";
	}

	if ($prefer == "") {
		$errMsg .= "<p>You must select a preferred method of contact</p>";
	}
	
	if ($products == "") {
		$errMsg .= "<p>You must select a product</p>";
	}
	
	if ($quantity == "") {
		$errMsg .= "<p>You must enter the quantity</p>";
	}
	else if (!preg_match("/^(\+)?\d+$/",$quantity)) {
		$errMsg .= "<p>Quantity must be a positive integer</p>";
	}
	
	if ($features == "") {
		$errMsg .= "<p>You must select at least one feature</p>";
	}
	
	// credit card validation
	switch($cardType) {
		case "visa":
			if (!preg_match("/^[4][0-9]{15}$/",$cardNumber)) {
				$errMsg .= "<p>You have entered an invalid card number</p>";	// Visa cards must have 16 digits and start with a 4.
			}
			if (!preg_match("/^[0-9]{3}$/",$cardVerify)) {
				$errMsg .= "<p>You have entered an invalid CVV</p>"; // Visa CVV has 3 digits
			}
			break;
		case "mastercard":
			if (!preg_match("/^5[1-5][0-9]{14}$/",$cardNumber)) {
				$errMsg .= "<p>You have entered an invalid card number</p>";		// Mastercards must have 16 digits and start with digits 51 through 55.
			}
			if (!preg_match("/^[0-9]{3}$/",$cardVerify)) {
				$errMsg .= "<p>You have entered an invalid CVV</p>"; // Mastercards CVV has 3 digits.
			}
			break;
		case "amex":
			if (!preg_match("/^3[47][0-9]{13}$/",$cardNumber)) {
				$errMsg .= "<p>You have entered an invalid card number</p>";	// American Express has 15 digits and start with 34 or 37.
			}
			if (!preg_match("/^[0-9]{4}$/",$cardVerify)) {
				$errMsg .= "<p>You have entered an invalid CVV</p>"; //	AmEx CVV has 4 digits.
			}
			break;
		default:
			$errMsg .= "<p>Please select a card type and enter the number</p>";
	}
	
	if($cardName == "") {
		$errMsg .= "<p>Enter the card name</p>";
	}
	else if(!preg_match("/^[a-zA-Z ]+$/",$cardName)) {
		$errMsg .= "<p>You have entered an invalid card name</p>";
	}
	
	if ($cardMonth == "") {
		$errMsg .= "<p>Enter the card month</p>";
	}
	else if(!preg_match("/^(0[1-9]|1[0-2])$/",$cardMonth)) {
		$errMsg .= "<p>Enter a valid card month</p>";
	}
	
	if ($cardYear == "") {
		$errMsg .= "<p>Enter the card year</p>";
	}
	else if(!preg_match("/^[2][0-9]{3}$/",$cardYear)) {
		$errMsg .= "<p>Enter a valid card year</p>";
	}
	
	if ($cardYear < $nowYear || ($cardYear == $nowYear && $cardMonth < $nowMonth)) {
		$errMsg .= "<p>Your card has expired</p>";
	}
	
	// Checks if connection is successful
	if (!$conn) {
		// Displays an error message
		echo "<p>Database connection failure</p>"; // not in production script
	} else {
		// Upon successful connection
		
		$sql_table="orders";
		
		if ($errMsg != "") {
			$_SESSION["errMsg"] = $errMsg;
			header("location: fix_order.php");
		}
		else {
			// Set up the SQL command to query or add data into the table	
			$query = "insert into $sql_table(studentId, firstName, lastName,emailAd, street, suburb, state, postcode, delStreet, delSuburb, delState, delPostcode, telephone, prefer, products, quantity, features, comment, cost, cardType, cardName, cardNumber, cardExpiry, cardVerify, order_cost) values ('$studentId', '$firstName', '$lastName', '$emailAd', '$street', '$suburb', '$state', '$postcode', '$delStreet', '$delSuburb', '$delState', '$delPostcode', '$telephone', '$prefer', '$products', '$quantity', '$features', '$comment', '$cost', '$cardType', '$cardName', '$cardNumber', '$cardExpiry', '$cardVerify', '$order_cost')";
			header("location: receipt.php");
		}
	
		$result = mysqli_query($conn, $query);
			
		// check that if the database table 'orders' does not exist then create it.
		if(empty($result)) {
			$query = "CREATE TABLE $sql_table(order_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,studentId VARCHAR(10),firstName VARCHAR(25) NOT NULL,lastName VARCHAR(25) NOT NULL,emailAd VARCHAR(255) NOT NULL,street VARCHAR(40) NOT NULL,suburb VARCHAR(20) NOT NULL,state ENUM('vic','nsw','qld','nt','wa','sa','tas') NOT NULL,postcode INT(4) NOT NULL,delStreet VARCHAR(40) NOT NULL,delSuburb VARCHAR(20) NOT NULL,delState ENUM('vic','nsw','qld','nt','wa','sa','tas') NOT NULL,delPostcode INT(4) NOT NULL,telephone INT(10) NOT NULL,prefer ENUM('email','post','phone') NOT NULL,products ENUM('Bookkeeping - Level 1','Plasterboard Installation','Bartending - Level 3') NOT NULL,quantity INT(6) NOT NULL,features VARCHAR(20) NOT NULL,comment VARCHAR(255) NOT NULL,cost FLOAT NOT NULL,cardType ENUM('visa','mastercard','amex') NOT NULL,cardName VARCHAR(40) NOT NULL,cardNumber BIGINT(16) NOT NULL,cardExpiry VARCHAR(5) NOT NULL,cardVerify INT(4) NOT NULL,order_cost FLOAT NOT NULL,order_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,order_status ENUM('PENDING','FULFILLED','PAID','ARCHIVED') NOT NULL DEFAULT 'PENDING')";
			$result = mysqli_query($conn, $query);
			
			$query = "insert into $sql_table(studentId, firstName, lastName,emailAd, street, suburb, state, postcode, delStreet, delSuburb, delState, delPostcode, telephone, prefer, products, quantity, features, comment, cost, cardType, cardName, cardNumber, cardExpiry, cardVerify, order_cost) values ('$studentId', '$firstName', '$lastName', '$emailAd', '$street', '$suburb', '$state', '$postcode', '$delStreet', '$delSuburb', '$delState', '$delPostcode', '$telephone', '$prefer', '$products', '$quantity', '$features', '$comment', '$cost', '$cardType', '$cardName', '$cardNumber', '$cardExpiry', '$cardVerify', '$order_cost')";
			$result = mysqli_query($conn, $query);
			
			echo "<p class=\"ok\">Successfully added Order record</p>";
		} //if successful query operation
		else {
			echo "<p class=\"ok\">Successfully added Order record</p>";
		}
		// close the database connection
		mysqli_close($conn);
	} // if successful database connection		
}
?>
</body>
</html>