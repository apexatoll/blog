<?php namespace core\parser; 

class Post {
	private const POST_COL = "md";
	private array $file;
	public function __construct(string $markdown){
		$this->file = $this->split($markdown);
	}
	private function split($string){
		return explode("\n", $string);
	}
	private function join($array){
		return implode("\n", $array);
	}
	public function parse(){
		return array_merge($this->json(), $this->post());
	}
	private function json(){
		$raw = $this->extract($this->meta_lines());
		return json_decode($raw, true) ?? [];
	}
	private function post(){
		$raw = $this->extract($this->post_lines());
		return [self::POST_COL=>$raw] ?? [];
	}
	private function meta_lines(){
		foreach(["/^\{/", "/^\}/"] as $regex)
			$lines[]= $this->line_nr($regex);
		return [$lines[0], $lines[1]-$lines[0]+1];
	}
	private function post_lines(){
		return [$this->line_nr("/^(##|[A-z0-9])/"), null];
	}
	private function extract($anchors){
		return $this->join(
			array_slice($this->file, ...$anchors)
		);
	}
	private function line_nr($regex){
		return array_keys(
			preg_grep($regex, $this->file)
		)[0] ?? null;
	}
}
