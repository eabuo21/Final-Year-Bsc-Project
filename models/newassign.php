<?php
include_once("../includes/session.php");
include_once("../includes/zz.php");
include_once("../includes/functions.php");

confirm_adminlogged_in();


        $std = $_POST['id'];
        $std = $_POST['std'];
        $super = $_POST['super'];
        $cname = $_POST['cname'];
        $cadd = $_POST['cadd'];
        $ccountry = $_POST['ccountry'];
        $state = $_POST['state'];
        $cdate = $_POST['cdate'];
        $dur = $_POST['dur'];

        $loginTime = date('Y-m-d H:i:s');


        $newprogress = mysqli_query($connection, "INSERT INTO siwespost (siwesOfficer, siwesMat, siwesCompName,siwesCompAdd,siwesCompCountry,siwesCompState,siwesCompDate, siwesCompLetter) 
                VALUES ('$super', '$std', '$cname', '$cadd', '$ccountry', '$state', '$cdate','')");
        confirm_query($newprogress);

        $newprogress2 = mysqli_query($connection, "update reglist set studentshipStatus= 'Active' where matno = '$std'");
        confirm_query($newprogress2);

        if ($newprogress && $newprogress2) {
                header("Location:../activate.php");
        } else {
                //not successful
                echo "Student cannot be assigned";
        }

