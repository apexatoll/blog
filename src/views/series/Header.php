<?php namespace views\series;

class Header extends \views\posts\Header {
	protected function sort(){
		if($this->session->is_admin())
		return $this->icon_a("sort", "/series/sort/$this->id");
	}
	protected function edit(){
		if($this->session->is_admin())
			return $this->icon_a("edit", "/$this->class/edit/$this->id");
	}
}
