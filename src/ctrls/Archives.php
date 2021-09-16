<?php namespace ctrls;

class Archives extends \core\Controller {
	public function published(){
		return $this->view->tree(["published"=>1]);
	}
	public function unpublished(){
		return $this->view->tree(["published"=>0]);
	}
}
