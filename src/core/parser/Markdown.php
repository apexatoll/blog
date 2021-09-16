<?php namespace core\parser;

class Markdown extends Parser
{
	use block\CodeTrait;
	use block\HeadlineTrait;
	use block\HtmlTrait {
		parseInlineHtml as private;
	}
	use block\ListTrait {
		identifyUl as protected identifyBUl;
		consumeUl as protected consumeBUl;
	}
	use block\QuoteTrait;
	use block\RuleTrait {
		identifyHr as protected identifyAHr;
		consumeHr as protected consumeAHr;
	}
	use inline\CodeTrait;
	use inline\EmphStrongTrait;
	use inline\LinkTrait;
	public $html5 = false;
	protected $escapeCharacters = [
		'\\', // backslash
		'`', // backtick
		'*', // asterisk
		'_', // underscore
		'{', '}', // curly braces
		'[', ']', // square brackets
		'(', ')', // parentheses
		'#', // hash mark
		'+', // plus sign
		'-', // minus sign (hyphen)
		'.', // dot
		'!', // exclamation mark
		'<', '>',
	];
	protected function prepare()
	{
		$this->references = [];
	}
	protected function consumeParagraph($lines, $current)
	{
		$content = [];
		for ($i = $current, $count = count($lines); $i < $count; $i++) {
			$line = $lines[$i];
			if (isset($this->context[1]) && $this->context[1] === 'list' && !ctype_alpha($line[0]) && (
				$this->identifyUl($line, $lines, $i) || $this->identifyOl($line, $lines, $i))) {
				break;
			}

			if ($line === '' || ltrim($line) === '' || $this->identifyHeadline($line, $lines, $i)) {
				break;
			} elseif ($line[0] === "\t" || $line[0] === " " && strncmp($line, '    ', 4) === 0) {
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
	protected function renderText($text)
	{
		return str_replace("  \n", $this->html5 ? "<br>\n" : "<br />\n", $text[1]);
	}
}
