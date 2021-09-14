<?php namespace views;

class Pages extends \core\View {
	public function page($file, $title=null, $active=null, $vars=[]){
		$this->render_page(
			$title  ?? $file,
			$active ?? $title ?? $file,
			$this->buffer_file($file, $vars)
		);
	}
	protected function render_page($title, $active, $content, $layout="main"){
		$this->render($this->page_layout($layout), [
			"title"   => $title,
			"active"  => $active,
			"content" => $content
		]);
	}
	protected function header($location){
		return $this->subclass("Header", ["location"=>$location], "pages")->build();
	}
	private function page_layout($file){
		return $this->path(VIEW_PATH."/".PAGE_DIR."/layouts", $file);
	}
}
