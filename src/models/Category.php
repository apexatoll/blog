<?php namespace models;

class Category extends \core\Model {
	protected $id, $name, $parent, $refs, $count, $icon;
	protected function columns(){
		return ["id","name","parent","refs","count","icon"];
	}
	public function set($params){
		parent::set($params);
		if(isset($this->refs) && is_string($this->refs))
			$this->refs = explode(", ", $this->refs);
		return $this;
	}
	public function build(){
		$this->count = count($this->refs);
		$this->refs  = implode(", ", $this->refs);
		return parent::build();
	}
	public function update_refs($post){
		$post_data = [$post['categories'], $post['id']];
		$post['published'] ?
			$this->reference(...$post_data):
			$this->dereference(...$post_data);
	}
	private function reference($cats, $ref, $parent="ROOT"){
		foreach($this->split($cats) as $name){
			$data   = $this->search_data($name, $parent);
			$parent = $this->flush()->load($data)->is_new() ?
				$this->set($data+["refs"=>[$ref]])->save():
				$this->add_ref($ref);
		}
	}
	private function dereference($cats, $ref, $parent="ROOT"){
		foreach($this->split($cats) as $name){
			$data   = $this->search_data($name, $parent);
			$parent = $this->flush()->load($data)->rm_ref($ref);
		}
	}
	private function search_data($name, $parent){
		return ["name" => $name, "parent" => $parent];
	}
	private function add_ref($post_id){
		$this->refs[]= $post_id;
		return $this->save();
	}
	private function rm_ref($post_id){
		$this->refs = array_diff($this->refs, [$post_id]);
		count($this->refs) > 0 ?
			$this->save():
			$this->destroy();
		return $this->id;
	}
	private function split($categories){
		return explode(">", $categories);
	}
	public function children($parent){
		return $this->find_all(["parent"=>$parent]);
	}
}
