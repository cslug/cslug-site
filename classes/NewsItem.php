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

		$this->title = ucfirst($this->title);
		$this->title = str_replace("-", " ", $this->title);

		$this->content = Markdown($this->content);
		
		self::$all[] = $this;
	}
	
	function getTitle() {
		return $this->title;
	}
	
	function getContent() {
		return $this->content;
	}
	
	function getTimestamp() {
		return $this->timestamp;
	}
	
}

?>
