<?php namespace core\traits;

trait ViewPaths {
	protected function path($dir, $file){
		return sprintf("%s/%s.php", $dir, $file);
	}
	protected function class_dir(){
		return sprintf("%s/%s", VIEW_PATH, strtolower($this->group));
	}
	protected function class_path($file){
		return $this->path($this->class_dir(), $file);
	}
	protected function layout_path($file){
		return $this->path($this->class_dir()."/layouts", $file);
	}
}
