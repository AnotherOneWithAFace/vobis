<!DOCTYPE html>
<html>
<head>
<title>Upload successful :^)</title>
<meta name="viewport" content="width=device-width;height=device-height">
<meta name="charset" value="utf-8">
<link rel="icon" href="img/banner.png">
<link rel="stylesheet" href="/res/style.css">
</head>
<body>
<?php
$target_dir="/data/";
$mimetype= $_FILES['file']['type'];
$extension = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
$target_file= md5($_FILES['file']['name']);
$target_filename= $target_dir . $target_file . "." . $extension;
$user_ip= $_SERVER['REMOTE_ADDR'];

if (!$mimetype) {
	header("Location: /fail.html");
	die();
}

$database="files";
$user="matt";
$passwd="thatfeelwhennogf";
$table="upload";

if (!move_uploaded_file($_FILES['file']['tmp_name'],$target_filename)) {
	header("Location: /fail.html");
	die();	
}
$query="INSERT INTO $database.$table (filename, mimetype, hash, ip) VALUES (\"$target_filename\", \"$mimetype\", \"$target_file\", \"$user_ip\")";
$db = new PDO("mysql:host=localhost;dbname=$database",$user,$passwd);
if (!$db) {
	echo "database failure";
	die();
}
if ($db->exec($query)) {
	echo "<h2>Success!</h2>";
	echo "<h3>Your file can now be found at <a href=\"/i/$target_file\">$target_file</a>";
} else {
	echo "<h2>FAILURE</h2>";
}
?>

</body>
</html>
