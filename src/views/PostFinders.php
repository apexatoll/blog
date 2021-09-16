<?php namespace views;

class PostFinders extends \core\View {
	public function categories($tree){
		return $this->build($tree, "categories");
	}
	public function archives($tree){
		return $this->build($tree, "archives");
	}
	public function series($tree){
		return $this->build($tree, "series");
	}
	private function build($tree, $active){
		return $this->buffer_layout("finder", [
			"tree"=>$tree, 
			"bar" => $this->buffer_method("top_bar", $active)
		]);
	}
	protected function top_bar($active){
		foreach($this->bar_items() as $name => $icon)
			echo $active == $name ?
				$this->span($icon, ["class"=>"finder-tab active"]):
				$this->button($icon, ["class"=>"finder-tab update", "id"=>"show-finder-$name"]);
	}
	private function bar_items(){
		return [
			"categories" => $this->icon("folder"),
			"archives" =>  $this->icon("calendar"),
			//"series" =>  $this->icon("book")
		];
	}
}
