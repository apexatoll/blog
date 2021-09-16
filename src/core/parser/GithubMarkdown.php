<?php namespace core\parser;

class GithubMarkdown extends Markdown {
	use block\TableTrait;
	use block\FencedCodeTrait;
	use inline\StrikeoutTrait;
	use inline\UrlLinkTrait;

	public $enableNewlines = false;
	protected $escapeCharacters = [
		'\\', '`', '*', '_', '{', '}', '[', ']', '(', ')', '#', '+', '-', '.', '!', '<', '>', ':', '|', 
	];
	protected function consumeParagraph($lines, $current){
		$content = [];
		for ($i = $current, $count = count($lines); $i < $count; $i++) {
			$line = $lines[$i];
			if ($line === ''
				|| ltrim($line) === ''
				|| !ctype_alpha($line[0]) && (
					$this->identifyQuote($line, $lines, $i) ||
					$this->identifyFencedCode($line, $lines, $i) ||
					$this->identifyUl($line, $lines, $i) ||
					$this->identifyOl($line, $lines, $i) ||
					$this->identifyHr($line, $lines, $i)
				)
				|| $this->identifyHeadline($line, $lines, $i))
			{
				break;
			} elseif ($this->identifyCode($line, $lines, $i)) {
				if (preg_match('~<\w+([^>]+)$~s', implode("\n", $content))) {
					$content[] = $line;
				} else {
					break;
				}
			} else {
				$content[] = $line;
			}
		}
		$block = [
			'paragraph',
			'content' => $this->parseInline(implode("\n", $content)),
		];
		return [$block, --$i];
	}
	protected function renderText($text){
		if($this->enableNewlines){
			$br = $this->html5 ? "<br>\n" : "<br />\n";
			return strtr($text[1], ["  \n" => $br, "\n" => $br]);
		} else {
			return parent::renderText($text);
		}
	}
}
