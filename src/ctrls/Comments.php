<?php namespace ctrls;

class Comments extends \core\Controller {
	public function print($post){
		return $this->view->comments($post['id']);
	}
}
