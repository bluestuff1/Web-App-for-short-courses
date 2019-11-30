/**
*	Author: Klim Huynh 101634015
*	Target: enquire.html and payment.html
*	Purpose: This file is for validating, loading data from session storage and submit to server.
*	Created: 21/09/2018
*	Last updated: 26/09/2018
*	Credits:
*/

"use strict";	//prevents creation of global variables in functions

function cancelBooking()	{
	alert("Everything will now reset");
	window.location = "enquire.html";
	clearSession();
}

function clearSession() {
	sessionStorage.clear();
}

function checkPostcode(state,postcode) {
	var errMsg = "";
	switch(state)	{
		case "vic":
			if (!postcode.match(/^[3,8][0-9]{3}$/)) {
				errMsg = "The billing post code should match with the state " + state.toUpperCase() + "\n";
			}
			break;
		case "nsw":
			if (!postcode.match(/^[1,2][0-9]{3}$/)) {
				errMsg = "The billing post code should match with the state " + state.toUpperCase() + "\n";
			}
			break;
		case "qld":
			if (!postcode.match(/^[4,9][0-9]{3}$/)) {
				errMsg = "The billing post code should match with the state " + state.toUpperCase() + "\n";
			}
			break;
		case "nt":
			if (!postcode.match(/^[0][0-9]{3}$/)) {
				errMsg = "The billing post code should match with the state " + state.toUpperCase() + "\n";
			}
			break;
		case "wa":
			if (!postcode.match(/^[6][0-9]{3}$/)) {
				errMsg = "The billing post code should match with the state " + state.toUpperCase() + "\n";
			}
		break;
		case "sa":
			if (!postcode.match(/^[5][0-9]{3}$/)) {
				errMsg = "The billing post code should match with the state " + state.toUpperCase() + "\n";
			}
			break;
		case "tas":
			if (!postcode.match(/^[7][0-9]{3}$/)) {
				errMsg = "The billing post code should match with the state " + state.toUpperCase() + "\n";
			}
		break;
		case "act":
			if (!postcode.match(/^[0][0-9]{3}$/)) {
				errMsg = "The billing post code should match with the state " + state.toUpperCase() + "\n";
			}
			break;
		default:
			errMsg = "Please select a billing state and postcode.\n";
	}
		return errMsg;
}

function checkCard(cardType, cardNumber, cardExpiry, cardVerify) {
		var errMsg = ""; 
		var nowDate = new Date();
		var nowMonth = nowDate.getMonth() + 1;
		var nowYear = nowDate.getFullYear();
		var cardMonth = parseInt(cardExpiry.slice(0,2));
		var cardYear = parseInt(cardExpiry.slice(3,6)) + 2000;
		
		switch(cardType) {
			case "visa":
				if (!cardNumber.match(/^[4][0-9]{15}$/)) {
					errMsg += "You have entered an invalid card number.\n";	// Visa cards must have 16 digits and start with a 4.
				}
				if (!cardVerify.match(/^[0-9]{3}$/)) {
					errMsg += "You have entered an invalid CVV.\n"; // Visa CVV has 3 digits
				}
				break;
			case "mastercard":
				if (!cardNumber.match(/^5[1-5][0-9]{14}$/)) {
					errMsg += "You have entered an invalid card number.\n";	// Mastercards must have 16 digits and start with digits 51 through 55.
				}
				if (!cardVerify.match(/^[0-9]{3}$/)) {
					errMsg += "You have entered an invalid CVV.\n"; // Mastercards CVV has 3 digits.
				}
				break;
			case "amex":
				if (!cardNumber.match(/^3[47][0-9]{13}$/)) {
					errMsg += "You have entered an invalid card number.\n";	// American Express has 15 digits and start with 34 or 37.
				}
				if (!cardVerify.match(/^[0-9]{4}$/)) {
					errMsg += "You have entered an invalid CVV.\n"; //	AmEx CVV has 4 digits.
				}
				break;
			default:
				errMsg += "Please select a card type and enter the number.\n";
		}
			if (cardYear < nowYear || (cardYear == nowYear && cardMonth < nowMonth)) {
				errMsg += "Your card has expired.\n";
				}
			return errMsg;
}

function getPrefer()	{
	//	initialise variable in case does not get reinitialised properly
	var preferContact = "Unknown";
	
	//	get an array of all input elements inside the fieldset element with id="prefer"
	var preferArray = document.getElementById("prefer").getElementsByTagName("input");
	
		for (var i = 0; i < preferArray.length; i++)	{
			if (preferArray[i].checked)	//	test if radio button is selected
			preferContact = preferArray[i].value; //	assign the value attributes
		}
		return preferContact;
}

function validate()	{
	//	initialize local variables
	var errMsg = "";		//	stores the error mesages
	var result = true;		//	assumes no errors
	// enquire.html
	var studentId = document.getElementById("studentId").value
	var firstName = document.getElementById("firstName").value
	var lastName = document.getElementById("lastName").value
	var emailAd = document.getElementById("emailAd").value
	var street = document.getElementById("street").value
	var suburb = document.getElementById("suburb").value
	var state = document.getElementById("state").value 
	var postcode = document.getElementById("postcode").value
	
	var delStreet = document.getElementById("delStreet").value
	var delSuburb = document.getElementById("delSuburb").value
	var delState = document.getElementById("delState").value
	var delPostcode = document.getElementById("delPostcode").value
	var telephone = document.getElementById("telephone").value
	var products = document.getElementById("products").value
	var quantity = document.getElementById("quantity").value
	var general = document.getElementById("general").checked
	var fees = document.getElementById("fees").checked
	var online = document.getElementById("online").checked
	var working = document.getElementById("working").checked
	var comment = document.getElementById("comment").value
	var prefer = getPrefer();
	
	if (products == "none") {
		errMsg += "You must select a product.\n";
		result = false;
	}	
	
	if(!(general || fees || online || working)) {
		errMsg += "You must select at least one feature.\n";
		result = false;
	}

	var tempMsg = checkPostcode(state,postcode);
	if (tempMsg != "")	{
		errMsg += tempMsg;
		result = false;
	}
	
	var tempMsg2 = checkPostcode2(delState,delPostcode);
	if (tempMsg2 != "")	{
		errMsg += tempMsg2;
		result = false;
	}
	
	if(result)	{
		storeBooking(studentId, firstName, lastName, emailAd, street, suburb, state, postcode, delStreet, delSuburb, delState, delPostcode, telephone, prefer, products, quantity, general, fees, online, working, comment)
	}
	
	if (errMsg !="")	{	// only display message box if there is something to show
		alert(errMsg);
	}
	
	return result;		//	if false the information will not be sent to the server
}

function validate2 () {
	var errMsg = ""
	var result = true;
	// payment.html
	var cardType = document.getElementById("cardType").value
	var cardName = document.getElementById("cardName").value
	var cardNumber = document.getElementById("cardNumber").value
	var cardExpiry = document.getElementById("cardExpiry").value
	var cardVerify = document.getElementById("cardVerify").value
	
	var tempMsg3 = checkCard(cardType, cardNumber, cardExpiry, cardVerify);
	if (tempMsg3 != "")	{
		errMsg += tempMsg3;
		result = false;
	}
	//	get variables from form and check rules here
	//	if something is wrong set result = false, and concatenate error message
	
	if (errMsg !="")	{	// only display message box if there is something to show
		alert(errMsg);
	}
	
	return result;		//	if false the information will not be sent to the server
}

function storeBooking(studentId, firstName, lastName, emailAd, street, suburb, state, postcode, delStreet, delSuburb, delState, delPostcode, telephone, prefer, products, quantity, general, fees, online, working, comment) {
	//get values and assign them to a sessionStorage attribute.
	//we use the same name for the attribute and the element id to avoid confusion
	var features = "";
	if(general)	features = "general";
	if(fees)	features += " fees";
	if(online)	features += " online";
	if(working)	features += " working";
	
	sessionStorage.studentId = studentId	
	sessionStorage.firstName = firstName;
	sessionStorage.lastName = lastName;
	sessionStorage.emailAd = emailAd;
	sessionStorage.street = street;
	sessionStorage.suburb = suburb;
	sessionStorage.state = state;
	sessionStorage.postcode = postcode;
	sessionStorage.delStreet = delStreet;
	sessionStorage.delSuburb = delSuburb;
	sessionStorage.delState = delState;
	sessionStorage.delPostcode = delPostcode;
	sessionStorage.telephone = telephone;
	sessionStorage.products = products;
	sessionStorage.quantity = quantity;
	sessionStorage.features = features;
	sessionStorage.comment = comment;
	sessionStorage.prefer = prefer;
}

function calcCost(products, quantity)	{
	var cost = 0;
	switch(products) {
		case("Bookkeeping - Level 1"):
			cost += 400;
			break;
		case("Plasterboard Installation"):
			cost += 450;
			break;
		case("Bartending - Level 3"):
			cost += 900;
			break;
	}
	return cost * quantity;
}

function getBooking(){
	var cost = 0;
	if(sessionStorage.firstName!= undefined){    //if sessionStorage for username is not empty
		//confirmation text
		document.getElementById("confirm_id").textContent = sessionStorage.studentId;
		document.getElementById("confirm_fname").textContent = sessionStorage.firstName;
		document.getElementById("confirm_lname").textContent = sessionStorage.lastName;
		document.getElementById("confirm_email").textContent = sessionStorage.emailAd;
		document.getElementById("confirm_street").textContent = sessionStorage.street;
		document.getElementById("confirm_suburb").textContent = sessionStorage.suburb;
		document.getElementById("confirm_state").textContent = sessionStorage.state;
		document.getElementById("confirm_postcode").textContent = sessionStorage.postcode;
		document.getElementById("confirm_delStreet").textContent = sessionStorage.delStreet;
		document.getElementById("confirm_delSuburb").textContent = sessionStorage.delSuburb;
		document.getElementById("confirm_delState").textContent = sessionStorage.delState;
		document.getElementById("confirm_delPostcode").textContent = sessionStorage.delPostcode;
		document.getElementById("confirm_telephone").textContent = sessionStorage.telephone;
		document.getElementById("confirm_prefer").textContent = sessionStorage.prefer;
		document.getElementById("confirm_products").textContent = sessionStorage.products;
		document.getElementById("confirm_quantity").textContent = sessionStorage.quantity;
		document.getElementById("confirm_features").textContent = sessionStorage.features;
		document.getElementById("confirm_comment").textContent = sessionStorage.comment;
		cost = calcCost(sessionStorage.products, sessionStorage.quantity);
		document.getElementById("confirm_cost").textContent = cost;
		// fill hidden fields
		document.getElementById("studentId").value = sessionStorage.studentId;
		document.getElementById("firstName").value = sessionStorage.firstName;
		document.getElementById("lastName").value = sessionStorage.lastName;
		document.getElementById("emailAd").value = sessionStorage.emailAd;
		document.getElementById("street").value = sessionStorage.street;
		document.getElementById("suburb").value = sessionStorage.suburb;
		document.getElementById("state").value = sessionStorage.state;
		document.getElementById("postcode").value = sessionStorage.postcode;
		document.getElementById("delStreet").value = sessionStorage.delStreet;
		document.getElementById("delSuburb").value = sessionStorage.delSuburb;
		document.getElementById("delState").value = sessionStorage.delState;
		document.getElementById("delPostcode").value = sessionStorage.delPostcode;
		document.getElementById("telephone").value = sessionStorage.telephone;
		document.getElementById("prefer").value = sessionStorage.prefer;
		document.getElementById("products").value = sessionStorage.products;
		document.getElementById("quantity").value = sessionStorage.quantity;
		document.getElementById("features").value = sessionStorage.features;
		document.getElementById("comment").value = sessionStorage.comment;
		document.getElementById("cost").value = cost;
	}
}

function init () {
	//get ref to the HTML element
	var enquireForm = document.getElementById("enquireform"); 
	var bookForm = document.getElementById("bookform");
	var isDifferentAd = document.getElementById("isDifferentAd")
	var autoSlide = document.getElementById("autoSlide");
    var cancelButton = document.getElementById("cancelButton");
	
	if (enquireForm != null) {	
		isDifferentAd.onclick = isDifferent;
		enquireForm.onsubmit = validate;	
	}
	
	if (bookForm != null) {
		getBooking();
		startTimer();
		bookForm.onsubmit = validate2;          /* assigns functions to corresponding events */
		cancelButton.onclick = cancelBooking;
	}
	
	if (autoSlide != null) {
		slideshow();
	}
}

window.onload = init;