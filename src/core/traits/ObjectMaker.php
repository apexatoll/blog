<?php namespace core\traits;

trait ObjectMaker {
	private function model_class_path(){
		return sprintf("%s/%s.php", MODEL_PATH, $this->m_cls);
	}
	private function view_class_path(){
		return sprintf("%s/%s.php", VIEW_PATH, $this->v_cls);
	}
	private function load_model(){
		return file_exists($this->model_class_path()) ?
			$this->make_object(MODEL_NS, $this->m_cls) : null;
	}
	private function load_view(){
		return file_exists($this->view_class_path()) ?
			$this->make_object(VIEW_NS, $this->v_cls) : null;
	}
	private function make_object($namespace, $class){
		return new ($this->object_str($namespace, $class));
	}
	private function object_str($namespace, $class){
		return "\\$namespace\\$class";
	}
}
