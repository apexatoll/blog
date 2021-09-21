<?php namespace views\series;

class Form extends \views\posts\Form {
	public function edit(){
		return $this->buffer_layout("series-form", [
			"heading" => "edit series",
			"form_id" => "edit-series",
			"buttons" => $this->edit_buttons(),
			"images"  => $this->images()
		]);
	}
	protected function edit_buttons(){
		return join([
			$this->a("cancel", ["href" => "/series/".preg_replace("/ /", "-", $this->title), "class"=>"cancel"]), 
			$this->button("submit", ["class"=>"series-edit-submit submit"])
		]);
	}

}
