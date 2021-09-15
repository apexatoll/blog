<?php namespace core;

class View extends Elements {
	use traits\ClassParser;
	use traits\SubClass;
	use traits\ViewPaths;

	private const NS = VIEW_NS;

	public function __construct($params=[]){
		$this->group = $this->get_group_name();
		if(!$this->is_root_class())
			$this->set($params);
	}
	protected function buffer($file, $vars=[]){
		ob_start();
		$this->render($file, $vars);
		return ob_get_clean();
	}
	protected function buffer_layout($file, $vars=[]){
		return $this->buffer($this->layout_path($file), $vars);
	}
	protected function buffer_file($file, $vars=[]){
		return $this->buffer($this->class_path($file), $vars);
	}
	protected function buffer_method($method, $vars=[]){
		ob_start();
		if(is_object($method) && get_class($method) == "Closure")
			call_user_func_array($method, [$vars]);
		elseif(is_string($method))
			call_user_func_array([$this, $method], [$vars]);
		return ob_get_clean();
	}
	protected function render($file, $vars=[]){
		foreach($vars as $key => $val)
			$$key = $val;
		require($file);
	}
	protected function render_layout($file, $vars=[]){
		$this->render($this->layout_path($file), $vars);
	}
	protected function render_page($content, $title, $active, $layout="main"){
		$this->render($this->page_layout_path($layout), [
			"title"   => $title,
			"active"  => $active,
			"content" => $content
		]);
	}
}
