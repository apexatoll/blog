<?php namespace cfg;

class Autoloader {
	public static function initialize(){
		spl_autoload_register(fn($class)=>self::load($class));
	}
	private static function load($class){
		if(file_exists(self::path($class)))
			require_once(self::path($class));
	}
	private static function path($class){
		return SRC."/".self::parse($class).".php";
	}
	private static function parse($class){
		return str_replace("\\", DIRECTORY_SEPARATOR, $class);
	}
}
