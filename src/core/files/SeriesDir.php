<?php namespace core\files;

class SeriesDir extends PostDir {
	protected function path(): string {
		return sprintf("%s/public%s", ROOT, $this->rel_path());
	}
	public function rel_path(){
		return sprintf("%s/series/%s", POST_DIR, $this->id);
	}
	protected function file_class(){
		return "\\core\\files\\PostFile";
	}
}
