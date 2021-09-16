<?php namespace views;

class Comments extends \core\ViewModel {
	public function comments($post_id){
		$comments = $this->build_threads($post_id);
		return $this->buffer_layout("comments", ["comments"=>$comments]);
	}
	protected function thread($where){
		foreach($this->model->find_all($where, ["order"=>["posted"=>"desc"]]) as $comment)
			$this->render_layout("thread", ["comment"=>$comment]);
	}
	protected function build_threads($post_id){
		return $this->buffer_method("thread", ["post_id"=>$post_id, "parent"=>"ROOT"]);
		//ob_start();
		//$this->buffer_thread(["post_id"=>$post_id, "parent"=>"ROOT"]);
		//return ob_get_clean();
	}
	protected function comment($comment){
		return $this->subclass("Comment", $comment)->build();
	}
	public function reply($params){
		return $this->subclass("Form", $params)->reply();
	}
	public function edit($params){
		return $this->subclass("Form", $params)->edit();
	}
}
