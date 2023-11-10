<?php
include_once("includes/session.php");
include_once("includes/zz.php");
include_once("includes/functions.php");

confirm_adminlogged_in();

if (isset($_POST['submit'])) {
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

	header("Location:allstudents.php");
}

$studentMat = $_GET['ad'];

$getadmins = "SELECT * FROM reglist  WHERE matno = '$studentMat'";
$thestdnts = mysqli_query($connection, $getadmins);

?>
<?php require('views/header.php'); ?>

<div id="page-content">
	<div class="container">
		<div class="row">
			<div class="col-sm-8 page-content">
				<div class="white-container mb60 pb50">
					<?php while ($stdrow = mysqli_fetch_array($thestdnts)) { ?>
						<form method='post' class='pb50'>
							<fieldset>
								<legend>New Student</legend>
								<label>
									Matriculation Number:
								</label>
								<input type="text" name="matno" value="<?php echo ($stdrow['matno']); ?>" readonly>

								<label>
									Student Firstname:
								</label>
								<input type="text" name="fname" value="<?php echo ($stdrow['fname']); ?>">

								<label>
									Student Lastname:
								</label>
								<input type="text" name="lname" value="<?php echo ($stdrow['sname']); ?>">

								<label>
									Student Middlename:
								</label>
								<input type="text" name="mname" value="<?php echo ($stdrow['mname']); ?>">

								<label>
									Gender:
								</label>
								<input type="text" name="gender" value="<?php echo ($stdrow['sex']); ?>">

								<label>
									School:
								</label>
								<input type="text" name="school" value="<?php echo ($stdrow['college']); ?>">

								<label>
									Department:
								</label>
								<input type="text" name="dept" value="<?php echo ($stdrow['dept']); ?>">

								<label>
									Course of Study:
								</label>
								<input type="text" name="course" value="<?php echo ($stdrow['program']); ?>">

								<label>
									Level:
								</label>
								<input type="text" name="level" value="<?php echo ($stdrow['level']); ?>">






								<!-- <?php $themystdnts =  mysqli_query($connection, "select * from reglist where studentshipStatus = 'Inactive' "); ?>

								<select name='stdntmatno' required>
									<option disabled selected>---Select Student Name---</option>
									<?php while ($mystdntsrow = mysqli_fetch_array($themystdnts)) { ?>
										<option value='<?php echo $mystdntsrow['matno']; ?>'><?php echo ucwords($mystdntsrow['sname']); ?> <?php echo ucwords($mystdntsrow['fname']); ?> <?php echo ucwords($mystdntsrow['mname']); ?> - <?php echo $mystdntsrow['matno']; ?></option>
									<?php } ?>
								</select> -->
								<br>
								<input type="submit" name="submit" class="btn btn-default" value='Update'>

								<a href="allstudents.php" id='hidenew' class="btn btn-primary">Cancel</a>
							</fieldset>
						</form>
					<?php } ?>
				</div>
			</div>

			<div class="col-sm-4 page-sidebar">
				<aside>
					<div class="widget sidebar-widget white-container links-widget">
					<ul><br>						
							&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Welcome <?php 							
							echo $_SESSION['fname'] .' ('. $_SESSION['adminrole']?>)
							<li><a href="dashboard.php">Supervisors</a></li>
							<li><a href="assignment.php">Supervisor's Students</a></li>
							<li><a href="allstudents.php">All Students</a></li>
							<li><a href="activate.php">Working Students</a></li>
							<li><a href="models/adminlogout.php">Log Out</a></li>
						</ul>
					</div>
				</aside>
			</div>
		</div>
	</div> <!-- end .container -->
</div> <!-- end #page-content -->

<?php require('views/footer.php'); ?>