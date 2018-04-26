#!/usr/local/php5/bin/php-cgi
<?php
?>
<!DOCTYPE html>
<html lang ="en">
<head>
	<meta charset="utf-8">
	<title>LeviThompsonMedia</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="index_style.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body>
	<header>
		<div id="top_bar">
			<img src="images/logo.png" alt="logo" class="logo">
			<nav>
				<ul>
					<li><a href='index.php'>Home</a><li>
					<li><a href='#'>About </a><li>
					<li><a href='#'>Projects</a><li>
					<li><a href='#'>Contact</a><li>
				</ul>
			</nav>
		</div>
	</header>
	<!--<slider>
		<slide><p>slide 1</p></slide>
		<slide><p>slide 2</p></slide>
		<slide><p>slide 3</p></slide>
		<slide><p>slide 4</p></slide>
	</slider>-->
	<div style="width:100%;height: 1000px;overflow: hidden;">
  		<img class="mySlides w3-animate-left" src="images/slideshow1.jpg" alt="first one" style="width:100%">
	  	<img class="mySlides w3-animate-left" src="images/slideshow2.jpg" alt="second 2" style="width:100%">
	  	<img class="mySlides w3-animate-left" src="images/slideshow3.jpg" alt="third 3" style="width:100%">
	  	<img class="mySlides w3-animate-left" src="images/slideshow4.jpg" alt="fourth 4" style="width:100%">
	</div>

	<script>
	var myIndex = 0;
	carousel();

	function carousel() {
		var i;
		var x = document.getElementsByClassName("mySlides");
		for (i = 0; i < x.length; i++) {
		  x[i].style.display = "none";  
		}
		myIndex++;
		if (myIndex > x.length) {myIndex = 1}    
		x[myIndex-1].style.display = "block";  
		setTimeout(carousel, 2500);    
	}
	</script>
	
</body>

</html>
