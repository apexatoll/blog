<?php namespace models;

class User extends \core\Validate {
	protected $id, $name, $username, $email, $password, $confirm, $bookmarks;
	protected function columns(){
		return ["name", "username", "email", "password", "bookmarks"];
	}
	protected function new_rules(): array {
		return [
			self::RULE_REQ => [
				"name", "username", "email", 
				"password", "confirm" ],
			self::RULE_EMAIL => ["email"],
			self::RULE_MATCH => [
				"passwords" =>["password", "confirm"] ],
			self::RULE_UNIQ => ["username", "email"]
		];
	}
	protected function insert($values){
		$values['password']= $this->hash($values['password']);
		return parent::insert($values);
	}
	private function hash($password){
		return password_hash($password, PASSWORD_DEFAULT);
	}
	public function set($params){
		parent::set($params);
		if(is_string($this->bookmarks))
			$this->bookmarks = explode(", ", $this->bookmarks);
		return $this;
	}
	public function bookmark($post_id){
		return (isset($this->bookmarks) && in_array($post_id, $this->bookmarks)) ?
			$this->rm_bookmark($post_id):
			$this->add_bookmark($post_id);
	}
	public function add_bookmark($post_id){
		$this->bookmarks[]= $post_id;
		$this->bookmarks = implode(", ", $this->bookmarks);
		$this->save();
	}
	public function rm_bookmark($post_id){
		$this->bookmarks = array_diff($this->bookmarks, [$post_id]);
		$this->bookmarks = implode(", ", $this->bookmarks);
		$this->save();
	}
	public function load_current(){
		$this->load(["id"=>$_SESSION['id']]);
		return $this;
	}
}
