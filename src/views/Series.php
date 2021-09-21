<?php namespace views;

class Series extends Posts {
	use traits\Trees;
	use traits\ViewModel;
	public function series($params){
		$this->page_from_file("series", $params['title'], "posts", $params + [
			"tree"   => $this->tree($params['title']),
			"header" => $this->series_header($params)
		]);
	}
	public function tree_all(){
		return $this->buffer_method("all", []);
	}
	public function tree($title){
		return $this->buffer_method("single", ["title"=>$title]);
	}
	protected function all(){
		echo $this->div("tree");
		foreach($this->model->published() as $series){
			$this->node(
				$series['title'],
				$this->get_posts($series['title']),
				"closed", "ul",
				$this->span($this->icon_a("caret-square-right", "/series/".preg_replace("/ /", "-",$series['title'])), ["class"=>"read-more"])
			);
			echo $this->_div();
		}
		echo $this->_div();
	}
	protected function single($title){
		echo $this->div("tree");
		$this->node(
			$title['title'], 
			$this->get_posts($title['title']), 
			"open", "ol"
		);
		echo $this->_div();
		echo $this->_div();
	}
	private function posts(){
		$this->posts ??= (new \models\Post);
		return $this->posts;
	}
	private function get_posts($title){
		$published = $this->session->is_admin() ?
			[] : ["published"=>1];
		return $this->posts()->find_all(
			["series"=>$title] + $published, 
			["order"=>["course_index"=>"asc"]]
		);
	}
	protected function series_header($series){
		return $this->subclass("Header", $series)->make();
	}
	public function sort($series){
		$this->page_from_file("sort", "reorder posts", "posts", [
			"series" => $series, 
			"posts"  => $this->get_posts($series['title'])
		]);
	}
	protected function buffer_reorder_item($post){
		return $this->buffer_layout("sort-item", $post);
	}
	public function edit($series){
		$this->page_from_str($this->subclass("Form", $series)->edit(), "edit series");
	}
	public function new(){
		$this->page_from_str($this->subclass("Form")->new(), "new series");
	}
}
