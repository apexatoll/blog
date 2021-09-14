<?php namespace core;

class Controller {
	use traits\ClassParser;
	use traits\ObjectMaker;
	public function __construct(){
		$this->set_classes();
		$this->model = $this->load_model();
		$this->view  = $this->load_view();
	}
	protected function set_classes(){
		$this->group = $this->get_group_name();
		$this->m_cls = $this->to_singular();
		$this->v_cls = $this->group;
	}
}
