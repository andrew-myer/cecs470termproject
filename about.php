#!/usr/local/php5/bin/php-cgi
<!DOCTYPE html>
<html lang ="en">
<head>
	<meta charset="utf-8">
	<title>LeviThompsonMedia</title>
	<meta name="viewport" content="width=device-width, height=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="about_style.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<script src="about_form.js"></script>
</head>


<body>
		<?php
$fnameErr = $lnameErr = $emailErr = $commentErr = "";
$fname = $lname = $email = $comment = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (empty($_POST["fname"])){
    $fnameErr = "First name is required";
  } else {
    $fname = test_input($_POST["fname"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
      $fnameErr = "Only letters and white space allowed";

$fname="";
    }
$fnameErr = "";
  }


if (empty($_POST["lname"])) {
    $lnameErr = "Last name is required";
  } else {
    $lname = test_input($_POST["lname"]);
    if (!preg_match("/^[a-zA-Z ]*$/", $lname)) {
      $lnameErr = "Only letters and white space allowed";
$lname="";
    }
$lnameErr = "";
  }

if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
$email="";
    }
  }
	if (empty($_POST["comments"])){
	    $commentErr = "A comment is required";
	  } else {
	    $comment = test_input($_POST["comments"]);
	    if (!preg_match("/^[a-zA-Z ]*$/",$comment)) {
	      $commentErr = "Only letters and white space allowed";

	$comment="";
	    }
	$commentErr = "";
	  }
if($commentErr==""&&$emailErr==""&&$lnameErr==""&&$fnameErr=="")
		{
			//Database connection
			    $dbname = 'cecs470sec01og06';
			    $dbuser = 'cecs470o33';
			    $dbpass = 'ooz4qu';
			    $dbhost = 'cecs-db01.coe.csulb.edu';
			    $connect = mysql_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
			    mysql_select_db($dbname) or die("Could not open the db '$dbname'");
			    $connString = "mysql:host=cecs-db01.coe.csulb.edu;dbname=cecs470sec01og06";
			    $pdo = new PDO($connString,$dbuser,$dbpass);
			    // end database connection
			    $sql = "Insert into comments (first_name, last_name, email, comments) VALUES (?,?,?,?)";
				$statement = $pdo->prepare($sql);
				$statement->bindValue(1, $fname);
				$statement->bindValue(2, $lname);
				$statement->bindValue(3, $email);
				$statement->bindValue(4, $comment);
				$statement->execute();
		}
  }
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}



?>
	<header>
		<div id="top_bar">
			<img src="images/logo.png" alt="logo" class="logo">
			<nav>
				<ul>
					<li><a href='index.php'>Home</a><li>
					<li><a href='about.php'>About</a><li>
					<li><a href='proj_main.php'>Projects</a><li>
				</ul>
			</nav>
		</div>
	</header>

		<div class="title_bar">
			<h1>About</h1>
		</div>
		<div class ="feed">
		<div class="author">
							<img src="images/12.jpg" class="feat_proj_img" alt="anotha one">
			<div class="feat_proj_text">
				<h2><strong>Levi Thompson</strong></h2>
				<p>Im an avid photographer and video maker from  Huntington Beach who spends my time at the beach and going on adventures!</p>
			</div>
		</div>

		<div class = "contact">
			<form method="post" action = "/~013032329/termproj/about.php">
			<h3 id="contactme"><u><strong>Get in Touch</strong></u></h3>
			<p>
  			<label for = "abc"><strong>First Name: </strong><span class="error">*<?php echo $fnameErr;?></span></label>
  			<input id= "abc" class= "abc required" type="text" name="fname" maxlength="60"/>
			</p>

			<p>
				<label for = "def"><strong>Last Name: </strong><span class="error">*<?php echo $lnameErr;?></span></label>
				<input id= "def" class="abc required" type="text" name="lname" maxlength="60"/>
			</p>

			<p>
				<label for="email" class="space"> <strong> Email: </strong><span class="error">*<?php echo $emailErr;?></span></label>
				<input id="email" class="abc required" type="email" name="email"/>
			</p>

			<p>
				<label for="comment"> <strong> Comments: </strong><span class="error">*<?php echo $commentErr;?></span></label>
				<textarea id="comment" class="abc required" rows="4" cols="60" name="comments"></textarea>
			</p>
			<input type="submit" value="Submit" onclick="mySubmitFunction()">
			<input type="reset" onclick = "resetpr();" value="Clear">
		</form>
		</div>

		<div class="socialmedia">
			<a href="https://www.google.com/" class="here"><img src="http://www.stickpng.com/assets/images/580b57fcd9996e24bc43c521.png" alt="instagram link" id="img1"></a>

			<a href="https://www.google.com/" class = "here3"><img src="http://www.stickpng.com/assets/images/584ac2d03ac3a570f94a666d.png" alt="facebook link" id="img2"></a>

			<a href="https://www.google.com/" class="here1"><img src="http://backgroundcheckall.com/wp-content/uploads/2017/12/twitter-round-logo-png-transparent-background-7.png" alt="twitter link" id="img3"></a>
		</div>
<br/>
</div>
		<footer class="footer">
			<p>any questions please contact me at <a href='mailto:levithompsonmedia@gmail.com'>levithompsonmedia@gmail.com</a></p>
		</footer>
</body>

</html>
