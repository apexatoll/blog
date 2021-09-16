<?php namespace ctrls;

class PostFinders extends \core\Controller {
	public function show($params){
		return call_user_func([$this, $params['screen']]);
	}
	public function categories(){
		$tree = (new Categories)->tree();
		return $this->view->categories($tree);
	}
	public function archives(){
		$tree = (new Archives)->published();
		return $this->view->archives($tree);
	}
}
