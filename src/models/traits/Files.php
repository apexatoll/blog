<?php namespace models\traits;

use \core\files\TempDir as TempDir;

trait Files {
	use Markdown;
	protected $files=[];
	private abstract function file_dir(): object;
	private function import_new(){
		if($this->has_no_new_files()) return;
		$this->temp = $this->make_temp();
		$this->temp->make()->import();
		$this->files = $this->temp->files;
	}
	private function has_no_new_files(){
		foreach($this->files as $obj)
			if(is_array($obj))
				return false;
		return true;
	}
	private function transfer_files(){
		if(!isset($this->temp)) return;
		$this->file_dir()->make()->import($this->temp);
	}
	private function make_temp(){
		return new TempDir($this->files);
	}
	private function load_existing(){
		if($this->id === null) return;
		$this->files = array_merge(
			$this->files, $this->file_dir()->load()
		);
	}
	protected function set_files(){
		//echo "set files start";
		//print_r($this->files);
		$this->import_new();
		$this->load_existing();
		foreach($this->files as $file)
			$file->is_markdown()?
				$this->set_markdown($file):
				$this->set_file($file);
		//echo "set files end";
		//print_r($this->files);
	}
	private function set_markdown($md){
		if($this->md === null)
			$this->set($this->parse_markdown($md->read()));
	}
	private function set_file($file){
		$this->{$file->type}[]= $file;
	}
}
