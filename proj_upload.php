#!/usr/local/php5/bin/php-cgi
<?php
$name1=$name2=$name3=$image1=$image2=$image3="";
$dbname = 'cecs470sec01og06';
$dbuser = 'cecs470o33';
$dbpass = 'ooz4qu';
$dbhost = 'cecs-db01.coe.csulb.edu';
$connect = mysql_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
mysql_select_db($dbname) or die("Could not open the db '$dbname'");
$connString = "mysql:host=cecs-db01.coe.csulb.edu;dbname=cecs470sec01og06";
$pdo = new PDO($connString,$dbuser,$dbpass);

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	echo $_POST['name2'];
	
	mysql_query("Insert into Slideshow (Name) Values ("+$_POST['name2']+")",$connect);
	
	$sql = "Insert into Slideshow (Name) VALUES (:name1)";
	$statement = $pdo->prepare($sql);
	$statement->bindValue(':name1', $_POST['name1']);
	//$statement->bindValue(':image1', $_POST['image1']);
	$statement->execute();
	
	$sql2 = "Insert into Slideshow (Name, Path) VALUES(:name2, :image2)";
	$statement2 = $pdo->prepare($sql2);
	$statement2->bindValue(':name2', $_POST['name2']);
	$statement2->bindValue(':image2', $_POST['image2']);
	$statement2->execute();
	
	$sql3 = "Insert into Slideshow (Name, Path) VALUES(:name3, :image3)";
	$statement3 = $pdo->prepare($sql3);
	$statement3->bindValue(':name3', $_POST['name3']);
	$statement3->bindValue(':image3', $_POST['image3']);
	$statement3->execute();

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
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return subCheck()">
				<label for="image1">Select First Slideshow Image</label>
				<input type="file" name="image1" id="image1" class="required hilightable"><br>
				<label for="name1">name of first image:</label><br>
    			<input type="text" name="name1" class="required hilightable" id="name1"><br><br>
				<label for="image2">Select Second Slideshow Image</label>
				<input type="file" name="image2" id="image2" class="required hilightable"><br>
				<label for="name2">name of second image:</label><br>
    			<input type="text" name="name2" class="required hilightable" id="name2"><br><br>
				<label for="image3">Select Third Slideshow Image</label>
				<input type="file" name="image3" id="image3" class="required hilightable"><br>
				<label for="name3">name of third image:</label><br>
    			<input type="text" name="name3" class="required hilightable" id="name3">
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
