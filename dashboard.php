<?php
error_reporting(1);
include_once("includes/session.php");
include_once("includes/zz.php");
include_once("includes/functions.php");

confirm_adminlogged_in();

$staffno = $_SESSION['staffno'];
// $getadmins = "SELECT * FROM stafflist INNER JOIN staffrole ON stafflist.staffno = staffrole.staffNum INNER JOIN roles ON staffrole.staffRoleNo = roles.roleId WHERE staffdelete = '' AND staffno NOT IN ('$staffno')";

$getadmins = "SELECT * FROM stafflist,staffrole,roles where stafflist.staffno = staffrole.staffNum and staffrole.staffRoleNo = roles.roleId and staffrole.staffdelete = '0' AND staffno NOT IN ('$staffno')";
$theadmins = mysqli_query($connection, $getadmins);

$getroles = "SELECT * FROM roles";
$theroles = mysqli_query($connection, $getroles);

$getstaff = "SELECT * FROM stafflist WHERE staffno NOT IN ('$staffno')";
$thestaff = mysqli_query($connection, $getstaff);

$serial = 1;
$inc = 1;
?>
<?php require('views/header.php'); ?>

<div id="page-content">
	<div class="container">
		<div class="row">
			<div class="col-sm-8 page-content">
				<div class="white-container mb0">
					<div id='thegentable' class='pb90'>
						<h6>All Supervisors</h6>
						<a href="#" id='shownew' class="btn btn-default">Add New Supervisor</a>

						<?php if (mysqli_num_rows($theadmins) < 1) { ?>
							<p class='pt20 mb90 pb210'>No Supervisor added yet.</p>
						<?php } else { ?>
							<table class="table-hover">
								<thead>
									<tr>
										<th>S/N</th>
										<th>Name</th>
										<th>Gender</th>
										<th>School</th>
										<th>Department</th>
										<th>ID</th>
										<th>Role</th>
										<th></th>
										<th></th>
									</tr>
								</thead>

								<tbody>
									<?php while ($adminrow = mysqli_fetch_array($theadmins)) { ?>
										<tr>
											<td><?php echo $serial; ?></td>
											<td><?php echo ucwords($adminrow['sname']); ?> <?php echo ucwords($adminrow['fname']); ?> <?php echo ucwords($adminrow['mname']); ?></td>
											<td><?php echo ucwords($adminrow['sex']); ?></td>
											<td><?php echo ucwords($adminrow['college']); ?></td>
											<td><?php echo ucwords($adminrow['dept']); ?></td>
											<td><?php echo ucwords($adminrow['staffno']); ?></td>
											<td><?php echo ucwords($adminrow['roleName']); ?></td>
											<td><a href="models/adminedit.php?ad=<?php echo $adminrow['staffRoleId']; ?>" class='btn btn-primary fa fa-edit' title='Edit'></a></td>
											<td><a href="models/admindelete.php?ad=<?php echo $adminrow['staffRoleId']; ?>" class='btn btn-primary fa fa-trash-o' title='Delete'></a></td>
										</tr>
										<?php $serial = $serial + $inc; ?>
									<?php } ?>
								</tbody>
							</table>
						<?php } ?>
					</div>
					<div id='thenew' class='pb60'>
						<form method='post' action="models/newadmin.php" class='pb50'>
							<fieldset>
								<legend>New Supervisor</legend>
								<label> Staff Firstname: </label>
								<input type="text" name='fname' required>

								<label> Staff Lastname: </label>
								<input type="text" name='sname' required>

								<label> Staff Middlename: </label>
								<input type="text" name='mname' required>

								<label> Gender: </label>
								<select name='gender' required>
									<option disabled selected>---Select Gender---</option>
									<option value='Male'>Male</option>
									<option value='Female'>Female</option>
								</select>

								<label> School: </label>
								<input type="text" name='school' required>

								<label> Staff Department: </label>
								<input type="text" name='dept' required>

								<label> Staff ID: </label>
								<input type="text" name='id' required>

								<label> Role:</label>
								<select name='role' required>
									<option disabled selected>---Select Role Type---</option>
									<?php while ($rolerow = mysqli_fetch_array($theroles)) { ?>
										<option value='<?php echo $rolerow['roleId']; ?>'><?php echo $rolerow['roleName']; ?></option>
									<?php } ?>
								</select>
								<br>
								<input type="submit" name="submit" class="btn btn-default" value='Save'> <a href="#" id='hidenew' class="btn btn-primary">Cancel</a>
							</fieldset>
						</form>
					</div>
				</div>
			</div>

			<div class="col-sm-4 page-sidebar">
				<aside>
					<div class="widget sidebar-widget white-container links-widget">
						<ul><br>						
							&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Welcome <?php 							
							echo $_SESSION['fname'] .' ('. $_SESSION['adminrole']?>)
							<li class="active"><a href="dashboard.php">Supervisors</a></li>
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