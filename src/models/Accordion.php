<?php namespace models;

class Accordion extends \core\Model {
	public function __construct(){
		parent::__construct("posts");
	}
	public function recents(){
		return $this->find_all(["published"=>1], ["order"=>["posted"=>"DESC"], "limit"=>"3"]);
	}
	public function popular(){
		return $this->find_all(["published"=>1], ["order"=>["viewcount"=>"DESC"], "limit"=>"3"]);
	}
}
