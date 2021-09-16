<?php namespace ctrls;

class Categories extends \core\Controller {
	public function update($post){
		$this->model->update_refs($post);
	}
	public function tree(){
		return $this->view->tree();
	}
}
