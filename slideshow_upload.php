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

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	mysql_query("DELETE FROM Slideshow",$connect);

	$sql = "Insert into Slideshow (Name, Path) VALUES (?,?)";
	$statement = $pdo->prepare($sql);
	$statement->bindValue(1, $_POST['name1']);
	$statement->bindValue(2, $_FILES["image1"]["name"]);
	$statement->execute();

	$sql2 = "Insert into Slideshow (Name, Path) VALUES(?,?)";
	$statement2 = $pdo->prepare($sql2);
	$statement2->bindValue(1, $_POST['name2']);
	$statement2->bindValue(2, $_FILES["image2"]["name"]);
	$statement2->execute();

	$sql3 = "Insert into Slideshow (Name, Path) VALUES(?,?)";
	$statement3 = $pdo->prepare($sql3);
	$statement3->bindValue(1, $_POST['name3']);
	$statement3->bindValue(2, $_FILES["image3"]["name"]);
	$statement3->execute();

	$sql4 = "Insert into Slideshow (Name, Path) VALUES(?,?)";
	$statement4 = $pdo->prepare($sql4);
	$statement4->bindValue(1, $_POST['name4']);
	$statement3->bindValue(2, $_FILES["image4"]["name"]);
	$statement3->execute();

	image2Folder("image1");
	image2Folder("image2");
	image2Folder("image3");
	image2Folder("image4");
}

function image2Folder($fileName)
{
	$target_dir = "images/";
	$target_file = $target_dir . basename($_FILES["$fileName"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"]))
	{
		$check = getimagesize($_FILES["$fileName"]["tmp_name"]);
		if($check !== false)
		{
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
		}
		else
		{
				echo "File is not an image.";
				$uploadOk = 0;
		}
	}
	// Check if file already exists
if (file_exists($target_file)) {
		echo "Sorry, file already exists.";
		$uploadOk = 0;
}
// Check file size
if ($_FILES["$fileName"]["size"] > 5000000) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType != "PNG" ) {
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
		if (move_uploaded_file($_FILES["$fileName"]["tmp_name"], $target_file)) {
				echo "The file ". basename( $_FILES["$fileName"]["name"]). " has been uploaded.";
		} else {
				echo "Sorry, there was an error uploading your file.";
		}
}
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
					<li><a href='login/login-home.php'>Dashboard</a><li>
				</ul>
			</nav>
		</div>
	</header>
	<div class="title_bar">
		<h1>Upload Project</h1>
	</div>
	<div class="feed">
		<div class="feat_proj">
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return subCheck()" enctype="multipart/form-data">
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
    			<input type="text" name="name3" class="required hilightable" id="name3"><br><br>

					<label for="image4">Select Fourth Slideshow Image</label>
					<input type="file" name="image4" id="image4" class="required hilightable"><br>
					<label for="name4">name of fourth image:</label><br>
	    			<input type="text" name="name4" class="required hilightable" id="name4">
				<br><br>
				<button type="reset" name="reset">reset</button>
				<button class="submitButton" type="submit" name="submit" value="submit">submit</button>
			</form>
		</div>
	</div>

	<div class="footer">
		<p>any questions please contact me at <a href='mailto:levithompsonmedia@gmail.com'>levithompsonmedia@gmail.com</a></p>
	</div>

</body>

</html>
