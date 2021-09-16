<?php namespace ctrls;

class PostLists extends \core\Controller {
	public function published($params){
		return $this->build($params, "/posts", ["published"=>1]);
	}
	public function unpublished($params){
		return $this->build($params, "/posts/unpublished", ["published"=>0]);
	}
	private function build($params, $root, $where, $order=null){
		$params = $this->model->input($params+[
			"where"=>$where, 
			"root"=>$root,
			"order"=>$order??null
		])->build();
		//print_r($this->view->list($params));
		return $this->view->list($params);
	}
}
