<?php namespace views;

class Accordions extends \core\View {
	use traits\ViewModel;
	public function homepage(){
		return $this->buffer_layout("accordion", [
			"sections" => $this->homepage_sections()
		]);
	}
	private function homepage_sections(){
		return [
			"Recents" => $this->model->recents(),
			"Popular" => $this->model->popular()
		];
	}
	protected function section($title, $posts){
		return $this->buffer_layout("section", [
			"title" => $title,
			"posts" => $posts
		]);
	}
	protected function item($post){
		return $this->subclass("Preview", $post)->make();
	}
}
