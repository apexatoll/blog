<?php namespace core\errors;

class NotFound extends \Exception {
	public function __construct($uri){
		parent::__construct("$uri not found");
		$this->uri = $uri;
	}
	public function redirect(){
		(new \ctrls\Pages)->not_found($this->uri);
	}
}
