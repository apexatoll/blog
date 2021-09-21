<?php namespace ctrls;

class Contacts extends \core\Controller {
	public function submit($data){
		$this->model->input($data)->validate()->submit();
		return "message sent";
	}
}
