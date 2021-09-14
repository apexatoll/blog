<?php namespace ctrls;

class Pages extends \core\Controller {
	public function index(){
		$this->view->page("index", "home");
	}
}
