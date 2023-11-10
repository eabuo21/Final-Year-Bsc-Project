<?php
include_once("includes/session.php");
include_once("includes/zz.php");
include_once("includes/functions.php");

confirm_adminlogged_in();

$staffRoleId = $_SESSION['adminedit'];

$getadmins = "SELECT * FROM stafflist INNER JOIN staffrole ON stafflist.staffno = staffrole.staffNum INNER JOIN roles ON staffrole.staffRoleNo = roles.roleId WHERE staffRoleId = '$staffRoleId'";
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
					<?php while ($adminrow = mysqli_fetch_array($theadmins)) { ?>
						<form method='post' action="models/editadmin.php?ad=<?php echo $staffRoleId; ?>" class='pb50'>
							<fieldset>
								<legend>Edit Supervisor</legend>
								<label>
									Staff ID:
								</label>
								 <?php echo ucwords($adminrow['staffno']); ?> <br>  <br> 

								<label> Staff Firstname: </label>
								<input type="text" name='fname' value="<?php echo ucwords($adminrow['fname']); ?>" required>

								<label> Staff Lastname: </label>
								<input type="text" name='sname' value="<?php echo ucwords($adminrow['sname']); ?>" required>

								<label> Staff Middlename: </label>
								<input type="text" name='mname' value="<?php echo ucwords($adminrow['mname']); ?>" required>

								<label> Gender: </label>
								<select name='gender' required>
									<option disabled>---Select Gender---</option>
									<?php if ($adminrow['sex'] == "Female") { ?>
										<option selected value="Female">Female</option>
										<option  value="Male">Male</option>
									<?php	} else { ?>
										<option  value="Female">Female</option>
										<option selected value="Male">Male</option>
									<?php } ?>

								</select>

								<label> School: </label>
								<input type="text" name='school' value="<?php echo ucwords($adminrow['college']); ?>" required>

								<label> Staff Department: </label>
								<input type="text" name='dept' value="<?php echo ucwords($adminrow['dept']); ?>" required>

								
								<label>
									Role:
								</label>
								<select name='role' required>
									<option value='<?php echo $adminrow['roleId']; ?>' selected><?php echo ucwords($adminrow['roleName']); ?></option>
									<?php while ($rolerow = mysqli_fetch_array($theroles)) { ?>
										<option value='<?php echo $rolerow['roleId']; ?>'><?php echo $rolerow['roleName']; ?></option>
									<?php } ?>
								</select>
								<br>
								<input type="submit" name="submit" class="btn btn-default" value='Update'> <a href="dashboard.php" class="btn btn-primary">Cancel</a>
							</fieldset>
						</form>
					<?php } ?>
				</div>
			</div>

			<div class="col-sm-4 page-sidebar">
				<aside>
					<div class="widget sidebar-widget white-container links-widget">
					<ul><br>
							&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Welcome <?php echo $_SESSION['fname']; ?> (Admin)
							<li ><a href="dashboard.php">Supervisors</a></li>
							<li><a href="assignment.php">Supervisor's Students</a></li>
							<li><a href="models/mystudentview.php">My Students</a></li>
							<li><a href="models/adminlogout.php">Log Out</a></li>
						</ul>
					</div>
				</aside>
			</div>
		</div>
	</div> <!-- end .container -->
</div> <!-- end #page-content -->

<?php require('views/footer.php'); ?>