<?php namespace ctrls;

class Footers extends \core\Controller {
	public function default(){
		return $this->show("guest");
	}
	public function show($menu){
		return $this->view->footer($menu);
	}
}
