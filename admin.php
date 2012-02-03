<div class="section-title">CSLUG Admin</div>
<br/><br/>

<?php

$password = "password";
$pagePart = 0;

if(isset($_POST['password'])){
	$ck = $_POST['password'];
	$ck = hash('sha256', $ck);
	$pw = file_get_contents("passwd");
	$pw = trim($pw);
	
	if($ck == $pw)
	{
		echo "Enter O Wise One";
		echo "<br/><br/>";
		$pagePart = 1;
	}
	else
	{
		echo "wrong password see * below";
		echo "<br/><br/>";
	}
}

if(isset($_POST['whatToDo'])){
    
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
        default:
            $pagePart = 1;
    }
}

if(isset($_POST['addnews'])){
    //write to news file
    $news = $_POST['newnews'];
    $title = $_POST['title'];
    if(empty($title)){
        $title = date("m_d_y");
    }    
    $title;
    $fh = fopen("news/$title", "w") or die("Can't create file");
    fwrite($fh, $news);
    fclose($fh);
    echo "Thank you News has been saved.";
    echo "<br/>";
    $pagePart = 0;
}

echo "<form name='enter' action='?admin' method='post'>";
if($pagePart == 0){ //enter password
    echo "please enter cslug password.";
    echo "<input type='password' name='password'>";
    echo "<input type='submit' name='submit'>";
    echo "<br/><br/>";
    echo "*Don't know password, and need it? -- <a href='http://www. groups.google/chico-state-linux-user-group'>Ask Here</a>.<br/>";
}
elseif($pagePart == 1) //choose why here
{
    echo "<select name='choose'>";
    echo "<option value='blank'>Please Select</option>";
    echo "<option value='addNews'>Add News</option>";
    echo "<option value='addMinutes'>Add Minutes</option>";
    echo "<option value='addMembers'>Add Members</option>";
    echo "<option value='editMember'>Edit Member</option>";
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
    echo "<p>News Title: &nbsp; <input type='text' name='title'></p>";
    echo "<p><textarea name='newnews' rows='20' cols='60'></textarea></p>";
    echo "<input type='submit' name='addnews'>";
}
elseif($pagePart == 3) //Add Minutes
{
    echo "add minutes";
}
elseif($pagePart == 4) //Add Members
{
    echo "add members";
}
elseif($pagePart == 5) //Edit Member Selection
{
    echo "edit member";
}
elseif($pagePart == 6) //Edit Member
{

}
?>

<a href="http://warpedvisions.org/projects/markdown-cheat-sheet/" target="_blank">
Markdown Cheat Sheet</a>
</form>
