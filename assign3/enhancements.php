<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="description" content="Assignment Part 1" />
  <meta name="keywords" content="index, klim, institute, short, courses" />
  <meta name="author" content="Klim Huynh"  />
  <!--Viewport set to scale 1.0-->
  <meta name="viewpoint" content="width=device-width, initial-scale=1.0" />
  <!-- Reference to external CSS files -->
  <link href="styles/style.css" rel="stylesheet"/>
   <!--Reference to external responsive CSS file-->
  <link href="styles/responsive.css" rel="stylesheet" media="screen	and (max-width: 1024px)" />
  <script src="scripts/part2.js"></script>
  <script src="scripts/enhancements.js"></script>
  <title>Enhancements</title>
</head>

<body>
<?php
include 'includes/header.inc';
include 'includes/menu.inc';
?>
	<hr	/>
	
<div id="element">

<section id="enhancements-content">
<h2 id="enhancements-heading">ENHANCE! ENHANCE! ENHANCE!</h2>
<p>This is the enhancements page. I have included the following enhancements:</p>
<!-- A list of enhancements I used -->
<ol>
	<li><a href="enhancements.html#elements">CSS animation on this page.</a> Please refer to style.css for code needed to implement this feature (Starts on line 212).
		<ul>
			<li>The animation is meant to draw attention to the page.</li>
			<li>The other pages are static and boring</li>
		</ul>
	</li>
	<li><a href="product.html">Responsive design on all pages.</a> Please refer to responsive.css for code needed to implement this feature.
		<ul>
			<li>Able to view it on an iPad, tablets, etc</li>
			<li>Rearranges itself so it's readable</li>
		</ul>
	</li>
	<li><a href="about.html#my-mail">Flexbox on footers.</a> Please refer to any footer. Please refer to style.css for code needed to implement this feature (Starts on line 18).</li>
</ol>
</section>
</div>

<br />

<?php
include 'includes/footer.inc';
?>

</body>
</html>