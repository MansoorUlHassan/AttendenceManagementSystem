<form method="POST">
    <th align="right"><input type="submit" value="logout" name="logout"/></th>
</form>
<?php
    if(isset($_POST['logout'])){
        require_once("login.php");
    }
    else{
    require_once("attendenceSheet.php");
?>
</br><hr>
<center>
<?php
    require_once("form.php");
    }
?>
</center>
<hr>