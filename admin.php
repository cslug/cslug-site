<div class="welcome-title">Welcome to CSLUG admin page</div>
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

echo "<form name='enter' action='?admin' method='post'>";
if($pagePart == 0){
    echo "please enter cslug password.";
    echo "<input type='password' name='password'>";
    echo "<input type='submit' name='submit'>";
    echo "<br/><br/>";
    echo "*if you don't have the password and feel you need it please contact cslug through our google group groups.google/chico-state-linux-user-group";
}
elseif($pagePart == 1)
{
    echo "<select>";
    echo "<option value='addMember'>Please Select</option>";
    echo "<option value='addNews'>Add News</option>";
    echo "<option value='addMinutes'>Add Minutes</option>";
    echo "<option value='addMembers'>Add Members</option>";
    echo "<option value='editMembers'>Edit Members</option>";
    echo "</select>";
    echo "what you are here to add / edit.";
    echo "<br/><br/>";
}
echo "</form>";
