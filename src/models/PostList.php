<?php namespace models;

class PostList extends \core\Model {
	protected $page, $show, $where, $root, $weight, $search, $order;
	public function __construct(){
		parent::__construct("posts");
	}
	protected function columns(){
		return [
			"search", "page", "show", "posts", "total", "pages", "root"
		];
	}
	protected function input_new(){
		$this->set_page_params();
		//isset($this->search) ?
			//$this->build_search():
			$this->build_list();
		$this->pages = $this->count_pages();
	}
	//private function build_search(){
		//$this->posts = $this->search_items($this->opts());
		//$this->total = $this->count_search();
		//$this->root .= "?search=".$this->search;
	//}
	private function build_list(){
		$this->posts = $this->find_all($this->where, $this->opts());
		$this->total = $this->count($this->where);
	}
	//private function search_items($opts=[]){
		//return $this->search($this->search, $this->where, $opts);
	//}
	//private function count_search(){
		//return count($this->search_items());
	//}
	private function set_page_params(){
		$this->page ??= 1;
		$this->show ??= 10;
		$this->offset = $this->calc_offset();
	}
	private function calc_offset(){
		return ($this->page - 1) * $this->show;
	}
	private function count_pages(){
		return ($count = ceil($this->total/$this->show)) > 0 ?
			$count : 1;
	}
	private function opts(){
		return [
			"order"  => ($this->order??[])+["posted"=>"DESC"],
			"limit"  => $this->show,
			"offset" => $this->offset
		];
	}
	//protected function weight(){
		//return [
			//"title" => 0.8,
			//"md" => 0.4,
			//"tags" => 0.8,
			//"categories" => 0.4
		//];
	//}
}
