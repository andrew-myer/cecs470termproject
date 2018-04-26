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

	<div class="slideshow">
  		<img class="mySlides w3-animate-left" src="images/slideshow1.jpg" alt="first one">
	  	<img class="mySlides w3-animate-left" src="images/slideshow2.jpg" alt="second 2">
	  	<img class="mySlides w3-animate-left" src="images/slideshow3.jpg" alt="third 3">
	  	<img class="mySlides w3-animate-left" src="images/slideshow4.jpg" alt="fourth 4">
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
	<div class="title_bar">
		<h1>Featured Projects</h1>
	</div>
	<div class="feed">
		<div class="feat_proj">
			<div class="feat_proj_text">
				<a href='#'>Anza Borrega</a>
				<p>blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah </p>
			</div>
			<img src="images/slideshow2.jpg" class="feat_proj_img" alt="anotha one">
		</div>
		<div class="feat_proj">
			<div class="feat_proj_text">
				<a href='#'>Anza Borrega</a>
				<p>blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah </p>
			</div>
			<img src="images/slideshow2.jpg" class="feat_proj_img" alt="anotha one">
		</div>
		<div class="feat_proj">
			<div class="feat_proj_text">
				<a href='#'>Anza Borrega</a>
				<p>blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah </p>
			</div>
			<img src="images/slideshow2.jpg" class="feat_proj_img" alt="anotha one">
		</div>
		<div class="feat_proj">
			<div class="feat_proj_text">
				<a href='#'>Anza Borrega</a>
				<p>blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah </p>
			</div>
			<img src="images/slideshow2.jpg" class="feat_proj_img" alt="anotha one">
		</div>
	</div>
	<div class="footer">
		<p>any questions please contact me at <a href='mailto:levithompsonmedia@gmail.com'>levithompsonmedia@gmail.com</a></p>
	</div>
	
</body>

</html>
