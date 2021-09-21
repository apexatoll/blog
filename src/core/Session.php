<?php namespace core;

class Session {
	public $id, $username, $type, $bookmarks, $name;
	public function __construct(){
		if(isset($_SESSION['id']))
			$this->set();
		$this->bookmarks = isset($this->bookmarks) ?
			explode(", ", $this->bookmarks) : [];
	}
	public static function start($data){
		self::end();
		foreach($data as $key => $val)
			$_SESSION[$key] = $val;
	}
	public static function end(){
		session_destroy();
		session_unset();
		session_start();
	}
	public function logged_in(){
		return isset($this->{PRIMARY_KEY});
	}
	public function is_admin(){
		return $this->type == "admin";
	}
	public function can_post(){
		return $this->type == "admin" || $this->type == "poster";
	}
	public function is_author($author){
		return $this->username === $author;
	}
	public function can_edit($author){
		return $this->is_admin() || $this->is_author($author);
	}
	private function set(){
		$user = (new \models\User)->find(["id"=>$_SESSION['id']]);
		foreach($user as $col => $val)
			if($val && property_exists($this, $col))
				$this->$col = $val;
	}
}
