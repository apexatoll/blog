<?php namespace models;

class User extends \core\Model {
	protected $id, $name, $username, $email, $password, $confirm;
	protected function columns(){
		return ["name", "username", "email", "password"];
	}
}
