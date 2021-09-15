<?php namespace core\errors;

class Forbidden extends \Exception {
	public function redirect(){
		(new \ctrls\Pages)->forbidden();
	}
}
