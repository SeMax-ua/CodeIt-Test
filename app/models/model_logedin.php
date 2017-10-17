<?php

class Model_Logedin extends Model{
	
	function SqlSelect($SelectParam){
		global $mysqli;
		
		$SqlSelect = "SELECT `email`, `login` FROM `users` WHERE `authhash`='".$SelectParam."'";
		$result = $mysqli->query($SqlSelect);
		$row = $result->fetch_assoc();
		
		return $row;
	}
}