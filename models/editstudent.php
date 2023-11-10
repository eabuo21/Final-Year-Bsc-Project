<?php
        include_once("../includes/session.php");
        include_once("../includes/zz.php"); 
        include_once("../includes/functions.php"); 
              

        $matno = $_GET['ad'];
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];
        $gender = $_POST['gender'];
        $sch = $_POST['school'];
        $dept = $_POST['dept'];
        $course = $_POST['course'];
        $level = $_POST['level'];

        $updating = "UPDATE reglist SET fname = '$fname', sname='$lname', mname='$mname', sex='$gender', college='$sch', dept='$dept', program='$course', level='$level' WHERE matno = '$matno'";
        $updated = mysqli_query($connection, $updating);
        
        header("Location:../allstudents.php");
        exit();
?>