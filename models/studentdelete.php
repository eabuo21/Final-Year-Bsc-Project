<?php
        include_once("../includes/session.php");
        include_once("../includes/zz.php"); 
        include_once("../includes/functions.php"); 
            
        confirm_adminlogged_in();
            
        $adminId = $_GET['ad'];

        mysqli_query($connection, "delete from reglist  WHERE matno = '$adminId'");
        mysqli_query($connection, "delete from logbook  WHERE logbookmat = '$adminId'");
        
        header("Location:../allstudents.php");
        exit();
?>