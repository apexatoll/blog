<?php namespace core;

class Session {
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
}
