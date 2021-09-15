<?php namespace views;

class PostLists extends \core\View {
	public function list($params){
		return $this->buffer_layout("list", $params+[
			"bottom_bar"=>$this->bottom($params),
			"top_bar"=>$this->top($params)
		]);
	}
	protected function top($params){
		return $this->buffer_layout("top-bar", $params);
	}
	protected function bottom($params){
		return $this->buffer_layout("bottom-bar", [
			"navigation" => $this->navigation($params),
			"selector" => $this->selector($params)
		]);
	}
	//protected function search_results($search, $total){
		//if(isset($search))
			//return $this->buffer_layout("search", ["search"=>$search, "total"=>$total]);
	//}
	protected function preview($post){
		return (new posts\Preview($post))->make();
	}
	private function navigation($params){
		return $this->subclass("Navigation", $params)->make();
	}
	private function selector($params){
		return $this->subclass("Selector", $params)->make();
	}
	//protected function search_form($root){
		//return $this->buffer_frag("search-form", ["root"=>$root]);
	//}
}
