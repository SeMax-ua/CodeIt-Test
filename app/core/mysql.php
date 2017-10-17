<?php
$mysqli = new mysqli('localhost', 'root', '', 'codeit_aleksey');

if (mysqli_connect_errno()) {
	die('Unable to connect DB. Error: '.mysqli_connect_error()); 
	exit; 
}

mysqli_set_charset($mysqli, "utf8");