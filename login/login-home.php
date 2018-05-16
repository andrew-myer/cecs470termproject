#!/usr/local/php5/bin/php-cgi -q
<?PHP
require_once("./include/membersite_config.php");

if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("index.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en-US">
<head>
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <title>Home page</title>
      <link rel="STYLESHEET" type="text/css" href="style/fg_membersite.css">
</head>
    
	<header>
		<div id="top_bar">
			<img src="../images/logo.png" alt="logo" class="logo">
			<nav>
				<ul>
					<li><a href='../index.php'>Home</a><li>
					<li><a href='../about.php'>About</a><li>
					<li><a href='../proj_main.php'>Projects</a><li>
				</ul>
			</nav>
		</div>
	</header>    
    		<div class="title_bar">		</div>    
    
    
    
<body>
<div id='fg_membersite_content'>
<h2>Home Page</h2>
Welcome back <?= $fgmembersite->UserFullName(); ?>!

<p><a href='change-pwd.php'>Change Password</a></p>

<p><a href='../slideshow_upload.php'>Change Slideshow Pictures</a></p>
<br><br><br>
<p><a href='logout.php'>Logout</a></p>
</div>
</body>
</html>
