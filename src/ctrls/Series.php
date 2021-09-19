<?php namespace ctrls;

class Series extends \core\Controller {
	public function view($params){
		$list = (new PostLists)->series($params);
		$series = $this->model->find(["title"=>$params['title']]);
		$this->view->series($series + ["list"=>$list]);
	}
	public function tree_all(){
		return $this->view->tree_all();
	}
}
