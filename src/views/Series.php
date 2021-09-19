<?php namespace views;

class Series extends Posts {
	use traits\Trees;
	public function series($series){
		$this->page_from_file("series", $series['title'], "posts", $series);
	}
	protected function all(){
		echo $this->div("tree");
		foreach($this->model->published() as $series){
			$this->node(
				$series['title'], $this->get_posts($series['title']));
			echo $this->span(
				$this->icon_a("caret-square-right", "/series/".$series['title']),
				["class"=>"read-more"]
			);
			echo $this->_div();
		}
		echo $this->_div();
	}
	private function get_posts($title){
		return $this->posts->find_all(
			["series"=>$title, "published"=>1], 
			["order"=>["course_index"=>"asc"]]
		);
	}
}
