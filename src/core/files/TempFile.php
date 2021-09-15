<?php namespace core\files;

class TempFile extends File {
	public function __construct($name, $tmp_name, $size, $type, $error){
		parent::__construct($name);
		$this->temp = $tmp_name;
		$this->size = $size;
	}
	public function move($dir){
		isset($this->path) ?
			parent::move($dir) :
			$this->import($dir);
	}
	private function import($dir){
		$this->path = $this->make_path($dir);
		move_uploaded_file($this->temp, $this->path);
	}
}
