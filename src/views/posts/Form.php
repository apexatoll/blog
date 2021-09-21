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
	public function edit(){
		return $this->buffer_layout("post-form", [
			"heading" => "edit post",
			"form_id" => "edit-post",
			"buttons" => $this->edit_buttons(),
			"images"  => $this->images()
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
	protected function subtitle(){
		return $this->make_input("subtitle");
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
	public function images(){
		return $this->buffer_global("images", [
			"images" => $this->buffer_images()
		]);
	}
	private function new_buttons(){
		return join([
			$this->button("cancel", ["class"=>"go-back cancel"]), 
			$this->button("submit", ["class"=>"post-new-submit submit"])
		]);
	}
	private function edit_buttons(){
		return join([
			$this->a("cancel", ["href" => "/posts/$this->id", "class"=>"cancel"]), 
			$this->button("submit", ["class"=>"post-edit-submit submit"])
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
	private function buffer_images(){
		foreach($this->images??[] as $img)
			$buff[]= $this->buffer_global("image", [
				"name" => $img->name,
				"path" => $img->rel_path()
			]);
		return isset($buff) ? join($buff): null;
	}
}
