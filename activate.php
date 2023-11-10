<?php
error_reporting(1);
include_once("includes/session.php");
include_once("includes/zz.php");
include_once("includes/functions.php");

confirm_adminlogged_in();

$staffno = $_SESSION['staffno'];
// $getadmins = "SELECT * FROM stafflist INNER JOIN staffrole ON stafflist.staffno = staffrole.staffNum INNER JOIN roles ON staffrole.staffRoleNo = roles.roleId WHERE staffdelete = '' AND staffno NOT IN ('$staffno')";

$getadmins = "SELECT * FROM siwespost";
$theadmins = mysqli_query($connection, $getadmins);

$getroles = "SELECT * FROM roles";
$theroles = mysqli_query($connection, $getroles);

$stdlist = mysqli_query($connection, "SELECT * FROM reglist where studentshipStatus = 'Inactive'");

$thestaff = mysqli_query($connection, "SELECT * FROM stafflist WHERE staffno NOT IN ('$staffno') and role != '1' ");

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
						<h6>STUDENTS ASSIGNED TO WORKING PLACES</h6>
						<a href="#" id='shownew' class="btn btn-default">Assign New Student</a>

						<?php if (mysqli_num_rows($theadmins) < 1) { ?>
							<p class='pt20 mb90 pb210'>No Student Assigned yet.</p>
						<?php } else { ?>
							<table class="table-hover">
								<thead>
									<tr>
										<th>S/N</th>
										<th>Student</th>
										<th>Company</th>
										<th>Supervisor</th>
										<th>Start Date</th>
										<th>Acceptance Letter</th>
										<th></th>
									</tr>
								</thead>

								<tbody>
									<?php while ($adminrow = mysqli_fetch_array($theadmins)) { ?>
										<tr>
											<td><?php echo $serial; ?></td>
											<td><?php echo ucwords($adminrow['siwesMat']); ?></td>
											<td><?php echo ucwords($adminrow['siwesCompName']).', ' .$adminrow['siwesCompAdd']; ?></td>
											<td><?php echo ucwords($adminrow['siwesOfficer']); ?></td>
											<td><?php echo ucwords($adminrow['siwesCompDate']); ?></td>
											<td><?php echo ($adminrow['siwesCompLetter']==""?"Unavalable":"Available"); ?></td>
											<td><a href="assignedit.php?ad=<?php echo $adminrow['siwesMat']; ?>" class='btn btn-primary fa fa-edit' title='Edit'></a></td>
											</tr>
										<?php $serial = $serial + $inc; ?>
									<?php } ?>
								</tbody>
							</table>
						<?php } ?>
					</div>
					<div id='thenew' class='pb60'>
						<form method='post' action="models/newassign.php" class='pb50'>
							<fieldset>
								<legend>New Student Assignment</legend>
								<label> Select Student:</label>
								<select name='std' required>
									<option disabled selected>--Select Student--</option>
									<?php while ($rolerow = mysqli_fetch_array($stdlist)) { ?>
										<option value='<?php echo $rolerow['matno']; ?>'><?php echo $rolerow['fname'].' '.$rolerow['sname'].' '.$rolerow['mname'].' '.$rolerow['matno']; ?></option>
									<?php } ?>
								</select>

								<label> Select Supervisor:</label>
								<select name='super' required>
									<option disabled selected>--Select Supervisor--</option>
									<?php while ($rolerow = mysqli_fetch_array($thestaff)) { ?>
										<option value='<?php echo $rolerow['staffno']; ?>'><?php echo $rolerow['fname'].' '.$rolerow['sname'].' '.$rolerow['mname']; ?></option>
									<?php } ?>
								</select>
								<label> Company Name: </label>
								<input type="text" name='cname' required>

								<label> Company Address: </label>
								<input type="text" name='cadd' required>

								<label> Company Country: </label>
								<input type="text" name='ccountry' required>

								<label> Company State: </label>
								<input type="text" name='state' required>

								<label> Start Date: </label>
								<input type="text" name='cdate' required>

								<label> Duration (in months): </label>
								<input type="text" name='cdur' required>
								
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
							<li><a href="dashboard.php">Supervisors</a></li>
							<li><a href="assignment.php">Supervisor's Students</a></li>
							<li><a href="allstudents.php">All Students</a></li>
							<li class="active"><a href="activate.php">Working Students</a></li>
							<li><a href="models/adminlogout.php">Log Out</a></li>
						</ul>
					</div>
				</aside>
			</div>
		</div>
	</div> <!-- end .container -->
</div> <!-- end #page-content -->

<?php require('views/footer.php'); ?>