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
switch ($lang) {
	case "en":
		echo "<header>Welcome!</header>";
		break;
	case "ga":
		echo "<header>Fáilte!</header>";
		break;
	case "la":
		echo "<header>Gratissium!</header>";
		break;
	case "fr":
		echo "<header>Bienvenue!</header>";
		break;
	default:
		echo "<header>Welcome! | Fáilte! | Gratissimum! | Bienvenue!</header>";
		break;
}
?>
</body>
</html>
