<?php namespace ctrls;

class Comments extends \core\Controller {
	public function new($comment){
		$this->model->input($comment)->validate()->save();
		return "comment posted";
	}
	public function show_reply($params){
		return $this->view->reply($params);
	}
	public function print($post){
		return $this->view->comments($post['id']);
	}
	public function count($id){
		return $this->model->count(["post_id"=>$id]);
	}
	public function show_edit($params){
		$comment = $this->model->find($params);
		return $this->view->edit($comment);
	}
	public function edit($comment){
		$this->model
			->load(["id"=>$comment['id']])
			->input(["body"=>$comment['body']])->save();
		return "comment updated";
	}
	public function delete($comment){
		$this->model->load($comment)->destroy();
		return "comment deleted";
	}
}
