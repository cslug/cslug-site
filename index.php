<?php

include "markdown.php";

function __autoload($class) {
	include "classes/$class.php";
}

if(isset($_GET["members"]))
	$page = Page::Members;
elseif(isset($_GET["minutes"]))
	$page = Page::Minutes;
elseif(isset($_GET["links"]))
	$page = Page::Links;
elseif(isset($_GET["admin"]))
	$page = Page::Admin;
else // default page
	$page = Page::Index;

require_once "html/header.html";

switch($page) {
	
	case Page::Index:
		require_once "html/index.html";
		foreach(glob("news/*") as $file) {
			
			if(strstr($file, "README.md"))
				continue;
			
			$news_title = str_replace("news/", "", $file);
			$news_item = new NewsItem($news_title,
			                          file_get_contents($file),
			                          filemtime($file));
			$template = new Template(Page::NewsItem);
			echo $template->parse(array("title"   => $news_item->getTitle(),
			                            "content" => $news_item->getContent()));
			
		}
		break;
	case Page::Members:
		require_once "html/members.html";
		$side = "left";
		foreach(glob("members/*") as $file) {
			
			if(strstr($file, "README.md"))
				continue;
			
			$member_name = str_replace("members/", "", $file);
			
			$file_ptr = fopen($file, "r");
			$position = trim(fgets($file_ptr));
			$url = trim(fgets($file_ptr));
			$member = new Member($member_name, $position, $url);
			fclose($file_ptr);
			
			$template = new Template(Page::Member);
			echo $template->parse(array("name"     => $member->getName(),
			                            "position" => $member->getPosition(),
			                            "link"     => $member->getLink(),
			                            "side"     => $side));
			$side = $side == "left" ? "right" : "left";
		}
		break;
	case Page::Minutes:
		require_once "html/minutes.html";
		foreach(glob("minutes/*") as $file) {
			
			if(strstr($file, "README.md"))
				continue;
			
			$minutes_item = new MinutesItem(str_replace("minutes/", "", $file),
			                                file_get_contents($file),
			                                filemtime($file));
			$template = new Template(Page::MinutesItem);
			echo $template->parse(array("title"   => $minutes_item->getTitle(),
			                            "content" => $minutes_item->getContent()));
		}
		break;
	case Page::Links:
		require_once "html/links.html";
		break;
	case Page::Admin:
		require_once "admin.php";
		break;
	
}

require_once "html/footer.html";

?>
