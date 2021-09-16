<?php namespace views\comments;

class Form extends \core\View {
	public function reply($params){
		return $this->buffer_layout("comment-form", [
			"class"   => "reply",
			"prompt"  => "Post reply...",
			"params"  => $params
		]);
	}
}
