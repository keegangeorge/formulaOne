<?php require_once('../private/initialize.php');


$errors = [];
$username = '';
$password = '';

if (is_post_request()) {

	$username = $_POST['username'] ?? '';
	$password  = $_POST['password'] ?? '';

	// Validations
	if (is_blank($username)) {
		$errors[] = "Username cannot be blank.";
	}
	if (is_blank($password)) {
		$errors[] = "Password cannot be blank.";
	}

	// If there were no errors, attempt to login
	if (empty($errors)) {
		
		// Using one variable ensures that msg is the same.
		$login_failure_msg = "Log in was unsuccessful.";
		
		$admin = find_admin_by_username($username);
		if ($admin) {

			// if record is found
			if (password_verify($password, $admin['hashed_password'])) {
				// password matches
				log_in_admin($admin);
				redirect_to(url_for('/index.php'));
			} else {
				// username found, but password does not match
				$errors[] = $login_failure_msg;
			}

		} else {
			// no username found
			$errors[] = $login_failure_msg;
		}
	}

}


?>

<?php $page_title = 'Sign in'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>


    
<!-- Main -->
<div class="d-md-flex h-md-100 align-items-center">
	<div class="col-md-6 p-0 bg-primary h-md-100">
		<div class="text-white d-md-flex align-items-center h-100 p-5 text-center justify-content-center">
			<div class="logoarea pt-5 pb-5" data-aos="fade">
				<p>
					<i class="fas fa-flag-checkered fa-3x"></i>
				</p>
				<h1 class="mb-0 mt-3 display-4">Formula One</h1>
				<h5 class="font-weight-light text-gray">Sign in to your account
				</h5>				
				<h5 class="mb-4 font-weight-light text-muted">Don't have an account? <a class="text-muted" href="./register.php">Create one</a>
				</a> instead
				</h5>
			</div>
		</div>
	</div>
	<div class="col-md-6 p-0 bg-white h-md-100 loginarea">
		<div class="d-md-flex align-items-center h-md-100 p-5 justify-content-center" data-aos="fade">


			<form class="border rounded p-5" method="post" action="sign-in.php">
				<h3 class="mb-4 text-center">Sign in</h3>

				<?php echo display_errors($errors); ?>

				<!-- Username Field -->
				<div class="form-group">
					<input type="text" name="username" value="<?php echo h($username); ?>" class="form-control" placeholder="Username" required>
				</div>
				<!-- Password Field -->
				<div class="form-group">
					<input type="password" name="password" class="form-control" placeholder="Password" required>
				</div>

				<div class="form-group form-check">
					<input type="checkbox" class="form-check-input">
					<label class="form-check-label small text-muted" for="exampleCheck1">Remember me</label>
				</div>

				<button type="submit" name="submit" class="btn btn-success btn-round btn-block shadow-sm">Sign in</button>

				<small class="d-block mt-4 text-center"><a class="text-gray" href="#">Forgot your password?</a></small>

			</form>
			<!-- END SIGN IN FORM -->
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
  disable: function () {
    var maxWidth = 1200;
    return window.innerWidth < maxWidth;
  }
});
</script>

</body>
</html>