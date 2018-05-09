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

<h2>You have logged out</h2>
<p>
<a href='login.php'>Login Again</a>
</p>

</body>
</html>