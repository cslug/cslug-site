<?php

class NewsItem {
	
	private static $all;
	
	public function all() {
		return self::$all;
	}
	
	private $title;
	private $content;
	private $timestamp;
	
	function __construct($title, $content, $timestamp) {
		$this->title     = $title;
		$this->content   = $content;
		$this->timestamp = $timestamp;
		
		self::$all[] = $this;
	}
	
	function getTitle() {
		return $this->title;
	}
	
	function getContent() {
		return Markdown($this->content);
	}
	
	function getTimestamp() {
		return $this->timestamp;
	}
	
}

?>
