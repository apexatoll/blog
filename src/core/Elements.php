<?php namespace core;

class Elements extends Tags {
	protected function box($title=null, $class=null, $content=true){
		$class = $class ? "box $class" : "box";
		return join([
			$this->div($class),
			$this->h(2, $title),
			$content ? $this->div("content") : null
		]);
	}
	protected function _box(){
		return join([
			$this->_div(),
			$this->_div()
		]);
	}
}
