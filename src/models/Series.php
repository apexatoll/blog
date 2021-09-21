<?php namespace models;

use \core\files\SeriesDir as SeriesDir;

class Series extends Post {
	protected function new_rules(){
		return [
			self::RULE_REQ  => ["title","md"],
			self::RULE_REF  => ["refs"=>"refs","field"=>"images"],
			self::RULE_TAGS => ["title", "md"]
		];
	}
	protected function edit_rules(){
		return [
			self::RULE_REQ  => ["title","md"],
			self::RULE_REF  => ["refs"=>"refs","field"=>"images"],
			self::RULE_TAGS => ["title", "md"]
		];
	}
	protected function input_edit(){
		$this->set_files();
		$this->handle_markdown();
	}
	protected function file_dir(): object {
		return new SeriesDir($this->dir_name());
	}
	public function published(){
		return $this->find_all(["published"=>1]);
	}
	public function set_order($id, $i){
		(new Post)->load(["id"=>$id])
			->set(["course_index"=>$i+1])->save();
	}
}
