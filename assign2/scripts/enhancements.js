/**
*	Author: Klim Huynh 101634015
*	Target: enquire.html and payment.html
*	Purpose: This file is enhancements
*	Created: 21/09/2018
*	Last updated: 26/09/2018
*	Credits:
*/

"use strict";	//prevents creation of global variables in functions
// enhancement 1 - timer so user has a limited time to complete payment
// Anon 2018, JavaScript Timing Events, viewed 25 September, 2018, <https://www.w3schools.com/Js/js_timing.asp>.
function startTimer() {
	alert("Everything will reset in 10 minutes");
	var seconds_left = 600; //measured in seconds (10 minutes * 60 seconds)

	var interval = setInterval(function() {
	var minutes = parseInt(seconds_left/60);
	var seconds = parseInt(seconds_left%60);
	
		seconds_left = seconds_left - 1;
		document.getElementById('timer').innerHTML = minutes+":"+seconds;
		if (seconds_left <= 0)
		{
		   document.getElementById('timer').innerHTML = "Resetting!";
		   clearInterval(interval);
		}
	}, 1000); //calls function() every 1 second, changing the timer displayed
	
	setTimeout(cancelBooking, 600000); //calls the cancelBooking function from part2.js after 10 minutes is up
}

// enhancement 2 - billing address different from delivery address
// Anon 2018, How To Display Text when a Checkbox is Checked, viewed 25 September, 2018, <https://www.w3schools.com/howto/howto_js_display_checkbox_text.asp>.

function isDifferent() {
	var street = document.getElementById("street").value
	var suburb = document.getElementById("suburb").value
	var state = document.getElementById("state").value 
	var postcode = document.getElementById("postcode").value
	var delStreet = document.getElementById("delStreet")
	var delSuburb = document.getElementById("delSuburb")
	var delState = document.getElementById("delState")
	var delPostcode = document.getElementById("delPostcode")
  // Get the checkbox
	var isDifferentAd = document.getElementById("isDifferentAd");
  // Get the fieldset
	var delAddress = document.getElementById("delAddress");
  // If the checkbox is checked, display the output text
	if (isDifferentAd.checked == true){ 
	delAddress.style.display = "block";	// displays the fieldset when the checkbox is checked
	delStreet.value = "";
	delSuburb.value = "";
	delState.value = "";
	delPostcode.value = "";
	} 
	else {
	delAddress.style.display = "none";	// hides the fieldset when the checkbox is unchecked
	delStreet.value = street;			
	delSuburb.value = suburb;
	delState.value = state;
	delPostcode.value = postcode;
	}
}

// validates the delivery address 
function checkPostcode2(delState,delPostcode) {
	var errMsg = "";
	var state = delState;
	var postcode = delPostcode;
	switch(state)	{
		case "vic":
			if (!postcode.match(/^[3,8][0-9]{3}$/)) {
				errMsg = "The delivery post code should match with the state " + state.toUpperCase() + "\n";
			}
			break;
		case "nsw":
			if (!postcode.match(/^[1,2][0-9]{3}$/)) {
				errMsg = "The delivery post code should match with the state " + state.toUpperCase() + "\n";
			}
			break;
		case "qld":
			if (!postcode.match(/^[4,9][0-9]{3}$/)) {
				errMsg = "The delivery post code should match with the state " + state.toUpperCase() + "\n";
			}
			break;
		case "nt":
			if (!postcode.match(/^[0][0-9]{3}$/)) {
				errMsg = "The delivery post code should match with the state " + state.toUpperCase() + "\n";
			}
			break;
		case "wa":
			if (!postcode.match(/^[6][0-9]{3}$/)) {
				errMsg = "The delivery post code should match with the state " + state.toUpperCase() + "\n";
			}
		break;
		case "sa":
			if (!postcode.match(/^[5][0-9]{3}$/)) {
				errMsg = "The delivery post code should match with the state " + state.toUpperCase() + "\n";
			}
			break;
		case "tas":
			if (!postcode.match(/^[7][0-9]{3}$/)) {
				errMsg = "The delivery post code should match with the state " + state.toUpperCase() + "\n";
			}
		break;
		case "act":
			if (!postcode.match(/^[0][0-9]{3}$/)) {
				errMsg = "The delivery post code should match with the state " + state.toUpperCase() + "\n";
			}
			break;
		default:
			errMsg = "Please select a billing state and postcode.\n";
	}
		return errMsg;
}

// enhancement 3 - automatic slideshow
// Anon 2018, W3.CSS Slideshow, viewed 25 September, 2018, <https://www.w3schools.com/w3css/w3css_slideshow.asp>.
function slideshow() {
var myIndex = 0;
carousel();

	function carousel() {
		var i;
		var mySlides = document.getElementsByClassName("mySlides");
		for (i = 0; i < mySlides.length; i++) {
		   mySlides[i].style.display = "none";  
		}
		myIndex++;
		if (myIndex > mySlides.length) {myIndex = 1}    
		mySlides[myIndex-1].style.display = "block";  
		setTimeout(carousel, 2000); // Change image every 2 seconds
	}
}