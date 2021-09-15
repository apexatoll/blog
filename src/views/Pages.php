<?php namespace views;

class Pages extends \core\View {
	public function page_from_file($file, $title=null, $active=null, $vars=[], $layout="main"){
		$this->render_page(
			$this->buffer_file($file, $vars),
			$title  ?? $file,
			$active ?? $title ?? $file,
			$layout
		);
	}
	public function page_from_str($string, $title, $active=null, $layout="main"){
		$this->render_page(
			$string, $title, $active ?? $title, $layout
		);
	}
	protected function header($location){
		return $this->subclass("Header", ["location"=>$location], "pages")->build();
	}
	protected function stylesheets(){
		foreach(STYLES as $file)
			echo $this->css($file);
	}
	protected function scripts(){
		foreach(SCRIPTS as $key => $val)
			echo $key ? 
			$this->script($key, $val):
			$this->script($val);
	}
	protected function footer(){
		return (new \ctrls\Footers)->default();
	}
}
