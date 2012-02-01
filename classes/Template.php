<?php

class Template {
	
	public $out;
	
	public function __construct($page) {
		$this->out = file_get_contents($page);
	}
	
	public function parse($substitutions) {
		
		foreach($substitutions as $var => $replacement)
			$this->out = str_replace('{' . $var . '}', $replacement, $this->out);
		
		return $this->out;
		
	}
	
}

?>
