<?php

class Member {
	
	private $name;
	private $position;
	private $link;
	
	public function __construct($name, $position, $link) {
		
		$this->name = explode("-", $name);
		
		foreach ($this->name as $key => $lc_name) {
			$this->name[$key] = ucfirst($lc_name);
		}
		
		$this->name = implode(" ", $this->name);
		
		$this->position = ucfirst($position);
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
