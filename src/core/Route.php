<?php namespace core;

class Route extends Authorise {
	public function __construct($path, $action, $auth=null){
		parent::__construct();
		$this->regex  = $this->convert($path);
		$this->keys   = $this->extract_keys($path);
		$this->auth   = $auth ?? null;
		$this->action = $this->parse($action);
	}
	public function matches_uri($uri){
		if(preg_match($this->regex, $uri))
			$this->uri = $uri;
		return isset($this->uri);
	}
	public function execute($args){
		$this->authorise();
		return call_user_func_array(
			$this->action, [$this->build_args($args)]);
	}
	private function convert($path){
		return sprintf("~^%s$~", $this->replace_keys($path));
	}
	private function replace_keys($path){
		return preg_replace("/:[A-z]+/", "([^\/]+)", $path);
	}
	private function extract_keys($path){
		preg_match_all("/(?<=:)[A-z]+/", $path, $vars);
		return count($vars[0]) > 0 ? $vars[0] : null;
	}
	private function parse($action){
		[$ctrl, $method] = explode("#", $action);
		return [$this->instantiate($ctrl), $method];
	}
	private function instantiate($ctrl){
		return new (sprintf("\\%s\\%s", CTRL_NS, $ctrl));
	}
	private function build_args($args){
		return $args + (
			isset($this->keys) ? $this->extract_vars() : []);
	}
	private function extract_vars(){
		preg_match($this->regex, $this->uri, $vars);
		return $this->make_assoc($vars);
	}
	private function make_assoc($vars){
		return array_combine($this->keys, array_slice($vars, 1));
	}
	private function authorise(){
		if(isset($this->auth))
			call_user_func([$this, $this->auth]);
	}
}
