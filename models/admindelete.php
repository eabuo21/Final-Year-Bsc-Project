<?php
        include_once("../includes/session.php");
        include_once("../includes/zz.php"); 
        include_once("../includes/functions.php"); 
            
        confirm_adminlogged_in();
            
        $adminId = $_GET['ad'];

        $updating = "UPDATE staffrole SET staffDelete = 'Yes' WHERE staffRoleId = '$adminId'";
        $updated = mysqli_query($connection, $updating);
        
        header("Location:../dashboard.php");
        exit();
?>