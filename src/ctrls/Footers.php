<?php namespace ctrls;

class Footers extends \core\Controller {
	public function default(){
		return $this->session->logged_in() ?
			$this->show(["menu"=>"user"]):
			$this->show(["menu"=>"guest"]);
	}
	public function show($params){
		return $this->view->footer($params['menu']);
	}
}
