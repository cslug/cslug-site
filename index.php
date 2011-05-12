<?php

// returns a string ("Wednesday, 11/3") representation of the next meeting
function getNextMeeting() {
	$meetingday = 'Wednesday';
	$meetingtime = '5:30'; // change these whenever the standard meeting time is changed
	return date('l, n/j', strtotime("this $meetingday")) . " at $meetingtime";
}

function printSidebar($page) {
  if($page == "index") {
  ?>
<div id="sidebar">
  <ul>
    <li>
			<h2>Upcoming Events</h2>
		<ul style="padding-left: 12px;">
			Elections are over! Check the <a href="http://forums.cslug.net/">forums</a> for more info. Our first meeting of the fall semester, 2011, will be August 31st. This is subject to change so check the forums for updates. See you all next semester!
		</ul>
		</li>
    <li>
      <h2>CSLUG Links</h2>
      <ul>
        <li>
					<a href="http://www.csuchico.edu/">Chico State</a>
					<a href="http://forums.cslug.net/">CSLUG Forums</a>
					<a href="http://cslug.net/irc">CSLUG IRC</a>
					<a href="http://mc.cslug.net/">CSLUG Minecraft</a>
        </li>
      </ul>
    </li>
    <li>
      <h2>Linux Distros</h2>
      <ul>
        <li><a href="http://www.ubuntu.com/">Ubuntu</a></li>
				<li><a href="http://www.fedoraproject.org/">Fedora</a></li>
				<li><a href="http://www.opensuse.org/">openSUSE</a></li>
				<li><a href="http://www.debian.org/">Debian</a></li>
				<li><a href="http://www.sabayon.org/">Sabayon</a></li>
      </ul>
    </li>
  </ul>
</div>
<?php
  } else {
?>
<div id="sidebar">
	<ul>
		<li>
      <h2>CSLUG Links</h2>
      <ul>
        <li>
					<a href="http://www.csuchico.edu/">Chico State</a>
					<a href="http://forums.cslug.net/">CSLUG Forums</a>
					<a href="http://cslug.net/irc">CSLUG IRC</a>
					<a href="http://mc.cslug.net/">CSLUG Minecraft</a>
        </li>
      </ul>
    </li>
    <li>
      <h2>Linux Distros</h2>
      <ul>
        <li><a href="http://www.ubuntu.com/">Ubuntu</a></li>
				<li><a href="http://www.fedoraproject.org/">Fedora</a></li>
				<li><a href="http://www.opensuse.org/">openSUSE</a></li>
				<li><a href="http://www.debian.org/">Debian</a></li>
				<li><a href="http://www.sabayon.org/">Sabayon</a></li>
      </ul>
    </li>
  </ul>
</div>
<?php
  } // end else
} // end function

// grab current page
if(isset($_GET['about'])) $page = "about";
elseif(isset($_GET['members']) || isset($_GET['bio'])) $page = "members";
elseif(isset($_GET['minutes'])) $page = "minutes";
elseif(isset($_GET['photos'])) $page = "photos";
elseif(isset($_GET['links'])) $page = "links";
elseif(isset($_GET['contact'])) $page = "contact";
else $page = "index";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <title>CSLUG</title>
  <link href="style.css" rel="stylesheet" type="text/css" media="screen" />
<?php
if($page == "minutes") {
?>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
  $(function () {
    $(".subRight h3").click(function() {
      var $this = $(this);
      if($this.hasClass('open')) {
        $this.removeClass('open').next('span').slideUp("fast"); return false;
      }
      $("span.closed:visible").slideUp("fast").prev('h3').removeClass('open');
      $this.addClass('open').next('span').slideDown("fast");
    });
  });
</script>
<?php
}
?>
</head>
<body>
  <div id="wrapper">
    <div id="header-wrapper">
      <div id="header">
        <div id="logo">
          <h1><a href="?">CSLUG</a></h1>
          <p>chico state linux users group</p>
        </div>
        <div id="menu">
          <ul>
            <li<?php if($page == "index")   print(' class="current_page_item"'); ?>><a href="?">Home</a></li>
            <li<?php if($page == "about")   print(' class="current_page_item"'); ?>><a href="?about">About</a></li>
            <li<?php if($page == "members") print(' class="current_page_item"'); ?>><a href="?members">Members</a></li>
            <li<?php if($page == "minutes") print(' class="current_page_item"'); ?>><a href="?minutes">Minutes</a></li>
            <li<?php if($page == "photos")  print(' class="current_page_item"'); ?>><a href="?photos">Photos</a></li>
            <li<?php if($page == "links")   print(' class="current_page_item"'); ?>><a href="?links">Links</a></li>
            <li<?php if($page == "contact") print(' class="current_page_item"'); ?>><a href="?contact">Contact</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div id="page">
      <div id="page-bgtop">
        <div id="page-bgbtm">
          <div id="content">
            <div class="post">
              <h2 class="title"><a href="?">Welcome to CSLUG</a></h2>
<?php

switch($page) {
  case "index":
?>
<div class="entry">
  <table>
    <tr>
      <td width="200px">
        <p>
          &nbsp
        </p>
      </td>
      <td>
        <ul>
          <li>
            It's pronounced C - Slug
          </li>
          <li>
            CSLUG stands for:<br/>
            <strong>C</strong>hico <strong>S</strong>tate <strong>L</strong>inux <strong>U</strong>ser <strong>G</strong>roup
          </li>
        </ul>
      </td>
    </tr>
  </table>
  <p>&nbsp</p>
  <p>&nbsp</p>
  <p>&nbsp</p>
  <p>&nbsp</p>
  <p>&nbsp</p>
  <p>&nbsp</p>
</div>
<?php
    break;
  case "about":
?>
<div class="entry">
  <table>
    <tr>
      <td width="200px">
        <p>&nbsp</p>
      </td>
      <td>
        <p><strong>Mission Statment</strong></p>
        <p><a href="bylaws.txt">Read the official bylaws</a></p>
        <p>To show the softer side of linux using xubuntu.</p>
        <p>To show the easier side of command line with open source tools</p>
        <p>To teach the basics of command line to all.</p>
      </td>
    </tr>
  </table>
  <p>&nbsp</p>
  <p>&nbsp</p>
  <p>&nbsp</p>
  <p>&nbsp</p>
  <p>&nbsp</p>
  <p>&nbsp</p>
  <p>&nbsp</p>
</div>

<?php
    break;
  case "members":
?>
<div class="entry">
  <table>
    <tr>
      <td width="200px">
        <p>&nbsp</p>
      </td>
      <td>
<?php
    if(isset($_GET['bio'])) {
      // remove all non-alphanumeric characters from the requested bio filename to prevent injection
      $bio = file_get_contents("./bio/" . preg_replace("/[^a-zA-Z0-9\s]/", "", $_GET['bio']) . ".txt");
      print(str_replace("\n", "<br/>\n", $bio));
    } else {
      // build officer array. key is officer name, value is officer position
      // officers must also be present in the $member array to be listed
      $officer['Dr. Renee Renner'] = 'Academic Advisor';
      // =O $officer['Matthew Harris']   = 'President';
      $officer['Ben Carlsson']     = 'President';
      $officer['Jimmy Weir']       = 'Vice President';
      $officer['Chris Hansen']     = 'Treasurer';
	  $officer['Austin Walter']    = 'Secretary';
	  $officer['Chris Knadler']    = 'Webmaster';
      $officer['Tim Withers']      = 'Alumnus';
      
      // build memberlist array. key is member name, value is member website.
      // if the member wants a bio but not a website, put their plaintext bio in a .txt in the 'bio' folder
      // then list their url as ?bio=textfilename (not including '.txt')
      $member['Dr. Renee Renner']       = 'http://www.ecst.csuchico.edu/~renner/';
      $member['Ben Carlsson']           = 'http://www.ecst.csuchico.edu/~bcarlsson/';
      $member['Jimmy Weir']             = '';
      $member['Chris Hansen']           = '';
	  $member['Chris Knadler']           = '';
      $member['Austin Walter']          = '';
      $member['Tim Withers']            = '';
      $member['Ronnie Miller']          = 'http://www.ecst.csuchico.edu/~rmiller/';
	  $member['Matthew Harris']         = 'http://www.ecst.csuchico.edu/~mattben/';
      $member['Glenn Simpkins']         = '?bio=glennsimpkins';
      $member['Kevin Kane']             = '';
      $member['Jason Martinez']         = 'http://www.ecst.csuchico.edu/~jaydubb/';
      $member['William Swartzendruber'] = '';
      $member['Tom Schmidt']            = '';
      $member['Bryce Hunter']           = '';
      $member['Cory Eighan']            = '?bio=coryeighan';
      $member['Raymond Woods']          = 'http://www.ecst.csuchico.edu/~rwoods/';
      $member['Ocatvio Hernandex']      = '';
      $member['Ethan Apodaca']          = '';
      $member['Katherine Gabales']      = 'http://www.ecst.csuchico.edu/~kgabales/';
      $member['Patrick Conneally']      = '';
      $member['Mike Wood']              = '';
      $member['Vicky Holcomb']          = '';
      $member['Nate Priddy']            = '';
      $member['Joseph Fitzpatrick']     = '';
	  $member['Matt Weller']            = '';
	  $member['Jeremiah Bagula']        = '';
	  $member['Patrick Coleman']		= '';
	  $member['Alex Lang']				= '';
	  $member['Blaine Pace']			= '';
	  $member['Oriah Ulrich']			= '';
	  $member['Sam Reinthaler']			= '';
	  $member['Luke Robles']			= '';
	  $member['Brandon Bell']			= '';
	  $member['Sean Simpson']			= '';
	  $member['Jordan Reese']			= '';
	  $member['Venkat Aditya']			= '';
	  $member['Bonnie Varghese']		= '';

      // print memberlist
      print("<p><strong>Spring 2011 Members</strong>\n<ul>\n");
      foreach($member as $name => $uri) {
        print('<li>');
        
        if($uri == '') // if this member doesn't have a website, just print their name
          print($name);
        else // otherwise, link their name to their website
          print('<a href="' . $uri . '">' . $name . '</a>');
        
        if(isset($officer[$name])) // if this member is an officer, print their position as well
          print(' - ' . $officer[$name]);
        
        print("</li>\n");
      }
      print("</ul>\n");
      print('<p>Total count: ' . count($member));
?>
<?php
    } // end else
?>
      </td>
    </tr>
  </table>
  <p>&nbsp</p>
  <p>&nbsp</p>
  <p>&nbsp</p>
</div>
<?php
    break;
  case "minutes":
    if(isset($_GET['minutes']) && $_GET['minutes'] != "") { // if we're viewing a meeting's minutes
      print('<div class="blankentry"><br/>');
    } else {
      print('<div class="entry">');
    }
    if($_GET['minutes'] != "") {
      // remove all non-alphanumeric characters from the requested minutes filename to prevent injection
      $mins = file_get_contents("./minutes/" . preg_replace("/[^a-zA-Z0-9\s]/", "", $_GET['minutes']) . ".html");
      print($mins);
    } else {
      require_once('minutes.php');
    } // end else
?>
  <p>&nbsp</p>
  <p>&nbsp</p>
  <p>&nbsp</p>
  <p>&nbsp</p>
  <p>&nbsp</p>
  <p>&nbsp</p>
</div>
<?php
    break;
  case "photos":
?>
<div class="entry">
  <table>
    <tr>
      <td width="200px">
        <p>&nbsp</p>
      </td>
      <td align="center" width="300px">
        <p><img src="images/wildcats.jpg" alt="" width="150" height="150" /></p>
        <p>Willie the Wildcat</p>
      </td>
    </tr>
  </table>
  <p>&nbsp</p>
  <p>&nbsp</p>
  <p>&nbsp</p>
</div>
<?php
    break;
  case "links":
?>
<div class="entry">
  <table>
    <tr>
      <td width="180">
        <p>&nbsp</p>
      </td>
      <td align="center">
        <p><strong>Other Clubs' Links</strong></p>
        <table cellpadding="3" cellspacing="3" width="309">
          <tr>
            <td>
              <img src="images/acm.jpg" width="50" height="50">
            </td>
            <td>
              <a href="http://www.ecst.csuchico.edu/acm/"><strong>A</strong>ssociation for <strong>C</strong>omputing <strong>M</strong>achinery</a>
            </td>
          </tr>
          <tr>
            <td>
              <img src="images/upe.jpeg">
            </td>
            <td>
              <a href="http://www.ecst.csuchico.edu/upe/"><strong>U</strong>psilon <strong>P</strong>i <strong>E</strong>psilon</a>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
  <p>&nbsp</p>
  <p>&nbsp</p>
  <p>&nbsp</p>
  <p>&nbsp</p>
  <p>&nbsp</p>
  <p>&nbsp</p>
</div>
<?php
    break;
  case "contact":
?>
<div class="entry">
  <table>
    <tr>
      <td width="200px">
        <p>&nbsp</p>
      </td>
      <td>
        <p><strong>Contact</strong></p>
		<p>Feel free to contact us at:</p>
		<p><strong>cslug.email@gmail.com</strong>.</p>
      </td>
    </tr>
  </table>
  <p>&nbsp</p>
  <p>&nbsp</p>
  <p>&nbsp</p>
  <p>&nbsp</p>
  <p>&nbsp</p>
  <p>&nbsp</p>
</div>
<?php
    break;
}
?>

    <div class="byline">
    </div>
  </div>
  <div style="clear: both;">
    &nbsp;
  </div>
</div>
<?php

printSidebar($page);

?>

        <div style="clear: both;">
          &nbsp;
        </div>
        </div>
      </div>
    </div>
  </div>
  <div id="footer">
    <p>Copyright (c) 2008-2011 Chico State Linux Users Group | All rights reserved | <a href="mailto:skoh.fley@gmail.com">Contact Webmaster</a></p>
  </div>
</body>
</html>
