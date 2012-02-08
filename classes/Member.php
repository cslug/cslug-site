<?php

class Member {
	
	private $name;
	private $position;
	private $link;
	
	public function __construct($name, $position, $link) {
		
		$name = explode("-", $name);
		
		foreach ($name as $key => $lc_name) {
			$name[$key] = ucfirst($lc_name);
		}
		
		$this->name = implode(" ", $name);
		
		$this->position = $position;
		$this->link = $link;
		
	}
	
	public function getName() {
		return $this->name;
	}
	
	public function getPosition() {
		return $this->position;
	}
	
	public function getLink() {
		return $this->link;
	}
	
}

?>
