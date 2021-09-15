<?php namespace ctrls;

class Comments extends \core\Controller {
	public function print($post){
		return $this->view->comments($post['id']);
	}
	public function count($id){
		return $this->model->count(["post_id"=>$id]);
	}
	public function new($comment){
		$this->model->input($comment)->validate()->save();
		return "comment posted";
	}
}
