<?php namespace views;

class Footers extends \core\View {
	public function footer($menu, $vars=[]){
		return $this->buffer_layout("footer", [
			"footer"=>$this->buffer_file($menu, $vars)
		]);
	}
}
