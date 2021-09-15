<?php namespace ctrls;

class Popups extends \core\Controller {
	public function confirm($params){
		return $this->view->confirm($params);
	}
}
