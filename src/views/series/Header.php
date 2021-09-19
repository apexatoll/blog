<?php namespace views\series;

class Header extends \views\posts\Header {
	protected function sort(){
		return $this->icon_a("sort", "/series/sort/$this->id");
	}
}
