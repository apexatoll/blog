<?php namespace core\files;

class PostFile extends File {
	public function delete(){
		unlink($this->path);
	}
	public function rel_path(){
		return preg_replace("/^.*public/", "", $this->path);
	}
}
