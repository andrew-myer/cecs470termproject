#!/usr/local/php5/bin/php-cgi
<?php
$imageFolder = 'images/';
$imageTypes = '{*.jpg,*.JPG,*.jpeg,*.JPEG,*.png,*.PNG,*.gif,*.GIF}';
$images = glob($imageFolder . $imageTypes, GLOB_BRACE);
$textFolder='./';
$textTypes='{*.txt,*.text}';
$text=glob($textFolder . $textTypes, GLOB_BRACE);
$file = file_get_contents("$text[0]");
?>
<!DOCTYPE html>
<html lang ="en">
<head>
	<meta charset="utf-8">
	<title>LeviThompsonMedia</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="project_style.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body>
	<header>
		<div id="top_bar">
			<img src="images/logo.png" alt="logo" class="logo">
			<nav>
				<ul>
					<li><a href='index.php'>Home</a><li>
					<li><a href='about.php'>About </a><li>
					<li><a href='#'>Projects</a><li>
					<li><a href='#'>Contact</a><li>
				</ul>
			</nav>
		</div>
	</header>
	<div class="title_bar">
		<h1> Anza Borrega</h1>
	</div>

	<img src="<?php echo $images[0] ?>" class="feat_pic">
	<div class="feed">
		
		<div class="feat_proj">
			<p><?php echo $file?></p>
		</div>
		<div class="feat_proj">
			<?php
				foreach($images as $image){
					echo "<div class=\"other_pics\"><img src=\"$image\" class=\"feat_pic\"></div>";
				}
			?>
			<!--<div class="other_pics"><img src="images/slideshow1.jpg" class="feat_pic"></div>
			<div class="other_pics"><img src="images/slideshow1.jpg" class="feat_pic"></div>
			<div class="other_pics"><img src="images/slideshow1.jpg" class="feat_pic"></div>
			<div class="other_pics"><img src="images/slideshow1.jpg" class="feat_pic"></div>
			<div class="other_pics"><img src="images/slideshow1.jpg" class="feat_pic"></div>
			<div class="other_pics"><img src="images/slideshow1.jpg" class="feat_pic"></div>
			<div class="other_pics"><img src="images/slideshow1.jpg" class="feat_pic"></div>
			<div class="other_pics"><img src="images/slideshow1.jpg" class="feat_pic"></div>
			<div class="other_pics"><img src="images/slideshow1.jpg" class="feat_pic"></div>-->
		</div>
	</div>
	<div class="footer">
		<p>any questions please contact me at <a href='mailto:levithompsonmedia@gmail.com'>levithompsonmedia@gmail.com</a></p>
	</div>
	
</body>

</html>
