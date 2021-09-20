<?php namespace core;

class Authorise extends Session {
	public function val_can_post(){
		if(!$this->can_post())
			$this->forbidden();
	}
	public function val_logged_in(){
		if(!$this->logged_in())
			$this->forbidden();
	}
	public function val_admin(){
		if(!$this->is_admin())
			$this->forbidden();
	}
	public function val_published($ctrl, $params){
		$ctrl->model->load($params);
		if(!$ctrl->model->is_public())
			$this->val_admin();
	}
	private function forbidden(){
		throw new errors\Forbidden;
	}
}
