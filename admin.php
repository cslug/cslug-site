<?php
session_start();
?>

<div class="section-title">CSLUG Admin</div>
<br/><br/>
<form name='enter' action='?admin' method='post'>

<?php

$password = "password";
$pagePart = 0;

// start of logic
if(isset($_POST['password'])){
		$ck = $_POST['password'];
		$ck = hash('sha256', $ck);
		$pw = file_get_contents("private/passwd") or die("can't open file");
		$pw = trim($pw);
		
		if($ck == $pw)
		{
			echo "Enter O Wise One";
			echo "<br/><br/>";
			$pagePart = 1;
			$_SESSION["admin"] = true;
		}
		else
		{
			echo "wrong password see * below";
			echo "<br/><br/>";
			$pagePart = 0;
			exit();
		}
} elseif(!isset($_SESSION["admin"]) || $_SESSION["admin"] !== true){ //enter password
	echo "please enter cslug password.";
	echo "<input type='password' size='50' name='password'>";
	echo "<input type='submit' name='submit'>";
	echo "<br/><br/>";
	echo "*Don't know password, and need it? -- <a href='http://www. groups.google/chico-state-linux-user-group'>Ask Here</a>.<br/>";
	exit();
	}

// password entered

//______________________________________________________________
// What admin is here to do
	$lable = $_POST['choose'];

	switch ($lable)
	{
	case "addNews":
		$pagePart = 2;
		break;
	case "addMinutes":
		$pagePart = 3;
		break;
	case "addMembers":
		$pagePart = 4;
		break;
	case "editMember":
		$pagePart = 5;
		break;
	case "logout":
		$pagePart = 7;
		break;
	default:
		$pagePart = 1;
	}
//______________________________________________________________
// news was added
if(isset($_POST['addnews'])){
	//write to news file
	$news = $_POST['newnews'];
	$title = $_POST['title'];
	if(empty($title)){
		$title = date("m_d_y");
	}    
	$fh = fopen("news/$title", "w") or die("Can't create file");
	fwrite($fh, $news);
	fclose($fh);
	echo "Thank you, News $title has been saved.";
	echo "<br/><br/>";
	$pagePart = 1;
}
//______________________________________________________________
// mins were added
if(isset($_POST['addmins'])){
	//write to news file
	$date = $_POST['date'];
	$mins = $_POST['mins'];
	if(empty($mins)){
		$title = date("ymd");
	}    
	$fh = fopen("minutes/$date", "w") or die("Can't create file - click back - enter date field");
	fwrite($fh, $mins);
	fclose($fh);
	echo "Thank you, Minutes for $date have been saved.";
	echo "<br/><br/>";
	$pagePart = 1;
}
//______________________________________________________________
// member was added
if(isset($_POST['addmem'])){
    //write to news file
    $first = $_POST['first'];
    $last = $_POST['last'];
    $web = $_POST['web'];
    $rank = $_POST['rank'];
    
    $first = strtolower($first);
    $last = strtolower($last);
    $name = $first . "_" . $last;
    
    $check = file_exists("members/$name");
    if($check){
        echo "Member already saved, please edit from edit member page.";
    }
    else{
        $fh = fopen("members/$name", "a") or die("Can't create file");
        fwrite($fh, $rank . "\n");
        fwrite($fh, $web . "\n");
        fclose($fh);
    
        echo "Thank you, Member $name has been saved.";
    }
    echo "<br/><br/>";
    $pagePart = 1;
}
//______________________________________________________________
// member to be edited
if(isset($_POST['editmem'])){
	$edit = $_POST['edit'];
	$pagePart = 6;
}
//______________________________________________________________
// member being edited
if(isset($_POST['mem'])){
    //write to news file
    $name = $_POST['name'];
    $web = $_POST['web'];
    $rank = $_POST['rank'];
    
    unlink("members/" . $name);
    
    $fh = fopen("members/$name", "w") or die("Can't create file");
    fwrite($fh, $rank . "\n");
    fwrite($fh, $web . "\n");
    fclose($fh);
    
    echo "Thank you, Member $name has been saved.";
    echo "<br/><br/>";
    $pagePart = 1;
}
//______________________________________________________________
// start of page parts
if($pagePart == 1) //choose why here
{
	echo "<select name='choose'>";
	echo "<option value='blank'>Please Select</option>";
	echo "<option value='addNews'>Add News</option>";
	echo "<option value='addMinutes'>Add Minutes</option>";
	echo "<option value='addMembers'>Add Members</option>";
	echo "<option value='editMember'>Edit Member</option>";
	echo "<option value='logout'>Logout</option>";
	echo "</select>";
	echo "what you are here to add / edit.";
	echo "<br/><br/>";
	echo "<input type='submit' name='whatToDo'>";
	echo "<br/><br/>";	
}
elseif($pagePart == 2) //Add News
{
	echo "<h3>Add News</h3>";
	echo "Don't know Markdown? Click link below please. Don't make our Front page Lame!<br/>";
	echo "<p>News Title: &nbsp; <input type='text' size='50' name='title'></p>";
	echo "<p><textarea name='newnews' rows='20' cols='60'></textarea></p>";
	echo "<input type='submit' name='addnews'>";
	echo "<br/><br/>";	
}
elseif($pagePart == 3) //Add Minutes
{
	$sample =   "Minutes for month day, year (Febuary 2, 2012)
		---------------------------

		Meeting opened at X

		The folowing discussions, etc took place:

		* stuff...
		* stuff related to stuff....

		Meeting Adjoruned at Y";

	$date = date(Ymd);

	echo "<h3>Add Meeting Minutes</h3>";
	echo "Don't know Markdown? Click link below please. Don't make our Front page Lame!<br/>";
	echo "<p>Meeting Date: &nbsp; <input type='text' name='date' value='$date'>(YYYYMMDD)</p>";
	echo "<p><textarea name='mins' rows='20' cols='60'>$sample</textarea></p>";
	echo "<input type='submit' name='addmins'>";
}
elseif($pagePart == 4) //Add Members
{
	echo "<h3>Add New Member</h3>";
	echo "<table>";
	echo "<tr><td>First Name</td><td><input type='text' name='first'></td></tr>";
	echo "<tr><td>Last Name:</td><td><input type='text' name='last'></td></tr>";
	echo "<tr><td>Website:</td><td><input type='text' name='web' size='50' value='http://'></td></tr>";
	echo "<tr><td>Club Position:</td><td>";
	echo "<select name='rank'>";
	echo "<option value='blank'>Please Select</option>";
	echo "<option value='member'>Member</option>";
	echo "<option value='president'>President</option>";
	echo "<option value='vice president'>Vice President</option>";
	echo "<option value='treasurer'>Treasurer</option>";
	echo "<option value='secretary'>Secretary</option>";
	echo "<option value='webmaster'>Web Master</option>";
	echo "<option value='events coordinatior'>Events Coordinator</option>";
	echo "<option value='academic advisor'>Academic Advisor</option>";
	echo "<option value='alumnus'>Alumnus</option>";
	echo "</select></td></tr>";
	echo "</table>";
	echo "<input type='submit' name='addmem'>";
	echo "<br/><br/>";	
}
elseif($pagePart == 5) //Edit Member Selection
{
	echo "edit member coming soon! <br/>";
	//pull all file names from members/
	//path to directory to scan
	$directory = "members/";

	//get all image files with a .jpg extension.
	$members = glob($directory . "*");

	echo "Current Members:";
	echo "<select name='edit'>";
	foreach($members as $members){        
		$temp = substr( $members, 8 );
		if($temp != 'README.md'){
			echo "<option value='$temp'>$temp</option>";
		}        
	}
	echo "</select>";
	echo "<br/>";
	echo "<input type='submit' name='editmem'>";
}
elseif($pagePart == 6) //Edit Member
{
	//pull all file names from members/      

	$f = fopen ("members/$edit", "r");
	$ln= 0;
	while ($line= fgets ($f)) {
		++$ln;
		$arraymem[] = $line;       
	}
	fclose ($f);     

	echo "<h3>Add Edit Member</h3>";
	echo "You are editing club member: $edit";
	echo "<table>";
	echo "<tr><td>Website:</td><td><input type='text' value='$arraymem[1]' size='50' name='web'></td></tr>";
	echo "<tr><td>Club Position:</td><td>";
	echo "<select name='rank'>";
	echo "<option value='blank'>Please Select</option>";
	echo "<option value='member'>Member</option>";
	echo "<option value='president'>President</option>";
	echo "<option value='vice president'>Vice President</option>";
	echo "<option value='treasurer'>Treasurer</option>";
	echo "<option value='secretary'>Secretary</option>";
	echo "<option value='webmaster'>Webmaster</option>";
	echo "<option value='events coordinator'>Events Coordinator</option>";
	echo "<option value='academic advisor'>Academic Advisor</option>";
	echo "<option value='alumnus'>Alumnus</option>";
	echo "</select></td><td>THIS FIELD DOESN'T AUTO FILL.</td></tr>";
	echo "</table>";
    echo "<input type='hidden' name='name' value='$edit'>";
	echo "<input type='submit' name='mem'>";
	echo "<br/><br/>";	

}
elseif($pagePart == 7) // Logout
{
	session_destroy();
	echo "Logged out.";
}
?>

<a href="http://warpedvisions.org/projects/markdown-cheat-sheet/" target="_blank">
Markdown Cheat Sheet</a>
</form>
