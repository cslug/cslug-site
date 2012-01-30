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
			$news_item = new NewsItem($file, file_get_contents($file), filemtime($file));
			echo $news_item->getContent();
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
