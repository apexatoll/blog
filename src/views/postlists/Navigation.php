<?php namespace views\postlists;

class Navigation extends \core\View {
	protected $root, $page, $pages, $show;
	public function make(){
		return 
			$this->first().
			$this->prev().
			$this->current_page().
			$this->next().
			$this->last();
	}
	private function on_first_page(){
		return $this->page == 1;
	}
	private function on_last_page(){
		return $this->page == $this->pages;
	}
	private function first(){
		return $this->make_button(
			!$this->on_first_page(), "angle-double-left", 1
		);
	}
	private function prev(){
		return $this->make_button(
			!$this->on_first_page(), "angle-left", $this->page - 1
		);
	}
	private function current_page(){
		return $this->span($this->page, ["class"=>"page"]);
	}
	private function next(){
		return $this->make_button(
			!$this->on_last_page(), "angle-right", $this->page + 1
		);
	}
	private function last(){
		return $this->make_button(
			!$this->on_last_page(), "angle-double-right", $this->pages
		);
	}
	private function make_button($active, $icon, $page){
		return $active ?
			$this->active($icon, $page) :
			$this->inactive($icon, $page);
	}
	private function active($icon, $page){
		return $this->button_link(
			$this->icon($icon), 
			$this->link($page)
		);
	}
	private function inactive($icon){
		return $this->button(
			$this->icon($icon), 
			["class"=>"inactive"]
		);
	}
	private function link($page){
		return implode(
			$this->glue(),
			[$this->root, $this->GET_str($page)]
		);
	}
	private function glue(){
		return strpos($this->root, "?") ? "&" : "?";
	}
	private function GET_str($page){
		return sprintf("show=%s&page=%s", $this->show, $page);
	}
}
