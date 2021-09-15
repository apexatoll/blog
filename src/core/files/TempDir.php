<?php namespace core\files;

class TempDir extends Dir {
	public function __construct($files){
		$this->hash = $this->gen_hash();
		$this->files = iterator_to_array($this->build($files));
	}
	protected function path(): string {
		return sprintf("%s/%s", TMP_DIR, $this->hash);
	}
	public function import(){
		foreach($this->files as $file)
			$file->move($this->path());
	}
	private function build(array $files){
		foreach($this->transpose($files) as $file)
			yield new TempFile(...$file);
	}
	private function transpose(array $files){
		foreach($files as $key => $subarr)
			foreach($subarr as $subkey => $subval)
				$out[$subkey][$key] = $subval;
		return $out;
	}
	private function gen_hash(){
		return substr(md5(rand()), 0, 10);
	}
}
