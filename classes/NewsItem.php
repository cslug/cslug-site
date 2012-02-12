<?php

class NewsItem {
	
	private $title;
	private $content;
	private $timestamp;
	
	public function __construct($title, $content, $timestamp) {
		$this->title     = $title;
		$this->content   = $content;
		$this->timestamp = $timestamp;
		
		$this->title = ucfirst($this->title);
		$this->title = str_replace("-", " ", $this->title);
		
		$this->content = Markdown($this->content);
	}
	
	public function get_title() {
		return $this->title;
	}
	
	public function get_content() {
		return $this->content;
	}
	
	public function get_timestamp() {
		return $this->timestamp;
	}
	
}

?>
