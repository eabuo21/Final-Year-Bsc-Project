<?php
include_once("../includes/session.php");
include_once("../includes/zz.php");
include_once("../includes/functions.php");

confirm_adminlogged_in();

if (($_POST['staff'] != '') || ($_POST['role'] != '')) {
        $staff = $_POST['id'];
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];
        $gender = $_POST['gender'];
        $sch = $_POST['school'];
        $dept = $_POST['dept'];
        $adminroleid = $_POST['role'];

        $loginTime = date('Y-m-d H:i:s');

        $getstaff = "SELECT staffnum FROM staffrole WHERE staffnum = '$staff'";
        $thestaff = mysqli_query($connection, $getstaff);
        if (mysqli_num_rows($thestaff) > 0) {
                echo "Admin already exists";
        } else {
                $newprogress = mysqli_query($connection, "INSERT INTO staffrole (staffNum, staffRoleNo, loginTime,staffDelete) 
                VALUES ('$staff', '$adminroleid', '$loginTime','0')");
                confirm_query($newprogress);

                $newprogress2 = mysqli_query($connection, "INSERT INTO stafflist (fname, sname, mname,sex,college,dept,staffno,role) 
                VALUES ('$fname', '$lname', '$mname','$gender','$sch','$dept','$staff','$adminroleid')");
                confirm_query($newprogress2);

                if ($newprogress && $newprogress2) {
                        header("Location:../dashboard.php");
                } else {
                        //not successful
                        echo "Admin cannot be added";
                }
        }
} else {
        header("Location:../dashboard.php");
}
