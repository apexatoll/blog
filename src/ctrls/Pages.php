<?php namespace ctrls;

class Pages extends \core\Controller {
	public function index(){
		$this->view->page_from_file("index", "home");
	}
	public function about(){
		$this->view->page_from_file("about");
	}
	public function contact(){
		$name  = $this->session->name  ?? null;
		$email = $this->session->email ?? null;
		$this->view->page_from_file("contact", "contact", "contact", ["name"=>$name, "email" => $email]);
	}
	public function not_found($uri){
		$this->view->page_from_file("_404", "404", null, ["uri"=>$uri]);
	}
	public function forbidden(){
		$this->view->page_from_file("forbidden");
	}
}
