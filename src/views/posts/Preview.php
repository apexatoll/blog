<?php namespace views\posts;

class Preview extends \core\View {
	protected $title, $id, $published, $posted, $author, $html, $series;
	public function make(){
		return $this->buffer_layout("preview");
	}
	protected function id(){
		return $this->input("hidden", ["name"=>"id", "value"=>$this->id]);
	}
	protected function link(){
		return $this->a($this->title, ["href"=>"/posts/$this->id"]);
	}
	protected function series(){
		if(isset($this->series))
			return $this->icon_div("book", $this->a($this->series,["href"=>"/series/$this->series"])) ;
	}
	protected function blurb(){
		preg_match("/<p>(.+?)<\/p>/", $this->html, $matches);
		return $matches[0] ?? null;
	}
	protected function bookmark(){
		if($this->session->logged_in())
			return in_array($this->id, $this->session->bookmarks) ?
				$this->bookmark_active():
				$this->bookmark_inactive();
	}
	private function bookmark_active(){
		return $this->icon_button("bookmark", "bookmark active");
	}
	private function bookmark_inactive(){
		return $this->icon_button("bookmark", "bookmark");
	}
}
