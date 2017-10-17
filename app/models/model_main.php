<?php

class Model_main extends Model{
	
	function SqlSelect(){
		global $mysqli;
		$SqlSelect = "SELECT * FROM `countries`";
		$result = $mysqli->query($SqlSelect);
		while ($row = $result->fetch_assoc()) {
			$countries[] = $row["countryname"];
		}
		return $countries;
	}
	
	function SqlAuth($auth_param = array()){
		global $mysqli;
		$f_login = $mysqli->real_escape_string($auth_param['f_login']);
		$SqlSelect = "SELECT `email`, `login`, `password`, `authhash` FROM `users` WHERE `email`='".$f_login."' OR `login`='".$f_login."'";
	
		$result = $mysqli->query($SqlSelect);
		$row = $result->fetch_assoc();
		
		return $row;
	}

	function SqlInsert($sql_param = array()){
		global $mysqli;
		$timestamp = time();

		$SqlInsert = $mysqli->prepare("INSERT INTO `users` (`email`, `login`, `password`, `real_name`, `birth`, `regstamp`, `country`, `authhash` ) VALUES (?, ?, ?, ?, ?, ?, ?, ?);");
		$SqlInsert->bind_param('sssssiss', $email, $username, $pwd, $realname ,$birthday, $timestamp, $country, $authhash);
		
		$email = $mysqli->real_escape_string($sql_param['email']);
		$username = $mysqli->real_escape_string($sql_param['login']);
		$pwd = $mysqli->real_escape_string($sql_param['password']);
		$realname = $mysqli->real_escape_string($sql_param['realname']);
		(string)$birthday = $sql_param['birth'];
		$country = $mysqli->real_escape_string($sql_param['country']);
		$authhash = hash('md5', $email.$username);
		$SqlInsert->execute();
	}
	
	function SqlGet($sql_check_param = array()){
		global $mysqli;
		
		$email = $mysqli->real_escape_string($sql_check_param['email']);
		$username = $mysqli->real_escape_string($sql_check_param['login']);

		$SqlGet = "SELECT * FROM `users` WHERE `email`='".$email."' OR `login`='".$username."';";
		
		$result = $mysqli->query($SqlGet);
		$row = $result->fetch_array(MYSQLI_NUM);
		
		return $row;
	}	
}