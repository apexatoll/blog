<?php namespace ctrls\posts;

class Publish extends \core\Controller {
	public function __construct(){
		parent::__construct();
		$this->categories = (new \ctrls\Categories);
	}
	public function publish($params){
		$this->model->load($params)->publish_with_date();
		$this->update_categories();
		return "post published";
	}
	public function unpublish($params){
		$this->model->load($params)->unpublish();
		$this->update_categories();
		return "post unpublished";
	}
	private function update_categories(){
		$this->categories->update($this->model->build_with_id());
	}
}
