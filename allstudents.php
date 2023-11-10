<?php
include_once("includes/session.php");
include_once("includes/zz.php");
include_once("includes/functions.php");

confirm_adminlogged_in();



$getstdnts = "SELECT * FROM reglist  ";
$thestdnts = mysqli_query($connection, $getstdnts);



$serial = 1;
$inc = 1;
?>
<?php require('views/header.php'); ?>

<div id="page-content">
	<div class="container">
		<div class="row">
			<div class="col-sm-8 page-content">
				<div class="white-container mb40">
					<div id='thegentable' class='pb90'>

						<h6>All Students</h6>

						<?php if ($_SESSION['adminroleid'] == 1) : ?>
							<a href="#" id='shownew' class="btn btn-default">Add Student</a>
						<?php endif; ?>

						<?php if (mysqli_num_rows($thestdnts) < 1) { ?>
							<p class='pt20 mb90 pb210'>No Student added yet.</p>
						<?php
						} else { ?>
							<table class="table-hover">
								<thead>
									<tr>
										<th>S/N</th>
										<th>Matric</th>
										<th>Name</th>
										<th>School</th>
										<th>Gender</th>
										<th>Status</th>
										<th></th>
										<th></th>
									</tr>
								</thead>

								<tbody>
									<?php while ($staffrow = mysqli_fetch_array($thestdnts)) { ?>
										<tr>
											<td><?php echo $serial; ?></td>
											<td><?php echo $staffrow['matno']; ?></td>
											<td><?php echo ucwords($staffrow['sname']); ?> <?php echo ucwords($staffrow['fname']); ?> <?php echo ucwords($staffrow['mname']); ?></td>
									
											<td><?php echo $staffrow['college']; ?></td>
											<td><?php echo $staffrow['sex']; ?></td>
											<td><?php echo $staffrow['studentshipStatus']; ?></td>
											<td><a href="studentedit.php?ad=<?php echo $staffrow['matno']; ?>" class='btn btn-primary fa fa-edit' title='Edit'></a></td>
											<td><a href="models/studentdelete.php?ad=<?php echo $staffrow['matno']; ?>" class='btn btn-primary fa fa-trash-o' title='Delete'></a></td>

										</tr>
										<?php $serial = $serial + $inc; ?>
									<?php } ?>


								</tbody>
							</table>
						<?php } ?>
					</div>
					<div id='thenew' class='pb60 mb60'>
						<form method='post' action="models/newstudent.php" class='pb50'>
							<fieldset>
								<legend>New Student</legend>
								<label>
									Matriculation Number:
								</label>
								<input type="text" name="matno">

								<label>
									Student Firstname:
								</label>
								<input type="text" name="fname">

								<label>
									Student Lastname:
								</label>
								<input type="text" name="lname">

								<label>
									Student Middlename:
								</label>
								<input type="text" name="mname">

								<label>
									Gender:
								</label>
								<input type="text" name="gender">

								<label>
									School:
								</label>
								<input type="text" name="school">

								<label>
									Department:
								</label>
								<input type="text" name="dept">

								<label>
									Course of Study:
								</label>
								<input type="text" name="course">

								<label>
									Level:
								</label>
								<input type="text" name="level">






								<!-- <?php $themystdnts =  mysqli_query($connection, "select * from reglist where studentshipStatus = 'Inactive' "); ?>

								<select name='stdntmatno' required>
									<option disabled selected>---Select Student Name---</option>
									<?php while ($mystdntsrow = mysqli_fetch_array($themystdnts)) { ?>
										<option value='<?php echo $mystdntsrow['matno']; ?>'><?php echo ucwords($mystdntsrow['sname']); ?> <?php echo ucwords($mystdntsrow['fname']); ?> <?php echo ucwords($mystdntsrow['mname']); ?> - <?php echo $mystdntsrow['matno']; ?></option>
									<?php } ?>
								</select> -->
								<br>
								<input type="submit" name="submit" class="btn btn-default" value='Save'>

								<a href="#" id='hidenew' class="btn btn-primary">Cancel</a>
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
							<li class="active"><a href="allstudents.php">All Students</a></li>
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