<?php require_once '../private/initialize.php'; ?>

<?php
if (is_post_request()) {
	$member['first_name'] = $_POST['first_name'] ?? '';
	$member['last_name'] = $_POST['last_name'] ?? '';
	$member['email'] = $_POST['email'] ?? '';
	$member['username'] = $_POST['username'] ?? '';
	$member['password'] = $_POST['password'] ?? '';
	$member['confirm_password'] = $_POST['confirm_password'] ?? '';

	$result = insert_member($member);
	if ($result === true) {
		$new_id = mysqli_insert_id($db);
		$_SESSION['message'] = 'member created.';
		redirect_to(url_for('/sign-in.php'));
	} else {
		$errors = $result;
	}
} else {
	// display the blank form
	$member = [];
	$member['first_name'] = '';
	$member['last_name'] = '';
	$member['email'] = '';
	$member['username'] = '';
	$member['password'] = '';
	$member['confirm_password'] = '';
}
?>

<?php $page_title = 'Registration'; ?>
<?php include SHARED_PATH . '/public_header.php'; ?>


<!-- Main -->
<div class="d-md-flex h-md-100 align-items-center">
	<div class="col-md-6 p-0 bg-primary h-md-100">
		<div class="text-white d-md-flex align-items-center h-100 p-5 text-center justify-content-center" data-aos="fade">
			<div class="logoarea pt-5 pb-5" data-aos="fade-right">
				<p>
					<i class="fas fa-flag-checkered fa-3x"></i>
				</p>
				<h1 class="mb-0 mt-3 display-4">Formula One</h1>
				<h5 class="font-weight-light text-gray">Create an account to access more features
				</h5>
				<h5 class="mb-4 font-weight-light text-muted">Already have an account? <a class="text-muted" href="./sign-in.php">Sign In</a>
					</a> instead
				</h5>
			</div>
		</div>
	</div>

	<div class="col-md-6 p-0 bg-white h-md-100 loginarea">
		<div class="d-md-flex align-items-center h-md-100 p-5 justify-content-center" data-aos="fade">

			<form class="m-5 border rounded p-5" method="post" action="<?php echo url_for('/register.php'); ?>" data-aos="fade-left">
				<h3 class="mb-4 text-center">Register an Account</h3>

				<?php echo display_errors($errors); ?>

				<div class="row">
					<div class="col-6">
						<div class="form-group">
							<input type="text" name="first_name" class="form-control" value="<?php echo h($member['first_name']); ?>" placeholder="First Name" required>
						</div>
					</div>
					<div class="col-6">
						<div class="form-group">
							<input type="text" name="last_name" class="form-control" value="<?php echo h($member['last_name']); ?>" placeholder="Last Name" required>
						</div>
					</div>
				</div>
				<div class="form-group">
					<input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo h($member['email']); ?>" placeholder="E-mail" required>
				</div>
				<div class="form-group">
					<input type="text" name="username" class="form-control" value="<?php echo h($member['username']); ?>" placeholder="Username" required>
				</div>
				<div class="form-group">
					<input type="password" name="password" class="form-control" placeholder="Password" value="" required>
				</div>
				<div class="form-group">
					<input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" value="" required>
					<small class="form-text text-center text-muted mt-3">Password must be 12+ characters including at least one uppercase letter, lowercase letter, number, and symbol.</small>
				</div>
				<button type="submit" name="submit" class="btn btn-success btn-round btn-block shadow-sm">Register</button>
				<small class="d-block mt-4 text-center"><a class="text-gray" href="#">Forgot your password?</a></small>

			</form>
		</div>
	</div>
</div>

<!-- End Main -->








<!--------------------------------------
JAVASCRIPTS
--------------------------------------->
<script src="./assets/js/vendor/jquery.min.js" type="text/javascript"></script>
<script src="./assets/js/vendor/popper.min.js" type="text/javascript"></script>
<script src="./assets/js/vendor/bootstrap.min.js" type="text/javascript"></script>
<script src="./assets/js/functions.js" type="text/javascript"></script>

<!-- Animation -->
<script src="./assets/js/vendor/aos.js" type="text/javascript"></script>
<noscript>
	<style>
		*[data-aos] {
			display: block !important;
			opacity: 1 !important;
			visibility: visible !important;
		}
	</style>
</noscript>
<script>
	AOS.init({
		duration: 700
	});
</script>

<!-- Disable animation on less than 1200px, change value if you like -->
<script>
	AOS.init({
		disable: function() {
			var maxWidth = 1200;
			return window.innerWidth < maxWidth;
		}
	});
</script>

</body>

</html>