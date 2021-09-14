<?php namespace views\pages;

class Header extends \core\View {
	protected $location;
	private const nav_items = [
		"home" => "/",
		"posts" => "/posts",
		"about" => "/about",
		"contact" => "/contact",
	];
	//public function __construct($location){
		//parent::__construct();
		//$this->location = $location;
	//}
	public function build(){
		return $this->buffer_layout("header");
	}
	protected function navbar(){
		foreach(self::nav_items as $page => $href)
			$items[]= $this->nav_item($page, $href, $page==$this->location);
		return join($items);
	}
	private function nav_item($text, $href, $active){
		$attr = ["href"=>$href] + 
			($active ? ["class"=>"active"] : []);
		return $this->a($text, $attr);
	}
}
