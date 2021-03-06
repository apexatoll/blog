<?php namespace core;

class Tags extends HTML {
	protected function div($attr=[]){
		return $this->tag("div", $attr);
	}
	protected function _div(){
		return $this->_tag("div");
	}
	protected function li($text, $attr=[]){
		return $this->inline("li", $text, $attr);
	}
	protected function a($text, $attr=[]){
		return $this->inline("a", $text, $attr);
	}
	protected function span($text, $attr=[]){
		return $this->inline("span", $text, $attr);
	}
	protected function h($n, $text, $attr=[]){
		return $this->inline("h$n", $text, $attr);
	}
	protected function button($text, $attr=[]){
		return $this->inline("button", $text, $attr);
	}
	protected function css($file){
		return $this->tag("link", 
			["rel"=>"stylesheet", "href"=>CSS_DIR."/$file"]
		);
	}
	protected function icon($icon){
		return $this->span(null, ["class"=>"fas fa-$icon"]);
	}
	protected function script($file, $attr=[]){
		return $this->inline("script", 
			null, ["src"=>JS_DIR."/$file.js"]+$attr, ["defer"]
		);
	}
	protected function input($type, $attr=[], $opts=[]){
		return $this->tag("input", ["type"=>$type]+$attr, $opts);
	}
	protected function textarea($text=null, $attr=[]){
		return $this->inline("textarea", $text, $attr);
	}
}
