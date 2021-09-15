<?php namespace views;

class Posts extends Pages {
	public function new(){
		$this->page_from_str($this->subclass("Form")->new(), "new post");
	}
}
