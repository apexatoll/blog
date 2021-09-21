<?php namespace ctrls;

class Series extends \core\Controller {
	public function view($params){
		$list = (new PostLists)->series($params);
		$series = $this->model->find(["title"=>$params['title']]);
		if(!$series)
			$this->redirect_not_found();
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
		foreach($params['order'] as $i => $id)
			$this->model->set_order($id, $i);
		return "order set";
	}
	public function show_edit($params){
		$this->model->load(["id"=>$params['id']]);
		$this->view->edit($this->model->build_with_images());
	}
	public function show_new(){
		$this->view->new();
	}
	public function edit($series){
		$this->model->input($series)->validate()->save();
		return ["series updated", ["title"=>$series['title']]];
	}
	public function new($series){
		$this->model->input($series)->validate()->save();
		return ["series submitted", ["title"=>$series['title']]];
	}
}
