<?php namespace core\errors;

class Forbidden extends \Exception {
	public function __construct(){
		parent::__construct("invalid permission");
	}
	public function redirect(){
		(new \ctrls\Pages)->forbidden();
	}
}
