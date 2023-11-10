<?php
        include_once("../includes/session.php");
        include_once("../includes/zz.php"); 
        include_once("../includes/functions.php"); 
            
        confirm_adminlogged_in();            

        $staffRoleId = $_GET['ad'];
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];
        $gender = $_POST['gender'];
        $sch = $_POST['school'];
        $dept = $_POST['dept'];

        $adminroleid = $_POST['role'];

        $updating = "UPDATE staffrole SET staffRoleNo = '$adminroleid' WHERE staffRoleId = '$staffRoleId'";
        $updated = mysqli_query($connection, $updating);
        
        header("Location:../dashboard.php");
        exit();
?>