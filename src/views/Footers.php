<?php namespace views;

class Footers extends \core\View {
	public function footer($menu, $vars=[]){
		return $this->buffer_layout("footer", [
			"footer"=>$this->buffer_file($menu, $vars)
		]);
	}
	protected function guest_span(){
		return $this->prompt("user-slash");
	}
	protected function new_post(){
		if($this->session->can_post())
			return $this->a("new", "/posts/new");
	}
	//protected function new_series(){
		//if($this->session->can_post())
			//return $this->a("new", "/posts/new");
	//}
	protected function upload(){
		if($this->session->can_post())
			return $this->button("upload", "footer-show-upload");
	}
	protected function cancel(){
		return $this->button("cancel", "footer-show-default cancel");
	}
	protected function publish(){
		if($this->session->is_admin())
			return $this->a("publish", "/posts/unpublished");
	}
	private function prompt($icon, $inner=null){
		return $this->span(
			$this->icon($icon).$inner, ["class"=>"prompt"]
		);
	}
	protected function user_span(){
		return $this->prompt("user", 
			$this->span($this->session->username, ["class"=>"user"])
		);
	}
}
