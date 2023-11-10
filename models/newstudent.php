<?php
        include_once("../includes/session.php");
        include_once("../includes/zz.php"); 
        include_once("../includes/functions.php"); 
            
        confirm_adminlogged_in(); 
            
   

        $stdntmatno = $_POST['matno'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $mname = $_POST['mname'];
        $gender = $_POST['gender'];
        $school = $_POST['school'];
        $dept = $_POST['dept'];
        $course = $_POST['course'];
        $level = $_POST['level'];

     $cheeck = mysqli_query($connection, "select matno from reglist where matno = '$stdntmatno'");
     if(mysqli_num_rows($cheeck)>0){
        echo ("Matriculation number already exists");
     }else{
        $updating = "INSERT into reglist(matno,fname,sname,mname,sex,college,dept,program,level,studentshipStatus) 
        VALUES ('$stdntmatno','$fname','$lname','$mname','$gender','$school','$dept','$course','$level','Inactive')";
        $updated = mysqli_query($connection, $updating);
        // $updating = "UPDATE siwespost SET siwesOfficer = '$supervisor' WHERE siwesMat= '$stdntmatno'";
        // $updated = mysqli_query($connection, $updating);
        
        header("Location:../allstudents.php");
        exit();
     }
