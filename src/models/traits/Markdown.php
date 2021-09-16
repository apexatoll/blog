<?php namespace models\traits;

use \core\parser\GithubMarkdown as Converter;

trait Markdown {

	use MarkdownRefs;
	use MarkdownParser;

	private function to_html($markdown): ?string {
		return (new Converter)->parse($markdown);
	}
	private function parse_markdown(string $md){
		$this->lines = explode("\n", $md);
		return $this->post_without_meta() + $this->meta();
	}
}
