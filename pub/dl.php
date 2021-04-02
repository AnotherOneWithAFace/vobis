<!DOCTYPE html>
<html>
<head>
<link rel="icon" content="/img/banner.png">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width;height=device-height">
<meta property="og:title" content="File">
<meta property="og:type" content="video.movie">
<title>File</title>
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
a {
text-decoration: none;
color:#926fa6;
font-family:sans-serif;
}
footer{
text-align: center;
}
</style>
</head>
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
	switch ($extension) {
		case "mp3":
		case "opus":
			echo "<audio controls autoplay src=\"$filename\">LOL get a better browser CUCK</audio>";
			break;
		case "ogg":
			if ($type === "video/ogg") {
			echo "<video controls autoplay anonymous><source src=\"$filename\" type=\"$type\">LOL get a better browser CUCK</video>";
			} else {
				echo "<audio controls autoplay src=\"$filename\">LOL get a better browser CUCK</audio>";
			}
			break;
		case "jpg":
		case "jpeg":
		case "png":
		case "gif":
		case "webp":
			echo "<img src=\"$filename\" alt=\"$filename\"/>";
			break;
		case "mp4":
		case "webm":
			echo "<video controls autoplay anonymous><source src=\"$filename\" type=\"$type\">LOL get a better browser CUCK</video>";
			echo "<meta property=\"og:url\" content=\"$filename\"><meta property=\"og:video\" content=\"$filename\">";
			break;
		case "txt":
			$stuff = file_get_contents("." . $db_filename);
			echo "<br/><pre>" . $stuff . "</pre>";
			break;
		default:
			if ($type === "text/plain") {
				$stuff = file_get_contents("." . $db_filename);
				echo "<br/><pre>" . $stuff . "</pre>";
				break;
			} else {
				echo "unhandled mime type: $type";
				echo "<br/> file extension=$extension";
				break;
			}
	}
}

?>
<center>
<footer>
<a id="backlink" href="/upload"><img width="256" height="256" src="/img/banner.png"/>
</a><a id="backlink" href="/upload">Upload another!</a>
</footer>
</center>
</body>
</html>
