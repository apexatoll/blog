<?php namespace core;

class Elements extends Tags {
	protected function box($title=null, $class=null, $content=true){
		$class = $class ? "box $class" : "box";
		return join([
			$this->div($class),
			$title? $this->h(2, $title) : null,
			$content ? $this->div("content") : null
		]);
	}
	protected function _box(){
		return join([
			$this->_div(),
			$this->_div()
		]);
	}
	protected function button_link($text, $href, $attr=[]){
		return $this->button(
			$this->a($text, ["href"=>$href] + $attr)
		);
	}
	protected function icon_div($icon, $content, $attr=[]){
		return $this->inline("div", 
			sprintf("%s %s", $this->icon($icon), $content),
			$attr
		);
	}
	protected function icon_button($icon, $attr=[]){
		return $this->button($this->icon($icon), $attr);
	}
	protected function icon_a($icon, $href, $text=null){
		return $this->a($this->icon($icon).$text, ["href"=>$href]);
	}
	protected function date($date = null, $text = null){
		return $this->icon_div("clock", $this->format_date($data ?? $this->posted).$text, ["class"=>"date"]);
	}
	protected function user($author=null){
		return $this->icon_div("user", $author ?? $this->author, ["class"=>"user"]);
	}
	protected function format_date($date){
		return strftime(
			"%l:%M %p, %d %b %Y", 
			strtotime($date));
	}
}
