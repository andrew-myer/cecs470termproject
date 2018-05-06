#!/usr/local/php5/bin/php-cgi
<?php
$dbname = 'cecs470sec01og06';
$dbuser = 'cecs470o33';
$dbpass = 'ooz4qu';
$dbhost = 'cecs-db01.coe.csulb.edu';
$connect = mysql_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
mysql_select_db($dbname) or die("Could not open the db '$dbname'");
$test_query = "SHOW TABLES FROM $dbname";
$result = mysql_query($test_query);
$tblCnt = 0;
while($tbl = mysql_fetch_array($result)) {
  $tblCnt++;
  #echo $tbl[0]."<br />\n";
}
if (!$tblCnt) {
  echo "There are no tables<br />\n";
} else {
  echo "There are $tblCnt tables<br />\n";
}
?>
<!DOCTYPE html>
<html lang ="en">
<head>
	<meta charset="utf-8">
	<title>LeviThompsonMedia</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="proj_upload_style.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<script src="js/proj_upload.js"></script>
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
		<h1>Upload Project</h1>
	</div>
	<div class="feed">
		<div class="feat_proj">
			<form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return subCheck()">
				<label for="image1">Select First Slideshow Image</label>
				<input type="file" name="image1" id="image1" class="required hilightable"><br>
				<label for="image2">Select Second Slideshow Image</label>
				<input type="file" name="image2" id="image2" class="required hilightable"><br>
				<label for="image3">Select Third Slideshow Image</label>
				<input type="file" name="image3" id="image3" class="required hilightable"><br>
				<br><br>
				<button type="reset" name="reset">reset</button>
				<button class="submitButton" type="submit" name="submit">submit</button>
			</form>
		</div>
	</div>
	
	<div class="footer">
		<p>any questions please contact me at <a href='mailto:levithompsonmedia@gmail.com'>levithompsonmedia@gmail.com</a></p>
	</div>
	
</body>

</html>
