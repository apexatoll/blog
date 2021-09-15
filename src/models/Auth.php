<?php namespace models;

class Auth extends \core\Validate {
	protected $id, $username, $password_attempt, $password;
	public function __construct(){
		parent::__construct("users");
	}
	protected function new_rules(){
		return [
			self::RULE_REQ => ["username", "password_attempt"]
		];
	}
	protected function edit_rules(){
		return [];
	}
	public function load($where=null, $opts=[]){
		$user = $this->find([
			"username"=>$this->username, 
			"email"=>$this->username], 
			["op"=>" OR "]
		) ?? $this->error("user not found");
		$this->set($user);
		return $this;
	}
	public function validate(){
		parent::validate();
		if(!$this->is_new())
			$this->validate_password($this->password_attempt, $this->password);
		return $this;
	}
	public function login(){
		\core\Session::start(["id"=>$this->id]);
	}
}
