<form method="POST">
<input type='text' name='name' placeholder="Names Of Student" required />
<input type="submit" value="Add Student" name="submit"/>
</form>
<?php
//Get Student Data
if(isset($_POST['submit'])){
    require_once("config.php");
    $studentName = $_POST['name'];
    $query = "INSERT INTO studentsattendence(StudentName) value('$studentName')";
    $executeQuery = mysqli_query($db,$query) or die(mysqli_error($db));
    echo "Added Successfully";
}
?>