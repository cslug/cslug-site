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
else // default page
	$page = Page::Index;

require_once "html/header.html";

switch($page) {
	
	case Page::Index:
		require_once "html/index.html";
		// todo: print news items dynamically here
		foreach(glob("news/*") as $file) {
			
			if(strstr($file, "README.md"))
				continue;
			
			$news_item = new NewsItem(str_replace("news/", "", $file), file_get_contents($file), filemtime($file));
			$out = file_get_contents("html/news-item.html");
			$out = str_replace("{title}",   $news_item->getTitle(),   $out);
			$out = str_replace("{content}", $news_item->getContent(), $out);
			echo $out;
			
		}
		break;
	case Page::Members:
		require_once "html/members.html";
		break;
	case Page::Minutes:
		require_once "html/minutes.html";
		break;
	case Page::Links:
		require_once "html/links.html";
		break;
	
}

require_once "html/footer.html";

?>
