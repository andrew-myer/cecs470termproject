#!/usr/local/php5/bin/php-cgi
<?php
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
$result = mysql_query("SELECT img_path from images group by prj_name",$connect);
$img_path = array();
while ($row = mysql_fetch_array($result)) {
    array_push($img_path, $row["img_path"]);
}
$result1 = mysql_query("SELECT prj_name from images group by prj_name",$connect);
$prj_name = array();
while ($row = mysql_fetch_array($result1)) {
    array_push($prj_name, $row["prj_name"]);
}
$connect = null;
?>

<!DOCTYPE html>
<html lang ="en">
<head>
	<meta charset="utf-8">
	<title>LeviThompsonMedia-Project</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="proj_main.css">
    <script src="js/projects.js"></script>
</head>

<body>
	<header>
		<div id="top_bar">
			<img src="images/logo.png" alt="frontlogo" class="logo">
			<nav>
				<ul>
					<li><a href='index.php'>Home</a><li>
					<li><a href='about.php'>About </a><li>
					<li><a href='proj_main.php'>Projects</a><li>
				</ul>
			</nav>
		</div>
    </header>
    <main>
        <h1>Projects</h1>
        <table>
        <?php foreach($prj_name as $key=>$value): ?>
        <?php if($key%2 == 0){echo "<tr>";}; ?>
        <td>
         <div class="container">
                <img src="<?php echo $img_path[$key]; ?>" alt="<?php echo $value; ?>" class="image">
                <div class="overlay">
                    <div class="text"><h2><?php echo $value; ?></h2>
                      <span><a href="anza_borrega.php?id=<?php echo $value;?>">Explore</a></span>
                    </div>
                </div>
          </div>
        </td>
        <?php if($key%2 != 0){echo "</tr>";}; ?>
        <?php endforeach; ?>
        </table>
    </main>
    <div class="footer">
        <p>Any questions please contact me at <a href='mailto:levithompsonmedia@gmail.com'>levithompsonmedia@gmail.com</a></p>
      </div>
</body>

</html>
