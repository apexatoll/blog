<?php namespace views\traits;

trait Trees {
	protected function posts(){
		$this->posts ??= new \models\Post;
		return $this->posts;
	}
	protected function node($text, $posts, $class="closed", $type="ul"){
		$this->render_global("node", [
			"class" => $class,
			"posts" => iterator_to_array($this->make_list($posts)),
			"link_button" => $this->link_button(count($posts), $class),
			"node_button" => $this->node_button($text, $class),
			"type" => $type
		]);
	}
	private function make_list($posts){
		foreach($posts as $post)
			yield $this->a($post['title'], ["href"=>"/posts/".$post['id']]);
	}
	private function link_button($count, $class){
		return $this->button("($count)", ["class"=>"toggle-links $class"]);
	}
	private function node_button($text, $class){
		return $this->button($text, ["class"=>"toggle-node $class"]);
	}
}
