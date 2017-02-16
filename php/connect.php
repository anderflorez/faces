<?php 
	ob_start();

	$dbhost = "localhost";
	$dbuser = "aflorez";
	$dbpass = "password";
	$dbname = "aflorez";

	$db = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

	if ($db->connect_error) {
		die("Connection Failed: " . $db->connect_error);
	}
?>