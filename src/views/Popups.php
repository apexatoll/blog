<?php namespace views;

class Popups extends \core\View {
	public function confirm($params){
		return $this->buffer_global("fullscreen", [
			"content" => $this->build($this->confirm_buttons(), $params)
		]);
	}
	public function register(){
		return $this->buffer_global("fullscreen", [
			"content" => $this->build($this->register_buttons(), [
				"title"  => "Sign up",
				"prompt" => $this->buffer_layout("signup")
			])
		]);
	}
	private function build($buttons, $params=[]){
		return $this->buffer_layout("popup", 
			["buttons" => $buttons] + $params
		);
	}
	private function confirm_buttons(){
		return join([
			$this->button("No", "popup-cancel cancel"),
			$this->button("Yes", "popup-submit submit")
		]);
	}
	private function register_buttons(){
		return join([
			$this->button("Cancel", "popup-cancel cancel"),
			$this->button("Sign up", "popup-submit submit")
		]);
	}
}
