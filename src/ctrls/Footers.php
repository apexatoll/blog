<?php namespace ctrls;

class Footers extends \core\Controller {
	public function default(){
		return $this->show(["menu"=>"guest"]);
	}
	public function show($params){
		return $this->view->footer($params['menu']);
	}
}
