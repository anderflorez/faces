<?php
	require_once 'php/connect.php';

	$sql = "CREATE TABLE IF NOT EXISTS faces (
		faceId INT UNSIGNED NOT NULL AUTO_INCREMENT,
		title VARCHAR(50) NULL,
		comments VARCHAR(255) NULL,
		picture VARCHAR(100) NOT NULL,
		face VARCHAR(500) NULL,
		PRIMARY KEY (faceId)
	)";

	if ($db->query($sql) === TRUE) {
		echo "Table faces has been created successfully<br>";
	}
	else {
		echo "Error creating table faces: " . $db->error . "<br>";
	}

	header("location: faces/php/faces.php");
?>