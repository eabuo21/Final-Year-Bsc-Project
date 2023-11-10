<?php
include_once("includes/session.php");
include_once("includes/zz.php");
include_once("includes/functions.php");

confirm_adminlogged_in();

$id =  $_GET['ad'];

if(isset($_POST['submit'])){
	$sofficer = $_POST['sof'];
	$cname = $_POST['cname'];
	$sofficer = $_POST['sof'];
	$cadd = $_POST['cadd'];
	$cc = $_POST['ccountry'];
	$state = $_POST['state'];
	$cdate = $_POST['cdate'];

	 mysqli_query($connection, "update siwespost set siwesOfficer='$sofficer',
	  siwesCompName='$cname', siwesCompAdd='$cadd',siwesCompCountry='$cc', siwesCompState='$state', siwesCompDate='$cdate' WHERE siwesMat = '$id'");
	  header("Location:activate.php");
	}

$getadmins = "SELECT * FROM siwespost WHERE siwesMat = '$id'";
$theadmins = mysqli_query($connection, $getadmins);

$getroles = "SELECT * FROM roles";
$theroles = mysqli_query($connection, $getroles);
?>
<?php require('views/header.php'); ?>

<div id="page-content">
	<div class="container">
		<div class="row">
			<div class="col-sm-8 page-content">
				<div class="white-container mb60 pb50">
					<?php while ($rolerow = mysqli_fetch_array($theadmins)) { ?>
						<form method='post' class='pb50'>
							<fieldset>
								<legend>Update Student Assignment</legend>
								<h2>Student: <?php echo $rolerow['siwesMat'] ?></h2>
								<label> Select Supervisor:</label>
								<select name='sof' required>
									<option selected value="<?php echo $rolerow['siwesOfficer']; ?>" ><?php echo $rolerow['siwesOfficer']; ?></option>
									<?php while ($rolerows = mysqli_fetch_array($stdlist)) { ?>
										<option value='<?php echo $rolerows['siwesOfficer']; ?>'><?php echo $rolerows['siwesOfficer'] ?></option>
									<?php } ?>
								</select>

							
								<label> Company Name: </label>
								<input type="text" name='cname' value="<?php echo $rolerow['siwesCompName']; ?>" required>

								<label> Company Address: </label>
								<input type="text" name='cadd' value='<?php echo $rolerow['siwesCompAdd']; ?>' required>

								<label> Company Country: </label>
								<input type="text" name='ccountry' value='<?php echo $rolerow['siwesCompCountry']; ?>' required>

								<label> Company State: </label>
								<input type="text" name='state' value='<?php echo $rolerow['siwesCompState']; ?>' required>

								<label> Start Date: </label>
								<input type="text" name='cdate' value='<?php echo $rolerow['siwesCompDate']; ?>' required>
								<br>
								<input type="submit" name="submit" class="btn btn-default" value='Save'> <a href="activate.php" id='hidenew' class="btn btn-primary">Cancel</a>
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
							<li ><a href="dashboard.php">Supervisors</a></li>
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