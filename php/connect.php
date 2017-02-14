<?php 
	ob_start();

	$dbhost = "localhost";
	$dbuser = "aflorez2015";
	$dbpass = "password";
	$dbname = "aflorez2015";

	$db = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

	if ($db->connect_error) {
		die("Connection Failed: " . $db->connect_error);
	}
?>