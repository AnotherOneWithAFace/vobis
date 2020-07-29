<?php
$user="lmao";
$password="niggerlmao";
$database="shampla";
$table="todo";

try {
	$db = new PDO("mysql:host=localhost;dbname=$database",$user,$password);
	echo "<h1>TODO</h1><ol>";
	foreach ($db->query("SELECT txt FROM $database.$table") as $row) {
		echo "<li>" . $row['txt'] . "</li>";
	}
	echo "</ol>";
} catch (PDOException $e) {
	print "ERROR: " . $e->getMessage() . "<br/>";
	die();
}
?>

<form method="POST" action="add.php">
<label for="txt">Enter a new item to the list:</label>
<input type="text" name="txt" id="txt" required>
<input type="submit" value="Enter">
