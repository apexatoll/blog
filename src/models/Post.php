<?php namespace models;

use \core\files\PostDir as PostDir;

class Post extends \core\Validate {
	use traits\Files;
	protected $id, $title, $md, $html, $author, $posted;
	protected $categories, $tags, $series, $viewcount;
	protected $commentcount, $images, $published;
	protected $course_index;
	protected $subtitle;
	protected function columns(): array {
		return [
			"title", "md", "html", "author", "posted", 
			"categories", "tags", "series", "viewcount", 
			"commentcount", "published", "course_index", "subtitle"
		];
	}
	protected function new_rules(){
		return [
			self::RULE_REQ  => ["title","categories","tags","md"],
			self::RULE_REF  => ["refs"=>"refs","field"=>"images"]
		];
	}
	protected function edit_rules(){
		return [
			self::RULE_REQ  => ["title","categories","tags","md"],
			self::RULE_REF  => ["refs"=>"refs","field"=>"images"]
		];
	}
	protected function input_new(){
		//$this->val_can_post();
		$this->set_files();
		$this->handle_markdown();
		$this->set_meta();
	}
	protected function input_edit(){
		//$this->val_is_author($this->author);
		//echo "edit method";
		//print_r($this->files);
		$this->set_files();
		$this->handle_markdown();
		$this->update_posted();
	}
	public function load($where=null, $opts=[]){
		parent::load($where, $opts);
		//if($this->published == 0)
			//$this->validate_admin();
		$this->set_files();
		return $this;
	}
	public function build_with_images(){
		return $this->build_with_id() + ["images"=>$this->images];
	}
	private function file_dir(): object {
		return new PostDir($this->dir_name());
	}
	private function dir_name(): string {
		return str_pad($this->id, 4, "0", STR_PAD_LEFT);
	}
	protected function insert($values){
		parent::insert($values);
		$this->save();
		return $this->id;
	}
	protected function update($values, $where=null, $opts=[]){
		$this->transfer_files();
		if(count($this->files) != 0)
			$values['html'] = $this->update_refs(
			$this->html, $this->file_dir()->rel_path());
		return parent::update($values, $where, $opts);
	}
	protected function handle_markdown(): void {
		$this->refs = $this->find_refs();
		$this->html = $this->to_html($this->md);
	}
	private function set_meta(): void {
		$this->author = $this->session()->username;
		$this->update_posted();
	}
	private function update_posted(): void {
		$this->posted = $this->time_now();
	}
	public function update_views(){
		$this->viewcount++;
		$this->save();
	}
	public function publish_with_date(){
		$this->published = 1;
		$this->update_posted();
		$this->save();
	}
	public function publish(){
		$this->published = 1;
		$this->save();
	}
	public function unpublish(){
		$this->published = 0;
		$this->save();
	}
	public function is_public(){
		return $this->published == 1;
	}
	public function delete_file($file){
		$this->file_dir()->find($file)->delete();
		//echo "delete file method";
		//print_r($this->files);
		return $this;
	}
	public function index_posts($params){
		foreach($params['order'] as $i => $id)
			$this->flush()->load($id)->set(["course_index"=>$i])->save();
			$this->set(["id"=>$params['id'], "course_index"=>$i])->save();
	}
}
