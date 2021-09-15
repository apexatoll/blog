<?php namespace cfg;

class Environment {
	public static function initialize(){
		foreach(self::get_lines(ENV_PATH) as $line)
			self::set_line($line);
	}
	private static function get_lines($path){
		return array_filter(
			explode("\n", file_get_contents($path))
		);
	}
	private static function set_line($line){
		[$key, $val] = self::parse_line($line);
		$_ENV[$key] = $val;
	}
	private static function parse_line($line){
		return preg_split("/\s*=\s/", $line);
	}
}
