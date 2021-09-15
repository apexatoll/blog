<?php namespace ctrls;

class Auth extends \core\Controller {
	public function login($data){
		$this->model
			->input($data)->validate()
			->load()->validate()
			->login();
		return "redirecting...";
	}
}
