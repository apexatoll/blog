<?php namespace models;

class Series extends Post {
	public function published(){
		return $this->find_all(["published"=>1]);
	}
}
