function validate_email()
{
    var input = document.getElementById("toAddress").value;
    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    if(reg.test(input)==false)
    {
        alert("Invalid email Address")
        document.getElementById("toAddress").value = "";
    }   
}

function validate_password()
{
    var input = document.getElementById("p_password").value;
    var reg = /^[a-zA-Z0-9]+$/;
    if(reg.test(input)==false)
    {
        alert("Invalid password");
        document.getElementById("p_password").value = "";
    }
}

function validate_newemail()
{
    var input = document.getElementById("newemail").value;
    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    if(reg.test(input)==false)
    {
        alert("Invalid email Address")
        document.getElementById("newemail").value = "";
    }   
}

function validate_newpassword()
{
    var input = document.getElementById("newpassword").value;
    var reg = /^[a-zA-Z0-9]+$/;
    if(reg.test(input)==false)
    {
        alert("Invalid password");
        document.getElementById("newpassword").value = "";
    }
}

function validate_username()
{
    var input = document.getElementById("newusername").value;
    var reg = /^[a-zA-Z]+$/;
    if(reg.test(input)==false)
    {
        alert("Invalid username");
        document.getElementById("newusername").value = "";
    }
}
    
   