<?php namespace views\comments;

class Comment extends \core\View {
	protected $body, $author, $posted, $edited, $id, $deleted;
	public function build(){
		return $this->deleted ? 
			$this->buffer_layout("deleted"):
			$this->buffer_layout("comment");
	}
	protected function date($date=null, $text=null){
		return isset($this->edited) ?
			parent::date($this->edited, " (edited)"):
			parent::date($this->posted);
	}
	protected function reply(){
		if($this->session->logged_in())
			return $this->icon_button("reply", "comment-reply-show");
	}
	protected function edit(){
		if($this->session->is_author($this->author))
			return $this->icon_button("edit", "comment-edit-show");
	}
	protected function delete(){
		if($this->session->is_admin())
			return $this->icon_button("trash-alt", "comment-delete cancel");
	}
}
