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
				$series['title'].
				$this->span($this->icon_a("caret-square-right", "/series/".$series['title']), ["class"=>"read-more"]),
				$this->get_posts($series['title'])
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
		);
		echo $this->_div();
		echo $this->_div();
	}
	private function posts(){
		$this->posts ??= (new \models\Post);
		return $this->posts;
	}
	private function get_posts($title){
		return $this->posts()->find_all(
			//["series"=>$title, "published"=>1], 
			["series"=>$title], 
			["order"=>["course_index"=>"asc"]]
		);
	}
	protected function series_header($series){
		//print_r($series);
		return $this->subclass("Header", $series)->make();
	}
}
