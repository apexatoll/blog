<?php namespace models\traits;

trait MarkdownRefs {
	protected $refs=[];
	private function find_refs(): ?array {
		$regex = "/!\[.*?\]\((.+?)\)/";
		preg_match_all($regex, $this->md, $img);
		return $img[1] ?? null;
	}
	private function update_refs($html, $dir): string {
		foreach($this->find_refs() as $ref)
			$html = $this->update_ref($html, $ref, $dir);
		return $html;
	}
	private function update_ref($html, $ref, $dir): string {
		return preg_replace(
			"/src=\"$ref\"/", "src=\"$dir/$ref\"", $html
		);
	}
}
