<?php namespace core;

class Router {
	public function __construct(){
		$this->uri = $this->get_uri();
		$this->method = $this->get_method();
	}
	public function get($path, $action, $auth=null){
		$this->add_route("GET", $path, $action, $auth);
	}
	public function post($path, $action, $auth=null){
		$this->add_route("POST", $path, $action, $auth);
	}
	public function route(){
		try {
			$msg = $this->find_route()->execute($this->args());
			if($msg) $this->success($msg);
		}
		catch(\core\errors\NotFound $e){
			$e->redirect();
		}
		catch(\Exception $e){
			Response::error($e->getMessage());
		}
	}
	private function add_route($type, $path, $action, $auth=null){
		$this->routes[$type][]= new Route($path, $action, $auth);
	}
	private function get_uri(){
		return preg_replace(
			"/\?.*?$/", "", $_SERVER['REQUEST_URI']);
	}
	private function get_method(){
		return $_SERVER['REQUEST_METHOD'];
	}
	private function find_route(){
		foreach($this->routes[$this->method] as $route)
			if($route->matches_uri($this->uri))
				return $route;
		throw new \core\errors\NotFound($this->uri);
	}
	private function args(){
		return $_POST + $_GET + $_FILES;
	}
	private function success($msg){
		is_array($msg) ? 
			Response::success(...$msg):
			Response::success($msg);
	}
}
