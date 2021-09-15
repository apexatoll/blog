<?php namespace views\posts;

class SocialMedia extends \core\View {
	public function build(){
		return $this->buffer_layout("social");
	}
	protected function reddit(){
		return $this->icon_a("reddit", "");
	}
	protected function facebook(){
		return $this->icon_a("facebook", "");
	}
	protected function twitter(){
		return $this->icon_a("twitter", "");
	}
	protected function pinterest(){
		return $this->icon_a("pinterest", "");
	}
	protected function icon_a($icon, $href, $attr=[]){
		return $this->a($this->span(null, ["class"=>"fab fa-$icon"]), ["class"=>$icon] + $attr);
	}
}
