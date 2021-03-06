<?php namespace views;

class Posts extends Pages {
	public function new(){
		$this->page_from_str($this->subclass("Form")->new(), "new post");
	}
	public function edit($post){
		$this->page_from_str($this->subclass("Form", $post)->edit(), "edit post");
		//$this->build_page("edit post", $this->subclass("Form", 
			//$post)->edit());
	}
	public function index($list){
		$this->page_from_file("posts", "posts", "posts", ["list"=>$list]);
	}
	public function unpublished($list){
		$this->page_from_file("unpublished", "posts", "unpublished", ["list"=>$list]);
	}
	public function post($post){
		$this->page_from_str($this->build_post($post), $post['title'], "posts");
	}
	private function build_post($post){
		return $this->buffer_layout("post", $post + [
			"header" => $this->post_header($post),
			"comments" => $this->comments($post),
			"comment_box" => $this->comment_box()
		]);
	}
	private function post_header($post){
		return $this->subclass("Header", $post)->make();
	}
	private function comments($post){
		return (new \ctrls\Comments)->print($post);
	}
	private function comment_box(){
		return $this->subclass("CommentBox")->make();
	}
}
