<?php namespace core;

class Response {
	public static function success($msg, $opts=[]){
		echo self::build(true, $msg, $opts);
	}
	public static function error($msg, $opts=[]){
		echo self::build(false, $msg, $opts);
	}
	private static function build($success, $msg, $opts){
		return json_encode([
			"success" => $success,
			"message" => $msg,
			"opts" => $opts
		]);
	}
}
