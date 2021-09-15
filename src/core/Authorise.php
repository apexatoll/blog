<?php namespace core;

class Authorise extends Session {
	public function val_can_post(){
		if(!$this->can_post())
			$this->forbidden();
	}
	private function forbidden(){
		throw new errors\Forbidden;
	}
}
