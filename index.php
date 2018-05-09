#!/usr/local/php5/bin/php-cgi
<?php
$dbname = 'cecs470sec01og06';
$dbuser = 'cecs470o33';
$dbpass = 'ooz4qu';
$dbhost = 'cecs-db01.coe.csulb.edu';
$connect = mysql_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
mysql_select_db($dbname) or die("Could not open the db '$dbname'");
$connString = "mysql:host=cecs-db01.coe.csulb.edu;dbname=cecs470sec01og06";
$pdo = new PDO($connString,$dbuser,$dbpass);

$result = mysql_query("SELECT Path FROM Slideshow",$connect);
$slideshow = array();
while ($row = mysql_fetch_array($result)) {
    array_push($slideshow, $row["Path"]);
}

$result1 = mysql_query("SELECT Name FROM Slideshow",$connect);
$name = array();
while ($row = mysql_fetch_array($result1)) {
    array_push($name, $row["Name"]);
}

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
			<img src="images/logo.png" alt="Levi Thompson Media" class="logo">
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

	<div class="slideshow">
  		<img class="mySlides w3-animate-left" src="images/<?php echo $slideshow[0]; ?>" alt="<?php echo $name[0]; ?>">
	  	<img class="mySlides w3-animate-left" src="images/<?php echo $slideshow[1]; ?>" alt="<?php echo $name[1]; ?>">
	  	<img class="mySlides w3-animate-left" src="images/<?php echo $slideshow[2]; ?>" alt="<?php echo $name[2]; ?>">
	  	<img class="mySlides w3-animate-left" src="images/<?php echo $slideshow[3]; ?>" alt="<?php echo $name[3]; ?>">
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
				<p>Nunc vel sem in sapien mollis congue. Donec maximus velit odio, et condimentum risus aliquet quis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Ut cursus, dui ut cursus dignissim, nibh mauris ultricies magna, quis semper augue enim quis dolor. Fusce efficitur nunc in nibh finibus, eget dictum libero gravida. Donec eu dapibus felis. Donec sit amet bibendum erat, vitae consequat augue. Nam tempor ex risus.</p>
			</div>
			<img src="images/slideshow2.jpg" class="feat_proj_img" alt="anotha one">
		</div>
		<div class="feat_proj">
			<div class="feat_proj_text">
				<a href='#'>Anza Borrega</a>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque malesuada quis magna quis mattis. Ut congue, lectus elementum suscipit laoreet, nibh nisi eleifend diam, sed dictum eros ante a magna. Mauris dignissim, dolor vitae imperdiet imperdiet, nibh odio volutpat est, egestas sollicitudin leo sapien et nunc. Aenean bibendum, diam ut iaculis blandit, dui arcu feugiat massa, varius fringilla nibh est sed lectus. Duis euismod mattis felis, at viverra lacus eleifend et. Aenean vehicula velit nisl, et fringilla nunc molestie sit amet. Phasellus et pulvinar turpis, sed convallis lectus. Pellentesque fermentum dolor ut maximus viverra. Maecenas eu urna elit. Vestibulum egestas quam sed porttitor rhoncus. Nulla ac rhoncus mi.</p>
			</div>
			<img src="images/slideshow2.jpg" class="feat_proj_img" alt="anotha one">
		</div>
		<div class="feat_proj">
			<div class="feat_proj_text">
				<a href='#'>Anza Borrega</a>
				<p>Mauris vel enim consectetur ligula molestie luctus sit amet eget arcu. Integer tempor magna ut felis accumsan, faucibus ultrices tortor faucibus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In et justo ex. Aliquam accumsan nisl nec tempus pellentesque. Nunc ac odio quam. Etiam aliquet magna vitae tortor maximus, non eleifend dui sagittis. Sed pretium in diam ac pulvinar.</p>
			</div>
			<img src="images/slideshow2.jpg" class="feat_proj_img" alt="anotha one">
		</div>
		<div class="feat_proj">
			<div class="feat_proj_text">
				<a href='#'>Anza Borrega</a>
				<p>Pellentesque tristique sed risus sit amet imperdiet. Proin laoreet volutpat sem quis ultricies. Donec vel luctus tellus, a aliquam odio. Vestibulum quis augue in velit tristique efficitur. Maecenas consequat elit sit amet consequat ornare. Maecenas aliquet lectus vel odio hendrerit feugiat. Nam tempus enim sit amet lorem euismod fermentum. Pellentesque sed orci in orci convallis convallis a et augue. Praesent lobortis orci varius, ultricies mi eget, imperdiet magna. Quisque scelerisque, ipsum id consequat semper, eros ipsum volutpat libero, eu vehicula orci eros et dolor. Mauris ac neque eu orci porttitor pretium vel nec justo. Donec eget felis et mi varius ullamcorper. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi fermentum erat arcu, eu elementum mauris tincidunt nec.</p>
			</div>
			<img src="images/slideshow2.jpg" class="feat_proj_img" alt="anotha one">
		</div>
	</div>
	<div class="footer">
		<p>any questions please contact me at <a href='mailto:levithompsonmedia@gmail.com'>levithompsonmedia@gmail.com</a></p>
	</div>

</body>

</html>
