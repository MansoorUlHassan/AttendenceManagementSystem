<form method="POST">
<center><h1>Enter UserName</h1>
<input type='text' name='login' textholder="UserName"/>
<h1>Enter Password</h1>
<input type='text' name='password' textholder="Password"/>
<input type=d"submit" name='submit' value='login'/>
</form>
<?php
    if(isset($_POST['submit'])){
        if($_POST['login']=="Admin" && $_POST['password']=='Password'){
            require_oncee("AttendenceForm.php");
        }
        else if($_POST['login']=="Mansoor" && $_POST['password']=='Password'){
            require_once("index.php");
        }
    }    
?>
