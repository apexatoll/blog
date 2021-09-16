<?php namespace views\comments;

class Form extends \core\View {
	protected $id, $body, $parent;
	public function reply(){
		return $this->build("reply", "Post reply...");
	}
	public function edit(){
		return $this->build("edit", "Edit comment...");
	}
	protected function id(){
		return isset($this->id) ? 
			$this->input("hidden", [
				"name"=>"id", 
				"value"=>$this->id
			]) : null;
	}
	protected function parent(){
		return isset($this->parent) ?
			$this->input("hidden", [
				"name"=>"parent", 
				"value"=>$this->parent
			]) : null;
	}
	protected function body($prompt){
		return $this->textarea($this->body ?? null, [
			"placeholder" => $prompt,
			"name" => "body", 
			"rows" => "3" 
		]);
	}
	private function build($action, $prompt){
		return $this->buffer_layout("comment-form", [
			"class" => "comment-form-$action",
			"prompt" => $prompt,
			"buttons" => $this->buttons($action)
		]);
	}
	private function buttons($action){
		return join([
			$this->button("cancel", "comment-$action-hide cancel"),
			$this->button("post", "comment-$action-submit submit"),
		]);
	}
}
