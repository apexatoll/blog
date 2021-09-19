<?php namespace views;

class Series extends Posts {
	public function series($params){
		$this->page_from_file("series", $params['title'], "posts", $params);
	}
}
