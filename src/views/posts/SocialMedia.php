<?php namespace views\posts;

class SocialMedia extends \core\View {
	public function build(){
		return $this->buffer_layout("social");
	}
	protected function reddit(){
		return $this->icon_a("reddit", "", ["class"=>"reddit"]);
	}
	protected function facebook(){
		return $this->icon_a("facebook", "", ["class"=>"facebook"]);
	}
	protected function twitter(){
		return $this->icon_a("twitter", "", ["class"=>"twitter"]);
	}
	protected function pinterest(){
		return $this->icon_a("pinterest", "", ["class"=>"pinterest"]);
	}
	protected function icon_a($icon, $href, $attr=[]){
		return $this->a($this->span(null, ["class"=>"fab fa-$icon"]), ["class"=>$icon] + $attr);
	}
}
