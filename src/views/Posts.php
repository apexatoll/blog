<?php namespace views;

class Posts extends Pages {
	public function new(){
		$this->page_from_str($this->subclass("Form")->new(), "new post");
	}
	public function index($list){
		$this->page_from_file("posts", "posts", "posts", ["list"=>$list]);
	}
}
