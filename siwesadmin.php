<?php
include_once("includes/session.php");
include_once("includes/zz.php");
include_once("includes/functions.php");

if (isset($_POST['submit'])) {
	$staffno = $_POST['staffno'];
	$sname = $_POST['sname'];

	// Search for staff
	$getstaff = "SELECT * FROM stafflist INNER JOIN staffrole ON stafflist.staffno = staffrole.staffNum WHERE staffno='$staffno' AND sname='$sname'";
	$staff = mysqli_query($connection, $getstaff);
	confirm_query($staff);

	if (mysqli_num_rows($staff) < 1) {
		// Invalid staff
		$incorrectLogin = 'Staff details not found';
	} else {
		// Valid staff
		$staffrow = mysqli_fetch_array($staff);
		$_SESSION['staffRoleId'] = $staffrow['staffRoleId'];
		$_SESSION['fname'] = $staffrow['fname'];
		$_SESSION['adminroleid'] = $staffrow['staffRoleNo'];
		$_SESSION['staffno'] = $staffrow['staffno'];
		$_SESSION['is_adminlogged_in'] = true;
		$adminid = $_SESSION['staffRoleId'];
		$logtime = date('Y-m-d H:i:s');

		$updating = "UPDATE staffrole SET loginTime = '$logtime' WHERE staffRoleId = '$adminid'";
		$updated = mysqli_query($connection, $updating);

		if ($_SESSION['adminroleid'] == 1) {
			$_SESSION['adminrole'] = "Administrator";
			header("Location:dashboard.php");
		} else {
			$_SESSION['adminrole'] = "Supervisor";
			header("Location:models/mystudentview.php");
		}
	}
}
?>
<?php require('views/header.php'); ?>

<div id="page-content">
	<div class="container">
		<div class="row">
			<div class="col-sm-8 page-content">
				<div class="white-container">
					<div class="header-banner">
						<div class="flexslider header-slider">
							<ul class="slides">
								<li>
									<img src="assets/img/transparent.png" alt="">
									<div data-image="assets/img/content/lab.png"></div>
								</li>

								<li>
									<img src="assets/img/transparent.png" alt="">
									<div data-image="assets/img/content/architect.png"></div>
								</li>

								<li>
									<img src="assets/img/transparent.png" alt="">
									<div data-image="assets/img/content/scientist.jpg"></div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<div class="col-sm-4 page-sidebar">
				<aside>
					<div class="widget sidebar-widget white-container contact-form-widget"><a href="index.php"><button style="float:right;" name='op'><i class="fa fa-lock"></i> User Sign In</button></a>
						<h5 class="widget-title">Admin Sign In</h5>

						<div class="widget-content">
							<?php if (isset($incorrectLogin)) : ?>
								<div class='alert alert-error'>
									<h6><?php echo $incorrectLogin; ?></h6>
									<a href='#' class='close fa fa-times'></a>
								</div>
							<?php endif; ?>
							<form class="mt30" action='' method='POST'>
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Staff No." name='staffno' required>
									<input type="password" class="form-control" placeholder="Surname" name='sname' required>
								</div>

								<button type="submit" class="btn btn-default" name='submit'><i class="fa fa-lock"></i> Sign In</button>
							</form>
						</div>
					</div>
				</aside>
			</div>
		</div>
	</div> <!-- end .container -->
</div> <!-- end #page-content -->

<?php require('views/footer.php'); ?>