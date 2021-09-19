<?php namespace ctrls;

class Series extends \core\Controller {
	public function view($params){
		$series = $this->model->find(["title"=>$params['title']]);
		$list = (new PostLists)->series($params);
		$this->view->series($series + ["list"=>$list]);
	}
	public function tree_all(){

	}
}
