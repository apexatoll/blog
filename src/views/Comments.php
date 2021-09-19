<?php namespace views;

class Comments extends \core\View {
	use traits\ViewModel;
	public function comments($post_id){
		return join([
			$this->div(["id"=>"comments"]),
			$this->threads($post_id),
			$this->_div()
		]);
	}
	public function reply($params){
		return $this->subclass("Form", $params)->reply();
	}
	public function edit($params){
		return $this->subclass("Form", $params)->edit();
	}
	protected function threads($post_id){
		return $this->buffer_method("thread", [
			"post_id" => $post_id, 
			"parent"  => "ROOT"
		]);
	}
	protected function thread($where){
		foreach($this->model->find_ordered($where) as $comment)
			$this->render_layout("thread", ["comment"=>$comment]);
	}
	protected function comment($comment){
		return $this->subclass("Comment", $comment)->build();
	}
}
