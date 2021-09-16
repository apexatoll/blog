<?php namespace models\traits;

trait MarkdownParser {
	private function post_without_meta(): array {
		return [
			"md"=>$this->extract_section($this->post_anchors())
		] ?? [];
	}
	private function meta(){
		return json_decode(
			$this->extract_section($this->meta_anchors()), true
		) ?? [];
	}
	private function get_line_nr($regex){
		return array_keys(
			preg_grep($regex, $this->lines))[0] ?? null;
	}
	private function extract_section($anchors){
		return implode("\n",
			array_slice($this->lines, ...$anchors)
		);
	}
	private function post_anchors(){
		return [$this->get_line_nr("/^(##|[A-z0-9])/")];
	}
	private function meta_anchors(){
		foreach(["/^\{/", "/^\}/"] as $regex)
			$anch[]= $this->get_line_nr($regex);
		return [$anch[0], $this->calc_length($anch)];
	}
	private function calc_length($anchors){
		return $anchors[1] - $anchors[0] + 1;
	}
}
