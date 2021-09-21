<?php namespace views\traits;

trait ViewModel {
	use \core\traits\ObjectMaker;
	public function __construct(){
		parent::__construct();
		$this->m_cls = $this->to_singular();
		$this->model = $this->load_model();
	}
}
