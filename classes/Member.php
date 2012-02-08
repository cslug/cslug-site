<?php

class Member {
	
	public static function compare($member_a, $member_b) {
		
		// Specify the order in which ranks appear
		$lvl = array("president"          => 0,
		             "vice president"     => 1,
		             "treasurer"          => 2,
		             "secretary"          => 3,
		             "webmaster"          => 4,
		             "events coordinator" => 5,
		             "academic advisor"   => 6,
		             "member"             => 7,
		             ""                   => 8);
		
		if(!isset($lvl[$member_a->position]))
			$member_a->position = "";
		if(!isset($lvl[$member_b->position]))
			$member_b->position = "";
		
		if($lvl[$member_a->position] == $lvl[$member_b->position])
			return 0;
		
		return $lvl[$member_a->position] > $lvl[$member_b->position] ? 1 : -1;
		
	}
	
	private $name;
	private $position;
	private $link;
	
	public function __construct($name, $position, $link) {
		
		$name = str_replace("_", " ", $name);
		$name = ucwords($name);
		$this->name = $name;
		
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
