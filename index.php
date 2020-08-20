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
function h($str)
{
	echo "<header>$str</header>";
}

$lang = $_GET['lang'];
switch ($lang) {
	case "en":
		h("Welcome!");
		break;
	case "ga":
		h("Fáilte!");
		break;
	case "la":
		h("Gratissium!");
		break;
	case "fr":
		h("Bienvenue!");
		break;
	default:
		echo "<header>Welcome! | Fáilte! | Gratissimum! | Bienvenue!</header>";
		break;
}
?>
</body>
</html>
