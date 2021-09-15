<?php namespace ctrls;

class Pages extends \core\Controller {
	public function index(){
		$this->view->page("index", "home");
	}
	public function about(){
		$this->view->page("about");
	}
	public function contact(){
		$this->view->page("contact");
	}
	public function not_found($uri){
		$this->view->page("_404", "404", null, ["uri"=>$uri]);
	}
}
