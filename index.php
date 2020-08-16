<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="img/banner.png">
<link rel="stylesheet" href="res/style.css">
<title>By Matthew</title>
</head>
<body>
<img src="img/banner.png" alt="banner"> 
<?php
$lang = $_GET['lang'];
if (!$lang) {
	echo "<header>Welcome! | Fáilte! | Gratissimum! | Bienvenue!</header>";
} else if ($lang === "en") {
	echo "<header>Welcome!</header>";
} else if ($lang === "ga") {
	echo "<header>Fáilte!</header>";
} else if ($lang === "la") {
	echo "<header>Gratissium!</header>";
} else if ($lang === "fr") {
	echo "<header>Bienvenue!</header>";
} else {
	echo "<header>Welcome! | Fáilte! | Gratissimum! | Bienvenue!</header>";
}

?>
</body>
</html>
