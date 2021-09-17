<?php namespace ctrls;

class Posts extends \core\Controller {
	public function form_new(){
		$this->view->new();
	}
	public function form_edit($post){
		$this->model->load($post);
		$this->unpublish($post);
		$this->view->edit($this->model->build_with_images());
	}
	public function new($post){
		$id = $this->model->input($post)->validate()->save();
		return ["post submitted", ["id"=>$id]];
	}
	public function edit($post){
		$this->model->input($post)->validate()->save();
		return ["post updated", ["id"=>$post['id']]];
	}
	public function index($params){
		$list = (new PostLists)->published($params);
		$this->view->index($list);
	}
	public function unpublished($params){
		$list = (new PostLists)->unpublished($params);
		$this->view->unpublished($list);
	}
	public function view($post){
		$this->model->load($post);
		$this->view->post(
			$this->model->build_with_id() + 
			$this->count_comments($post)
		);
		$this->model->update_views();
	}
	public function delete($post){
		$this->model->load($post);
		$this->unpublish($post);
		$this->model->destroy();
		return "post deleted";
	}
	private function count_comments($post){
		return [
			"comment_count" => (new Comments)->count($post['id'])
		];
	}
	private function unpublish($post){
		if($this->model->is_public())
			$this->subclass("Publish")->unpublish($post);
	}
}
