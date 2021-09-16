<?php namespace views\posts;

class Form extends \core\View {
	protected $title, $categories, $tags, $series, $md, $images, $id;
	public function new(){
		return $this->buffer_layout("post-form", [
			"heading" => "new post",
			"form_id" => "new-post",
			"buttons" => $this->new_buttons()
		]);
	}
	protected function title(){
		return $this->make_input("title");
	}
	protected function categories(){
		return $this->make_input("categories");
	}
	protected function tags(){
		return $this->make_input("tags");
	}
	protected function series(){
		return $this->make_input("series");
	}
	protected function file(){
		return $this->input("file", ["name"=>"files"], ["multiple"]);
	}
	protected function md(){
		return $this->textarea($this->md ?? null, [
			"name"=>"md", "placeholder"=>"Body...", "rows"=>"12"
		]);
	}
	private function new_buttons(){
		return join([
			$this->button("cancel", ["class"=>"go-back cancel"]), 
			$this->button("submit", ["class"=>"post-new-submit submit"])
		]);
	}
	private function make_input($prop){
		return $this->input("text", [
			"name"  => $prop, 
			"value" => $this->$prop??null,
			"placeholder" => $this->placeholder($prop)
		]);
	}
	private function placeholder($type){
		return sprintf("%s...", ucfirst($type));
	}
}
