<?php namespace ctrls;

class Users extends \core\Controller {
	public function bookmark($params){
		$this->model->load_current()->bookmark($params['id']);
		return "bookmarks updated";
	}
}
