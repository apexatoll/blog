<?php namespace ctrls;

class Posts extends \core\Controller {
	public function form_new(){
		$this->view->new();
	}
	public function index($params){
		$list = (new PostLists)->published($params);
		$this->view->index($list);
	}
}
