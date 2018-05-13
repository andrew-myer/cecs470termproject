#!/usr/local/php5/bin/php-cgi
<?php
$id=$_GET["id"];
$dbname = 'cecs470sec01og06';
$dbuser = 'cecs470o33';
$dbpass = 'ooz4qu';
$dbhost = 'cecs-db01.coe.csulb.edu';
$connect = mysql_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
mysql_select_db($dbname) or die("Could not open the db '$dbname'");
$connString = "mysql:host=cecs-db01.coe.csulb.edu;dbname=cecs470sec01og06";
$pdo = new PDO($connString,$dbuser,$dbpass);
// end database connection
$result = mysql_query("SELECT img_path FROM images WHERE prj_name='$id'",$connect);
$img_path = array();
while ($row = mysql_fetch_array($result)) {
    array_push($img_path, $row["img_path"]);
}
$result1 = mysql_query("SELECT prj_description from projects WHERE prj_name='$id'",$connect);
$proj_desc = array();
while ($row = mysql_fetch_array($result1)) {
    array_push($proj_desc, $row["prj_description"]);
}
$connect = null;
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
		<h1> <?php echo $id; ?></h1>
	</div>

	<img src="<?php echo $img_path[0] ?>" class="feat_pic">
	<div class="feed">

		<div class="feat_proj">
			<p><?php echo $proj_desc[0]?></p>
		</div>
		<div class="feat_proj">
			<?php
				foreach($img_path as $image){
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
