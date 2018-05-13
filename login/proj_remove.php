#!/usr/local/php5/bin/php-cgi
<?php
$prj_nameErr = " ";
$prj_name = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["prj_name"])) {
    $prj_nameErr = "Project name is required";
  } else {
    $prj_name = test_input($_POST["prj_name"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$prj_name)) {
      $prj_nameErr = "Only letters and white space allowed"; 
    }else if(!is_dir("../images/".$_POST["prj_name"])){
         // Check if project already exists
        $prj_nameErr =  $_POST["prj_name"]. " project does not exists.";
    }else{
      $prj_nameErr = "";
    }
  }
  if($prj_nameErr == ""){
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
    $sql = "DELETE FROM images where prj_name = ?";
	$statement = $pdo->prepare($sql);
	$statement->bindValue(1, $_POST['prj_name']);
    $statement->execute();
    $sql1 = "DELETE FROM projects where prj_name = ?";
	$statement1 = $pdo->prepare($sql1);
	$statement1->bindValue(1, $_POST['prj_name']);
	$statement1->execute();
    
    deleteDir("../images/".$_POST['prj_name']);
    $connect = null;
  }
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
function deleteDir($dirPath) {
    if (! is_dir($dirPath)) {
        throw new InvalidArgumentException("$dirPath must be a directory");
    }
    if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
        $dirPath .= '/';
    }
    $files = glob($dirPath . '*', GLOB_MARK);
    foreach ($files as $file) {
        if (is_dir($file)) {
            self::deleteDir($file);
        } else {
            unlink($file);
        }
    }
    rmdir($dirPath);
}
?>

<!DOCTYPE html>
<html lang ="en">
<head>
	<meta charset="utf-8">
	<title>LeviThompsonMedia-Remove Project</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="proj_mod.css">
</head>

<body>
<h1>Remove Project:</h1>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
    <label for="prj_name">Project Name:</label><br>
    <input type="text" name="prj_name" id="prj_name" value="<?php echo $prj_name;?>">
    <span class="error">* <?php echo $prj_nameErr;?></span>
    <br><br>
    
    <input type="submit" value="Remove Project" name="submit">  
</form>
</body>

</html>