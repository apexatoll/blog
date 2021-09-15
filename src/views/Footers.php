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
		return $this->button("cancel", "footer-show-default");
	}
	private function prompt($icon, $inner=null){
		return $this->span(
			$this->icon($icon).$inner, ["class"=>"prompt"]
		);
	}
}
