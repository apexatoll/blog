<?php namespace views;

class Categories extends \core\ViewModel {
	use traits\Trees;
	public function tree(){
		return $this->buffer_method("build", "ROOT");
	}
	protected function build($parent){
		echo $this->div(["class"=>"tree"]);
		$this->nodes($parent);
	}
	protected function nodes($parent){
		foreach($this->model->children($parent) as $child){
			$this->node(
				$child['name'], $this->get_posts($child['refs']));
			$this->nodes($child['id']);
		}
		echo $this->_div();
	}
	private function get_posts($refs){
		foreach(explode(", ", $refs) as $id)
			$posts[]= $this->posts()->find(["id"=>$id]);
		return $posts;
	}
}
