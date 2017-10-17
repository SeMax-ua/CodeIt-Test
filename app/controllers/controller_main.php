<?php

class Controller_Main extends Controller{
	
	function __construct(){	
		if(!empty($_SESSION['ses_email']))
			header("Location: logedin", true, 303);
		
		$this->model = new Model_Main();
		$this->view = new View();
		
		if(isset($_POST['r_submit']))
			$this->Register();
		
		if(isset($_POST['login']))
			$this->SignIn();
	}
	
	function __destruct(){
		global $mysqli;
		$mysqli->close();
	}
	
	function Register(){
		$error = $this->validateRegForm();
		
		if(count($error) == 0){
			$sql_data = [];
			$sql_data = array(
				'email'		=> $_POST['email'],
				'login'		=> $_POST['username'],
				'password' 	=> md5($_POST['pwd']),
				'realname' 	=> $_POST['realName'],
				'birth' 	=> $_POST['birthday'],
				'country' 	=> $_POST['country']
			);
			$request = $this->model;
			$sql_result = $request->SqlGet($sql_data);

			if(!empty($sql_result))
				die('Email and login must be unique');
			else{
				$request->SqlInsert($sql_data);
				$_SESSION['ses_email'] = $_POST['email'];
				$authhash = hash('md5', $sql_data['email'].$sql_data['login']);
				setcookie('AuthHash', $authhash);
				header("Location: logedin", true, 303);
			}
		}
	}		
	
	function SignIn(){
		$error = $this->validateRegForm();
		if(count($error) == 0){
			$auth_param = [];
			
			$auth_param = array(
			'f_login' => $_POST['f_login'],
			'f_password' => md5($_POST['f_password'])
			);
			
			$request = $this->model;
			$SqlCheck = $request->SqlAuth($auth_param);
			
			if($auth_param['f_password'] == $SqlCheck['password'] and $auth_param['f_login'] == $SqlCheck['email']|| $auth_param['f_login'] == $SqlCheck['login']){
				setcookie('AuthHash', $SqlCheck['authhash']);
				header("Location: logedin", true, 303);
				$_SESSION['ses_email'] = $SqlCheck['email'];
			}
		}
	}
	
	function validateRegForm(){
		
		if(isset($_POST['r_submit'])){
			$error = array();
			if(empty($_POST['email'])) 
				$error[] = 'Field "Email" is empty';
		
			if(empty($_POST['username'])) 
				$error[] = 'Field "Username" is empty';
		
			if(empty($_POST['pwd']))
				$error[] = 'Field "Password" is empty';
		
			if(empty($_POST['realName'])) 
				$error[] = 'Field "Real name" is empty';
		
			if(empty($_POST['birthday'])) 
				$error[] = 'Field "Birth" is empty';
		
			if(empty($_POST['country'])) 
				$error[] = 'Field "Country" is empty';
			
			if(empty($_POST['terms'])) 
				$error[] = 'You must agree with terms';
		}
		
		if(isset($_POST['login'])){
			$error = array();
			if(empty($_POST['f_login'])) 
				$error[] = 'You must enter login or email';
		
			if(empty($_POST['f_password'])) 
				$error[] = 'You must enter your password';
		}
		return $error;
	}	
	
	function action_index(){
		$data = $this->model->SqlSelect();
		$error = $this->validateRegForm();
		$this->view->generate('main_view.php', 'template_view.php', $data, $error);
	}
}