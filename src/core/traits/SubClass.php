<?php namespace core\traits;

trait SubClass {
	protected function subclass($class, $params=[], $dir=null){
		return new (
			$this->subclass_str($class, $dir ?? strtolower($this->group))
		)($params);
	}
	protected function subclass_str($class, $namespace){
		return sprintf("\\%s\\%s\\%s", self::NS, $namespace, $class);
	}
	private function set($params){
		foreach($params as $key => $val)
			if($val && property_exists($this, $key))
				$this->$key = $val;
	}
}
