<?php 
    include_once("includes/session.php");
    include_once("includes/zz.php"); 
    include_once("includes/functions.php");

    confirm_logged_in();

    $matno = $_SESSION['matno'];

    // Get Student Info
    $getstdnt = "SELECT * FROM reglist WHERE matno='$matno'";
    $stdnt = mysqli_query($connection, $getstdnt );
   // confirm_query($stdnt);

    $row = mysqli_fetch_array($stdnt);
    $fname =  $row['fname'];
    $sname =  $row['sname'];
    $mname =  $row['mname'];
    $sex =  $row['sex'];
    $program =  $row['program'];
    $level =  $row['level'];
    $studentshipStatus = $row['studentshipStatus'];
?>