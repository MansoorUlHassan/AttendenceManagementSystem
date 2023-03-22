<?php
    require_once("config.php");
    $firstDayOfMonth = date('1-m-y');
    $daysOfMonth = date('t',strtotime($firstDayOfMonth));
    $fetchStudent = mysqli_query($db,"SELECT * FROM studentsattendence") or die(mysqli_error($db));
    $totalStudents =  mysqli_num_rows($fetchStudent);
    $studentName=array();
    $studentId = array();
    while($student = mysqli_fetch_assoc($fetchStudent)){
        $studentName[] = $student['StudentName'];
        $studentId[] = $student['id'];
    }
    $counter=0;
?>
<center>
<table border='1px' cellspacing='0'>
    <tr>
        <td colspan="<?php echo $daysOfMonth+1 ?>"><center><b>Attendence Management System</b></br>Students Attendence On Month : <u><font color="red"><?php echo strtoupper(date('F',strtotime($firstDayOfMonth)))?></font></u></center></td>
</tr>
    <?php
        for($i=1;$i<=$totalStudents+2;$i++){
            //If row == 1 Then we add dates of Month 
            echo "<tr>";
            if($i==1){
                ?>
                    <td rowspan='2'>
                        <b>Names</b>
                    </td>
                <?php
            for($j=1;$j<=$daysOfMonth;$j++){
                ?>
                <td><?php echo $j ?></td>
                <?php
            }
            }//Here first If condition End
            //Print Days According to their Dates
            else if($i==2){
                for ($j=0; $j<$daysOfMonth; $j++) { 
                    echo "<td>". date("D",strtotime("+$j days",strtotime($firstDayOfMonth))). "</td>";
                }    
            }//Here First Part Is Completed
            
            //Enter Data And Names Of Students
            else{?>
              <td><?php echo $studentName[$counter];?></td>
              <?php
              for ($j=1; $j<=$daysOfMonth; $j++) { 
                $AttDate = date("Y-m-$j");
                $fetchStudentAttendence = mysqli_query($db, 
                'SELECT attendence FROM attendence WHERE StudentId="'.$studentId[$counter].'" AND currDate="'.$AttDate.'"') or die(mysqli_error($db));
                $isAttendenceAdded = mysqli_num_rows($fetchStudentAttendence);
                if($isAttendenceAdded>0){
                    $studentAttendence = mysqli_fetch_assoc($fetchStudentAttendence);
                    echo "<td>".$studentAttendence['attendence']."</td>";
                }
                else{
                    echo "<td></td>";
                }
            }
            $counter++;
            }
            //End of row
        echo "</tr>";
        }

    ?>
</table>
</center>