<?php namespace views\postlists;

class Selector extends \core\View {
	protected $show, $root;
	public function make(){
		return $this->buffer_layout("selector");
	}
	protected function option($n){
		return $this->inline(
			"option", $n, ["value"=>$n], 
			($this->show == $n ? ["selected"]: [])
		);
	}
}
