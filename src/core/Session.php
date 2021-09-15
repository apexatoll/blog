<?php namespace core;

class Session {
	public $id, $username, $type;
	public function __construct(){
		if($id = self::logged_in())
			$this->set($id);
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
	public static function logged_in(){
		return $_SESSION[PRIMARY_KEY] ?? false;
	}
	private function set($id){
		$user = (new \models\User)->find(["id"=>$id]);
		foreach($user as $col => $val)
			if($val && property_exists($this, $col))
				$this->$col = $val;
	}
}
