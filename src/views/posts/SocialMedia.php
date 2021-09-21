<?php namespace views\posts;

class SocialMedia extends \core\View {
	protected $id, $title;
	public function build(){
		return $this->buffer_layout("social");
	}
	protected function reddit(){
		return $this->icon_a("reddit", "", [
			"class"=>"reddit",
			"href"=>"https://www.reddit.com/submit?url=".$this->url()."&title=".urlencode($this->title)
		]);
	}
	protected function facebook(){
		return $this->icon_a("facebook", "", [
			"class"=>"facebook",
			"href"=>"https://www.facebook.com/sharer/sharer.php?u=".$this->url()."&amp;src=sdkpreparse"
		]);
	}
	protected function twitter(){
		return $this->icon_a("twitter", "", [
			"class"=>"twitter",
			"href"=>"https://twitter.com/share?ref_src=twsrc%5Etfw"
		]);
	}
	protected function pinterest(){
		return $this->icon_a("pinterest", "", [
			"class"=>"pinterest", 
			"href"=>"http://pinterest.com/pin/create/link/?url=".$this->url()
		]);
	}
	protected function icon_a($icon, $href, $attr=[]){
		return $this->a($this->span(null, ["class"=>"fab fa-$icon"]), ["class"=>$icon] + $attr);
	}
	private function url(){
		return urlencode("https://www.bristolcode.co.uk/posts/$this->id");
	}
}
