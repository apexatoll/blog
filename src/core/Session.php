<?php namespace core;

class Session {
	public $id, $username, $type;
	public function __construct(){
		if(isset($_SESSION['id']))
			$this->set();
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
	public function can_post(){
		return $this->type == "admin" || $this->type == "poster";
	}
	private function set(){
		$user = (new \models\User)->find(["id"=>$_SESSION['id']]);
		foreach($user as $col => $val)
			if($val && property_exists($this, $col))
				$this->$col = $val;
	}
}
