#!/usr/local/php5/bin/php-cgi
<?php
$prj_nameErr = $prj_descErr =  $noImageErr[] = " ";
$prj_name = $prj_desc =  "";
$num_files = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["prj_name"])) {
    $prj_nameErr = "Project name is required";
  } else {
    $prj_name = test_input($_POST["prj_name"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$prj_name)) {
      $prj_nameErr = "Only letters and white space allowed"; 
    }else if(is_dir("images/".$_POST["prj_name"])){
         // Check if project already exists
        $prj_nameErr =  $_POST["prj_name"]. " project already exists.";
    }else{
      $prj_nameErr = "";
    }
  }
  if (empty($_POST["prj_desc"])) {
    $prj_descErr = "Project description is required";
  } else {
    $prj_desc = test_input($_POST["prj_desc"]);
    $prj_descErr ="";
  }

  foreach ($_FILES["fileToUpload"]["name"] as $name) {
    if (!empty($name))
        $num_files++;
    }
    if($num_files == 0){
        $noImageErr[0] = "At least one image is required";
    }
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

$imgErr=1;
for($i=0;$i<count($_FILES["fileToUpload"]["name"]);$i++)
{
    if($noImageErr[$i]==" "){
        $imgErr=0;
    }
}

if($num_files!==0){
    
for($i=0;$i<count($_FILES["fileToUpload"]["name"]);$i++)
{
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"][$i]);
$uploadOk[$i] = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"][$i]);
    if($check !== false) {
        $uploadOk[$i] = 1;
    } else {
        $noImageErr[$i] = basename( $_FILES["fileToUpload"]["name"][$i]). " is not an image.<br>";
        $uploadOk[$i] = 0;
    }
}
/*
// Check if file already exists
if (file_exists($target_file)) {
    $noImageErr[$i] = basename( $_FILES["fileToUpload"]["name"][$i]). " already exists.<br>";
    $uploadOk[$i] = 0;
}*/
// Check file size
if ($_FILES["fileToUpload"]["size"][$i] > 500000000000000) {
    $noImageErr[$i] = basename( $_FILES["fileToUpload"]["name"][$i]). " is too large.<br>";
    $uploadOk[$i] = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $noImageErr[$i] = basename( $_FILES["fileToUpload"]["name"][$i]). " only JPG, JPEG, PNG & GIF files are allowed.<br>";
    $uploadOk[$i] = 0;
}
}
$uploadk=1;
for($i=0;$i<count($_FILES["fileToUpload"]["name"]);$i++)
{
    if ($uploadOk[$i] == 0) {
        $uploadk=0;
    }
}

// Check if $uploadOk is set to 0 by an error
if ($uploadk !== 0 && $$imgErr!==0 && $prj_nameErr=="" && $prj_descErr=="") {
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

    $sql = "Insert into projects (prj_name, prj_description) VALUES (?,?)";
	$statement = $pdo->prepare($sql);
	$statement->bindValue(1, $_POST['prj_name']);
	$statement->bindValue(2, $_POST["prj_desc"]);
	$statement->execute();
    mkdir("../".$target_dir ."/". $prj_name);
for($i=0;$i<count($_FILES["fileToUpload"]["name"]);$i++){
    $target_file = $target_dir ."/".$prj_name ."/". basename($_FILES["fileToUpload"]["name"][$i]);

// if everything is ok, try to upload file
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$i], "../".$target_file)) {
        $sql2 = "Insert into images (prj_name, img_path) VALUES(?,?)";
	    $statement2 = $pdo->prepare($sql2);
	    $statement2->bindValue(1, $_POST['prj_name']);
	    $statement2->bindValue(2, $target_file);
	    $statement2->execute();
    } else {
        $noImageErr[$i] = "There was an error uploading ".basename( $_FILES["fileToUpload"]["name"][$i]). "<br>";
    }
}
$connect = null;
}
}

?>

<!DOCTYPE html>
<html lang ="en">
<head>
	<meta charset="utf-8">
	<title>LeviThompsonMedia-Upload Project</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="proj_mod.css">

</head>

<body>
<h1>Upload Project:</h1>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
    <label for="prj_name">Project Name:</label><br>
    <input type="text" name="prj_name" id="prj_name" value="<?php echo $prj_name;?>">
    <span class="error">* <?php echo $prj_nameErr;?></span>
    <br><br>
    <label for="prj_desc">Project Description:</label><br>
    <textarea id="prj_desc" name="prj_desc" cols="40" rows="5" ><?php echo $prj_desc;?></textarea>
    <span class="error">* <?php echo $prj_descErr;?></span>
    <br><br>
    <label for="fileToUpload">Select image to upload:</label>
    <span class="error">*</span>
    <input type="file" name="fileToUpload[]" id="fileToUpload" multiple><br>
    <span class="error"><?php for($i=0;$i<count($_FILES["fileToUpload"]["name"]);$i++){echo $noImageErr[$i];}?></span>
    <br><br>
    <input type="submit" value="Upload Project" name="submit">  
</form>


</body>
</html>
