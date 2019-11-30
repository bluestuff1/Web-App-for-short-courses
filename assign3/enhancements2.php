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
  <link href="styles/responsive.css" rel="stylesheet" media="screen	and (max-width: 1024px)" />
  <script src="scripts/part2.js"></script>
  <script src="scripts/enhancements.js"></script>
  <title>JavaScript Enhancements</title>
</head>
 
<body>
<?php
include 'includes/header.inc';
include 'includes/menu.inc';
?>
	<hr	/>
<section id="enhancements2-section">
<h2 id="enhancements2-heading">Enhancements again</h2>
<p>This is the enhancements2 page. I have included the following enhancements:</p>
<!-- A list of enhancements I used -->
<ol>
<!-- try this after -->
	<li><a href="payment.html">A timer on the payment page.</a> Please refer to enhancements.js for code needed to implement this feature.
		<ul>
			<li>Security reasons</li>
			<li>Timer is displayed on the navigation bar</li>
		</ul>
	</li>
	<li><a href="enquire.html#isDifferentAd">Billing address is different to delivery address on enquire page.</a> Please refer to enhancements.js for code needed to implement this feature.
		<ul>
			<li>If unchecked, assumes the billing address and delivery address is the same and hides the fieldset</li>
			<li>If check, show fieldset and allows user to input a separate delivery address</li>
		</ul>
	</li>
	<li><a href="index.html#autoSlide">Automatic slideshow on index page.</a>Please refer to enhancements.js for code needed to implement this feature.
		<ul>
			<li>It catches the user's eyes.</li>
			<li>Makes the site appear more modern.</li>
		</ul>
	</li>
</ol>
</section>
<br />

<?php
include 'includes/footer.inc';
?>

</body>
</html>