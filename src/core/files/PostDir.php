<?php namespace core\files;

class PostDir extends Dir {
	public function __construct(string $id){
		$this->id = $id;
	}
	protected function path(): string {
		return sprintf("%s/public%s", ROOT, $this->rel_path());
	}
	public function import(TempDir $temp){
		$this->files = $temp->files;
		foreach($this->files as $file)
			$file->move($this->path());
		$temp->close();
	}
	public function rel_path(){
		return sprintf("%s/posts/%s", POST_DIR, $this->id);
	}
}
