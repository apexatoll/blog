<?php namespace core;

class Controller {
	use traits\ClassParser;
	public function __construct(){
		$this->set_classes();
	}
	protected function set_classes(){
		$this->group = $this->get_group_name();
		$this->m_cls = $this->to_singular();
		$this->v_cls = $this->group;
	}
}
