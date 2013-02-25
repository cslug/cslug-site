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
			
			if(strstr($file, "README.md") || strstr($file, "archived"))
				continue;
			
			$news_title = str_replace("news/", "", $file);
			$news_item = new NewsItem($news_title,
			                          file_get_contents($file),
			                          filemtime($file));
			$template = new Template(Page::NewsItem);
			echo $template->parse(array("title"   => $news_item->get_title(),
			                            "content" => $news_item->get_content()));
			
		}
		break;
	case Page::Members:
		require_once "html/members.html";
		
		foreach(glob("members/*") as $file) {
			
			if(strstr($file, "README.md"))
				continue;
			
			$member_name = str_replace("members/", "", $file);
			
			$file_ptr = fopen($file, "r");
			$position = trim(fgets($file_ptr));
			$url = trim(fgets($file_ptr));
			$members[] = new Member($member_name, $position, $url);
			fclose($file_ptr);
			
		}
		
		usort($members, array("Member", "compare"));
		
		foreach($members as $member) {
			
			if(!$member->is_position_valid())
				continue;
			
			$side = $side == "left" ? "right" : "left";
			
			$template = new Template(Page::Member);
			echo $template->parse(array("name"     => $member->get_name(),
			                           "position" => $member->get_position(),
			                           "link"     => $member->get_link() == "" ? "<br/>" : $member->get_link(),
			                           "side"     => $side));
		}
		break;
	case Page::Minutes:
		require_once "html/minutes.html";
		foreach(array_reverse(glob("minutes/*")) as $file) {
			
			if(strstr($file, "README.md"))
				continue;
			
			$minutes_item = new MinutesItem(str_replace("minutes/", "", $file),
			                                file_get_contents($file),
			                                filemtime($file));
			$template = new Template(Page::MinutesItem);
			echo $template->parse(array("title"   => $minutes_item->get_title(),
			                            "content" => $minutes_item->get_content()));
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
