<?php namespace ctrls;

class Comments extends \core\Controller {
	public function print($post){
		return $this->view->comments($post['id']);
	}
	public function count($id){
		return $this->model->count(["post_id"=>$id]);
	}
}
