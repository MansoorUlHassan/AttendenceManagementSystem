<form method="POST">
<table cellspacing="0" border="1px">
    <tr>
        <th>Student Name</th>
        <th>P</th>
        <th>A</th>
        <th>L</th>
        <th>H</th>
    </tr>
<?php
    require_once("config.php");
    $fetch_data = mysqli_query($db,"SELECT * FROM studentsattendence") OR die(mysqli_error($db));
    $student_name=array();
    $counter = 0;
    while($student=mysqli_fetch_assoc($fetch_data)){
        $student_name[] = $student['StudentName'];
        $student_id = $student['id'];
?>
    <tr>
        <td><?php echo $student_name[$counter];$counter++; ?></td>
        <td><input type="checkbox" name="present[]" value='<?php echo $student_id ?>'/></td>
        <td><input type="checkbox" name="absent[]" value='<?php echo $student_id ?>'/></td>
        <td><input type="checkbox" name="leave[]" value='<?php echo $student_id ?>'/></td>
        <td><input type="checkbox" name="holiday[]" value='<?php echo $student_id ?>'/></td>
    </tr>

    <?php }
?>
    <tr>
        <td>
            Date
        </td>
        <th colspan='4'>
            <input type="date" name="AttendenceDate" />
        </th>
    </tr>

    <tr>
        <th colspan='5'>
            <input type="submit" name="submit" required value="Add Attendence"/>
        </th>
    </tr>
</table>
</form>

<?php
//Get date to which we mark attendence
if(isset($_POST['submit']))
{
    date_default_timezone_set("Asia/Karachi");
    if($_POST['AttendenceDate']==NULL){
        $AttendenceDate = date("Y-m-d");
    }
    else{
        $AttendenceDate = $_POST['AttendenceDate'];
    }
    //Get month and year to which attendence is marked
    $AttendenceMonth = date("M",strtotime($AttendenceDate));
    $AttendenceYear = date("Y",strtotime($AttendenceDate));
    
    //Get attendence
    if(isset($_POST['present'])){
    $student_present = $_POST['present'];
    $attendence = 'p';
    foreach ($student_present as $present) {
        mysqli_query($db,"INSERT INTO attendence(StudentId,currDate,attendence_month,attendence_year,attendence) VALUES('".$present."','".$AttendenceDate."','".$AttendenceMonth."','".$AttendenceYear."','".$attendence."')") OR die(mysqli_error($db));
    }
}
    if(isset($_POST['absent'])){
    $student_absent = $_POST['absent'];
    $attendence = 'a';
    foreach ($student_absent as $present) {
        mysqli_query($db,"INSERT INTO attendence(StudentId,currDate,attendence_month,attendence_year,attendence) VALUES('".$present."','".$AttendenceDate."','".$AttendenceMonth."','".$AttendenceYear."','".$attendence."')") OR die(mysqli_error($db));
    }
}
    if(isset($_POST['leave'])){
    $student_leave = $_POST['leave'];
    $attendence = 'l';
    foreach ($student_leave as $present) {
        mysqli_query($db,"INSERT INTO attendence(StudentId,currDate,attendence_month,attendence_year,attendence) VALUES('".$present."','".$AttendenceDate."','".$AttendenceMonth."','".$AttendenceYear."','".$attendence."')") OR die(mysqli_error($db));
    }
}
    if(isset($_POST['holiday'])){
    $student_holiday = $_POST['holiday'];
    $attendence = 'h';
    foreach ($student_holiday as $present) {
        mysqli_query($db,"INSERT INTO attendence(StudentId,currDate,attendence_month,attendence_year,attendence) VALUES('".$present."','".$AttendenceDate."','".$AttendenceMonth."','".$AttendenceYear."','".$attendence."')") OR die(mysqli_error($db));
    }
}
echo $AttendenceYear;
}
?>
