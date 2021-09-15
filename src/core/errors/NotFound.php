<?php namespace core\errors;

class NotFound extends \Exception {
	public function __construct($uri){
		parent::__construct();
		$this->uri = $uri;
	}
	public function redirect(){
		(new \ctrls\Pages)->not_found($this->uri);
	}
}
