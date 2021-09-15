<?php namespace models;

class Comment extends \core\Validate {
	protected $id, $body, $post_id, $posted, $author, 
		$parent, $edited, $deleted;
	protected function new_rules(){
		return [
			self::RULE_REQ => ["body", "post_id"]
		];
	}
	protected function columns(){
		return [
			"body", "post_id", "posted", "author", 
			"parent", "edited", "deleted"
		];
	}
	protected function input_new(){
		//$this->val_logged_in();
		//$this->author = $this->current_user();
		$this->posted = $this->time_now();
		$this->parent ??= "ROOT";
	}
	protected function input_edit(){
		$this->edited = $this->time_now();
	}
	public function destroy(){
		$this->has_replies() ?
			$this->soft_delete(): 
			parent::destroy();
	}
	private function has_replies(){
		return $this->count(["parent"=>$this->id]) > 0;
	}
	private function soft_delete(){
		$this->author  = "deleted";
		$this->body    = "deleted";
		$this->deleted = true;
		$this->save();
	}
}
