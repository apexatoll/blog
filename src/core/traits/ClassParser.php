<?php namespace core\traits;

trait ClassParser {
	private function reflect(){
		$this->reflect ??= new \ReflectionClass(get_class($this));
		return $this->reflect;
	}
	private function get_group_name(){
		return $this->is_root_class() ?
			$this->class_name():
			$this->namespace_name();
	}
	private function is_root_class(){
		return in_array(
			$this->reflect()->getNamespaceName(), 
			[MODEL_NS, VIEW_NS, CTRL_NS]
		);
	}
	private function parse_name($ref_method){
		return preg_replace(
			"/^.*?\\\/", "", $this->reflect()->$ref_method()
		);
	}
	private function class_name(){
		return $this->parse_name("getName");
	}
	private function namespace_name(){
		return ucwords($this->parse_name("getNamespaceName"));
	}
	private function unchanging(){
		return ["Series", "Auth"];
	}
	private function to_singular(){
		return in_array($this->group, $this->unchanging()) ?
			$this->group :
			preg_replace("/ie$/", "y", preg_replace("/s$/", "", $this->group));
	}
}
