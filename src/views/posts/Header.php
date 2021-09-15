<?php namespace views\posts;

class Header extends Preview {
	protected $categories, $tags, $comment_count, $viewcount, $published, $author;
	public function make(){
		return $this->buffer_layout("header");
	}
	protected function unpublished(){
		if(!$this->published)
			return $this->icon_div("eye-slash", "unpublished", ["class"=>"unpublished"]);
	}
	protected function categories(){
		return $this->icon_div("project-diagram", $this->parse_categories(), ["class"=>"categories"]);
	}
	protected function tags(){
		return $this->icon_div("tags", $this->parse_tags(), ["class"=>"tags"]);
	}
	protected function publish(){
		if($this->session->is_admin())
			return $this->published ?
				$this->icon_button("eye-slash", "$this->group-unpublish"):
				$this->icon_button("eye", "$this->group-publish");
	}
	protected function delete(){
		if($this->session->is_admin())
			return $this->icon_button("trash-alt", "$this->group-delete cancel");
	}
	protected function edit(){
		if($this->session->can_edit($this->author))
			return $this->icon_a("edit", "/$this->group/edit/$this->id");
	}
	protected function views(){
		return $this->icon_div("mouse-pointer", $this->viewcount." views");
	}
	protected function comments(){
		$count = $this->comment_count ?? 0;
		return $this->icon_div("comments", "$count comments");
			//$this->a("$count comments", ["href"=>"#comments"]));
	}
	private function parse_categories(){
		foreach(explode(">", $this->categories) as $category)
			$links[]= $this->search_link($category);
		return implode(" ".$this->icon("angle-right")." ", $links);
	}
	private function parse_tags(){
		foreach(explode(", ", $this->tags) as $tag)
			$links[]= $this->search_link($tag);
		return implode(", ", $links);
	}
	private function search_link($term){
		$root = $this->published ?
			"/posts?search=" :
			"/posts/unpublished?search=";
		return $this->a($term, [
			"href" => $root.$this->make_search($term)
		]);
	}
	private function make_search($term){
		return preg_replace("/[\s]/", "+", $term);
	}
	protected function share(){
		return (new \views\posts\SocialMedia)->build();
	}
}
