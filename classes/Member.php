<?php

class Member {
	
	/*
	 * A list of valid member positions.
	 * If a member's position isn't in this array, the member won't be displayed.
	 * The values are used for position ordering.
	 */
	private static $pos = array("president"          => 0,
	                            "vice president"     => 1,
	                            "treasurer"          => 2,
	                            "secretary"          => 3,
	                            "webmaster"          => 4,
	                            "events coordinator" => 5,
	                            "academic advisor"   => 6,
	                            "alumnus"            => 7,
	                            "member"             => 8);
	
	/*
	 * Returns the difference of the positions of Members $member_a and
	 * $member_b, using the corresponding values in array Member::$pos to rank
	 * positions using integer values.
	 *
	 * e.g. If Member $a has position "president" and Member $b has position
	 * "treasurer", Member::compare($a, $b) would return -2 while
	 * Member::compare($b, $a) would return 2.
	 */
	public static function compare($member_a, $member_b) {
		
		if(!isset(Member::$pos[$member_a->position]))
			$member_a->position = "";
		if(!isset(Member::$pos[$member_b->position]))
			$member_b->position = "";
		
		return Member::$pos[$member_a->position]
		     - Member::$pos[$member_b->position];
		
	}
	
	private $name;
	private $position;
	private $link;
	
	public function __construct($name, $position, $link) {
		
		$name = str_replace("_", " ", $name);
		$name = ucwords($name);
		$this->name = $name;
		
		$this->position = empty($position) ? "member" : $position;
		$this->link = $link;
		
	}
	
	public function get_name() {
		return $this->name;
	}
	
	public function get_position() {
		return ucwords($this->position);
	}
	
	public function get_link() {
		return $this->link;
	}
	
	public function is_position_valid() {
		return isset(Member::$pos[$this->position]);
	}
	
}

?>
