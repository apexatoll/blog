<?php namespace core\files;

abstract class File {
	public $path, $name, $type;
	protected const images = ["jpg", "jpeg", "png", "gif"];
	public function __construct($name, $path=null){
		$this->name = $name;
		$this->path = $path ? "$path/$name" : null;
		$this->type = $this->parse_type();
	}
	public function delete(){
		unlink($this->path);
	}
	public function read(){
		return file_get_contents($this->path);
	}
	public function move($dir){
		rename($this->path, $this->make_path($dir));
	}
	protected function make_path($dir){
		return "$dir/$this->name";
	}
	private function parse_type(){
		$type = strtolower(
			preg_replace("/^.*\./", "", $this->name));
		return in_array($type, self::images)? "images": $type;
	}
	public function is_markdown(){
		return $this->type == "md";
	}
}
