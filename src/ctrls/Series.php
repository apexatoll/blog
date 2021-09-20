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
	public function show_sort($params){
		$series = $this->model->find(["id"=>$params['id']]);
		$this->view->sort($series);
	}
	public function sort($params){
		//print_r($params);
		foreach($params['order'] as $i => $id)
			$this->model->set_order($id, $i);
		return "order set";
	}
}
