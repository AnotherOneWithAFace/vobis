<!DOCTYPE html>
<html>
<head>
<link rel="icon" content="/favicon.png">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width;height=device-height">
<style>
html {
background-color: #b0aead;
}
body {
display: flex;
align-items: center;
}
img, video, audio {
padding: 10px;
display: block;
margin: auto;
}
pre {
white-space: pre-wrap;
font-size: medium;
}
</style>
<body>
<?php

$hash = $_GET['h'];
$filename="/pub/data/$hash";
$db = new PDO("mysql:host=localhost;dbname=files","matt","thatfeelwhennogf");
if (!$db) {
    header("Location: /fail.html");
    die();
}
foreach ($db->query("SELECT * FROM files.upload WHERE hash = \"$hash\";") as $q) {
	$db_filename=$q['filename'];
	$type=$q['mimetype'];
	$extension = strtolower(pathinfo($db_filename, PATHINFO_EXTENSION));
	$filename .= ".$extension";
	if ($extension === "mp3" || $extension === "opus"){
		echo "<audio controls autoplay src=\"$filename\">LOL get a better browser CUCK</audio>";
	} else if ($extension === "ogg") { 
		if ($type === "audio/ogg") {
			echo "<audio controls autoplay src=\"$filename\">LOL get a better browser CUCK</audio>";
		} else if ($type === "video/ogg") {
			echo "<video controls autoplay anonymous><source src=\"$filename\" type=\"$type\">LOL get a better browser CUCK</video>";
		}
	} else if ($extension === "jpg" || $extension === "jpeg" || $extension === "png" || $extension === "gif" || $extension === "webp") {
		echo "<img src=\"$filename\" alt=\"$filename\"/>";
	} else if ($extension === "mp4") {
		echo "<video controls autoplay anonymous><source src=\"$filename\" type=\"$type\">LOL get a better browser CUCK</video>";
	} else if ($extension === "webm") {
		echo "<video controls autoplay anonymous><source src=\"$filename\" type=\"$type\">LOL get a better browser CUCK</video>";
	} else if ($type === "text/plain" || $extension === "txt") {
		$stuff = file_get_contents("." . $db_filename);
		echo "<br/><pre>" . $stuff . "</pre>";
	} else {
		header("Location: /fail.html");
	}
}

?>
</body>
</html>
