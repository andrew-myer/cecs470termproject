#!/usr/local/php5/bin/php-cgi -q
<?PHP
require_once("./include/membersite_config.php");

$fgmembersite->LogOut();
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <title>Login</title>
      <link rel="STYLESHEET" type="text/css" href="style/fg_membersite.css" />
      <script type='text/javascript' src='scripts/gen_validatorv31.js'></script>
</head>
<body>
    
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
    
    
<div id='fg_membersite_content'>
<h2>You have logged out</h2>
<p>
<a href='../login/'>Return to Login</a>
</p>
</div>
    
    <footer class="footer">
			<p>any questions please contact me at <a href='mailto:levithompsonmedia@gmail.com'>levithompsonmedia@gmail.com</a></p>
		</footer>
    
    
</body>
</html>