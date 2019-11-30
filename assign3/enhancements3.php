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
  <title>PHP Enhancements</title>
</head>

<body>
<?php
include 'includes/header.inc';
include 'includes/menu.inc';
?>

<hr	/>
<section id="enhancements3-section">
<h2 id="enhancements3-heading">Enhancements</h2>
<p>This is the enhancements3 page. I have included the following enhancements:</p>
<ol>
	<li><a href="manager.php">Show the last logged in timestamp.</a> Please refer to enhancements.js for code needed to implement this feature.
		<ul>
			<li>Security reasons</li>
			<li>If the last login date was on date you didn't log in, you know that unauthorised personnel has accessed it.</li>
			<li>Indicates that a password should be set or changed</li>
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