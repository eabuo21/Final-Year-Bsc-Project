<?php
        include_once("../includes/session.php");
        include_once("../includes/zz.php"); 
        include_once("../includes/functions.php"); 
            
            
        $_SESSION['studentedit'] = $_GET['ad'];

        header("Location:../allstudents.php");
?>