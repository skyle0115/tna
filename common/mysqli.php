<?php
$mysqli = new mysqli("localhost", "root", "", "tna");
if ($mysqli->connect_errno)	die("Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error);
?>
