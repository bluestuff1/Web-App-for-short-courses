<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="description" content="Assignment Part 1" />
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
  <title>Home</title>
</head>

<body>

<?php
include 'includes/header.inc';
include 'includes/menu.inc';
?>
<h1 class="headings">Home</h1>
<article id="home-content">
	<h2 id="home-heading">Our plan for you</h2>
		<!-- A quick description about the institute -->
		<!-- 2025 Strategic Plan | Strategies and initiatives | Swinburne University | Melbourne, viewed 28 August, 2018, <https://www.swinburne.edu.au/about/strategy-initiatives/2025-strategic-plan/>. -->
		<p>More than 100 years ago Klim's Institute opened its doors with a simple premise in mind: to provide education to a section of society otherwise denied further education. More than a century later, we continue to persevere in our commitment to not only provide, but also transform education through strong industry engagement, social inclusion, a desire to innovate and, above all, a determination to create positive change.</p>
		<!-- A graphic of a sign -->
		<!-- Short Courses | Dipo Tepede, viewed 24 August, 2018, <http://dipotepede.org/wp-content/uploads/2017/01/short-course.jpg>. -->
		
	<!-- enhancement - automatic slideshow -->
	<!-- Anon 2018, W3.CSS Slideshow, viewed 25 September, 2018, <https://www.w3schools.com/w3css/w3css_slideshow.asp>. -->
	
	<div id="autoSlide">
			<!-- Anon 2018, Free stock photo of alphabet, class, conceptual, viewed 25 September, 2018, <https://www.pexels.com/photo/alphabet-class-conceptual-cube-301926/>. -->
			<img class="mySlides" src="images/lightbulb1.jpeg" alt="lightbulb"/>
			<!-- Anon 2018, Free stock photo of alphabet, class, conceptual, viewed 25 September, 2018, <https://www.pexels.com/photo/alphabet-class-conceptual-cube-301926/>. -->
			<img class="mySlides" src="images/teach1.jpeg" alt="teaching"/>
			<!-- Anon 2018, Free stock photo of alphabet, class, conceptual, viewed 25 September, 2018, <https://www.pexels.com/photo/alphabet-class-conceptual-cube-301926/>. -->
			<img class="mySlides" src="images/writing1.jpeg" alt="man writing"/>
	</div>
</article>

<?php
include 'includes/footer.inc';
?>

</body>
</html>