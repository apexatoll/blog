<?php namespace models;

class Series extends Post {
	public function published(){
		return $this->find_all(["published"=>1]);
	}
	public function set_order($id, $i){
		(new Post)->load(["id"=>$id])
			->set(["course_index"=>$i+1])->save();
	}
}
