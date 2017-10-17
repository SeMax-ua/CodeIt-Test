<?php
class Route{
	static function start(){

		$controller_name = 'Main';
		$action_name = 'index';
		
		$routes = explode('/', $_SERVER['REQUEST_URI']);

		if (!empty($routes[count($routes)-1]))
			$controller_name = $routes[count($routes)-1];
		
		if (!empty($routes[count($routes)]))
			$action_name = $routes[count($routes)];

		$model_name = 'Model_'.$controller_name;
		$controller_name = 'Controller_'.$controller_name;
		$action_name = 'action_'.$action_name;

		$model_file = strtolower($model_name).'.php';
		$model_path = 'app/models/'.$model_file;
		
		if(file_exists($model_path))
			include 'app/models/'.$model_file;

		$controller_file = strtolower($controller_name).'.php';
		$controller_path = 'app/controllers/'.$controller_file;
		
		if(file_exists($controller_path))
			include 'app/controllers/'.$controller_file;
		else
			die('404: Not Found');
		
		$controller = new $controller_name;
		$action = $action_name;
		
		if(method_exists($controller, $action))
			$controller->$action();
		else
			die('404: Not Found');
	}
}