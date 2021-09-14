<?php namespace core;

class HTML {
	protected function tag($tag, $attr=[], $opt=[]){
		return sprintf("<%s%s%s>", 
			$tag, $this->attrs($attr, $tag), $this->opts($opt));
	}
	protected function _tag($tag){
		return "</$tag>";
	}
	protected function inline($tag, $text, $attr=[], $opt=[]){
		return sprintf("%s%s%s", 
			$this->tag($tag, $attr, $opt), $text,
			$this->_tag($tag)
		);
	}
	private function attrs($attrs, $tag){
		if(is_string($attrs))
			$attrs = $tag == "a"? ["href"=>$attrs]: ["class"=>$attrs];
		foreach($attrs as $key => $val)
			$out[]= "$key='$val'";
		return isset($out) ? " ".implode(" ", $out): null;
	}
	private function opts($opts){
		return empty($opts) ? null : " ".implode(" ", $opts);
	}
}
