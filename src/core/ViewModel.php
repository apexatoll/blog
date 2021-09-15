<?php namespace core;

class ViewModel extends View {
	use traits\ObjectMaker;
	protected const NS = VIEW_NS;
	public function __construct(){
		parent::__construct();
		$this->m_cls = $this->to_singular();
		$this->model = $this->load_model();
	}
}
