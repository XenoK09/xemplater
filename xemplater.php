<?

/**
 * Xemplater's main class
 */
 

class xemplater {
	
	private $tpl;
	
	// tags
	private $tagStart = '<<';
	private $tagEnd = '>>';
	
	
	public function __construct($tpl) {
		$this->tpl = $tpl;
	}
	
	// parse
	public function __toString() { return $this->tpl; }
	public function parse() { echo $this; }
	
	
	public function substitute($var, callable $callback) {
		ob_start();
		$callback();
		$val = trim(ob_get_clean()) . PHP_EOL;
		
		$this->tpl = str_replace($this->createTag($var), $val, $this->tpl);
	}
	
	private function createTag($var) {
		return $this->tagStart . $var . $this->tagEnd;
	}
		
}
 