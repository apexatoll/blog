<?php namespace views\series;

class Form extends \views\posts\Form {
	public function new(){
		return $this->buffer_layout("series-form", [
			"heading" => "new series",
			"form_id" => "new-series",
			"buttons" => $this->new_buttons()
		]);
	}
	public function edit(){
		return $this->buffer_layout("series-form", [
			"heading" => "edit series",
			"form_id" => "edit-series",
			"buttons" => $this->edit_buttons(),
			"images"  => $this->images()
		]);
	}
	private function new_buttons(){
		return join([
			$this->button("cancel", ["class"=>"go-back cancel"]), 
			$this->button("submit", ["class"=>"series-new-submit submit"])
		]);
	}
	protected function edit_buttons(){
		return join([
			$this->a("cancel", ["href" => "/series/".preg_replace("/ /", "-", $this->title), "class"=>"cancel"]), 
			$this->button("submit", ["class"=>"series-edit-submit submit"])
		]);
	}

}
