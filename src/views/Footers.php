<?php namespace views;

class Footers extends \core\View {
	public function footer($menu, $vars=[]){
		return $this->buffer_layout("footer", [
			"footer"=>$this->buffer_file($menu, $vars)
		]);
	}
	protected function guest_span(){
		return $this->prompt("user-slash");
	}
	protected function cancel(){
		return $this->button("cancel", "footer-show-default cancel");
	}
	private function prompt($icon, $inner=null){
		return $this->span(
			$this->icon($icon).$inner, ["class"=>"prompt"]
		);
	}
	protected function user_span(){
		return $this->prompt("user", 
			$this->span($this->session->username, ["class"=>"user"])
		);
	}
}
