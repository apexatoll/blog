<?php namespace views;

class Pages extends \core\View {
	public function page($file, $title=null, $active=null, $vars=[], $layout="main"){
		$this->render_page(
			$this->buffer_file($file, $vars),
			$title  ?? $file,
			$active ?? $title ?? $file,
			$layout
		);
	}
	protected function header($location){
		return $this->subclass("Header", ["location"=>$location], "pages")->build();
	}
	protected function footer(){
		return (new \ctrls\Footers)->default();
	}
}
