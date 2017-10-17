<?php

class Controller_logedin extends Controller
{
	function __construct(){	
	
		if(empty($_COOKIE['AuthHash']))
			header('Location: main', true, 303);
		if(isset($_POST['logout']))
			$this->LogOut();
		
		$this->model = new Model_Logedin();
		$this->view = new View();
	}
	
	function LogOut(){
		header('Location: main', true, 303);
		setcookie('AuthHash', '');
		session_destroy();
	}
	

	
	function action_index(){	
		$data = $this->model->SqlSelect($_COOKIE['AuthHash']);
		$this->view->generate('logedin_view.php', 'template_view.php', $data);
	}
}