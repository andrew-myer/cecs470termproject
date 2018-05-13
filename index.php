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



$result2 = mysql_query("SELECT img_path from images group by prj_name",$connect);
$img_path = array();
while ($row = mysql_fetch_array($result2)) {
    array_push($img_path, $row["img_path"]);
}
$result3 = mysql_query("SELECT prj_name from images group by prj_name",$connect);
$prj_name = array();
while ($row = mysql_fetch_array($result3)) {
    array_push($prj_name, $row["prj_name"]);
}
$result4 = mysql_query("SELECT prj_description from projects group by prj_name",$connect);
$prj_desc = array();
while ($row = mysql_fetch_array($result4)) {
    array_push($prj_desc, $row["prj_description"]);
}

$connect = null;
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
    <?php for($i=0;$i<4;$i++):?>
		<div class="feat_proj">
			<div class="feat_proj_text">
				<a href='anza_borrega.php?id=<?php echo $prj_name[$i];?>'><?php echo $prj_name[$i];?></a>
				<p><?php echo $prj_desc[$i];?></p>
			</div>
			<img src="<?php echo $img_path[$i]; ?>" class="feat_proj_img" alt="anotha one">
		</div>
<?php endfor; ?>
	</div>
	<div class="footer">
		<p>any questions please contact me at <a href='mailto:levithompsonmedia@gmail.com'>levithompsonmedia@gmail.com</a></p>
	</div>

</body>

</html>
