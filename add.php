<?php
$txt=$_POST['txt'];

try {
	$db = new mysqli("localhost","lmao","niggerlmao","shampla");
	if ($db->query("INSERT INTO shampla.todo (txt) VALUES (\"$txt\");") === TRUE) {
		header("Refresh:0; url=index.php");
	} else {
		echo "faaaaaill<br/>ERROR: " . $db->error;
	}
} catch (PDOException $e) {
	echo "fail lol";
	die();
}
echo "you typed " . $txt;
?>
