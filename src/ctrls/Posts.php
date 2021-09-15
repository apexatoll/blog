<?php namespace ctrls;

class Posts extends \core\Controller {
	public function form_new(){
		$this->view->new();
	}
	public function index($params){
		$list = (new PostLists)->published($params);
		$this->view->index($list);
	}
	public function view($post){
		$this->model->load($post);
		$this->view->post(
			$this->model->build_with_id()// + 
			//$this->count_comments($post)
		);
		$this->model->update_views();
	}
}
