<?php namespace core\files;

abstract class Dir {
	protected abstract function path():string;
	public function make(){
		if(!$this->exists())
			if(!mkdir($this->path()))
				throw new \Exception("could not create directory");
		return $this;
	}
	protected function exists(){
		return is_dir($this->path());
	}
	public function close(){
		rmdir($this->path());
	}
	public function find($name){
		foreach($this->load() as $file)
			if($file->name == $name)
				return $file;
	}
	public function load(){
		foreach($this->scan() as $file)
			$files[]= $this->file_obj($file);
		return $files ?? [];
	}
	private function scan(){
		return $this->exists() ?
			array_diff(scandir($this->path()), [".", ".."]): [];
	}
	private function file_obj($name){
		return new ($this->file_class())(
			$name, $this->path());
	}
	protected function file_class(){
		return preg_replace("/Dir/", "File", get_class($this));
	}
}
