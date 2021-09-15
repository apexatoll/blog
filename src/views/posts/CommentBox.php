<?php namespace views\posts;

class CommentBox extends \core\View {
	public function make(){
		//return \core\Session::logged_in() ?
		return $this->comment_box();
			//$this->empty_box();
	}
	private function comment_box(){
		return $this->buffer_layout("comment-box");
	}
	private function empty_box(){
		return $this->buffer_layout("empty-box");
	}
}
