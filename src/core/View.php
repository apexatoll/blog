<?php namespace core;

class View {
	use traits\ClassParser;
	use traits\ViewPaths;
	public function __construct(){
		$this->set_classes();
	}
	protected function set_classes(){
		$this->group = $this->get_group_name();
	}
	protected function buffer($file, $vars=[]){
		ob_start();
		$this->render($file, $vars);
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
}
