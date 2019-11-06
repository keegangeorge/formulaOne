<footer class="bg-primary pt-5 pb-5">
<div class="container">
	<div class="row">
		<div class="col-12 col-md mr-4 text-white"> 
			<i class="fas fa-flag-checkered fa-3x"></i>
			<small class="d-block mt-3 mb-4 text-muted">©
			<script>document.write(new Date().getFullYear())</script>
			 <a target="_blank" class="text-muted" href="https://keegangeorge.com">Keegan George</a> & <a target="_blank" class="text-muted" href="https://apoorvabitton.com">Apoorva Bitton</a></small>
		</div>
		<div class="col-6 col-md">
			<h5 class="mb-4 text-white">Races</h5>
			<ul class="list-unstyled text-small">
				<li><a class="text-muted" href="<?php echo url_for('/races.php'); ?>">View by Year</a></li>
				<li><a class="text-muted" href="<?php echo url_for('/races.php'); ?>">View by Season</a></li>
				<li><a class="text-muted" href="<?php echo url_for('/races.php'); ?>">View by Team</a></li>
				<li><a class="text-muted" href="<?php echo url_for('/races.php'); ?>">View by Driver</a></li>
			</ul>
		</div>
		<div class="col-6 col-md">
			<h5 class="mb-4 text-white">About</h5>
			<ul class="list-unstyled text-small">
				<li><a class="text-muted" href="<?php echo url_for('/about.php'); ?>">About the Site</a></li>
				<li><a class="text-muted" href="<?php echo url_for('/about.php'); ?>">About F1</a></li>
				<li><a class="text-muted" href="<?php echo url_for('/index.php'); ?>">FAQ</a></li>
				<li><a class="text-muted" href="<?php echo url_for('/about.php'); ?>">Terms</a></li>
			</ul>
		</div>
		<div class="col-6 col-md">
			<h5 class="mb-4 text-white">Membership</h5>
			<ul class="list-unstyled text-small">
				<li><a class="text-muted" href="<?php echo url_for('/register.php'); ?>">Register</a></li>
				<li><a class="text-muted" href="<?php echo url_for('/sign-in.php'); ?>">Sign In</a></li>
			</ul>
		</div>
		<div class="col-6 col-md">
			<h5 class="mb-4 text-white">News</h5>
			<ul class="list-unstyled text-small">
				<li><a class="text-muted" href="#">Recent</a></li>
				<li><a class="text-muted" href="#">Search</a></li>
			</ul>
		</div>
	</div>
</div>
</footer>

<!--------------------------------------
JAVASCRIPTS
--------------------------------------->
<script src="./assets/js/vendor/jquery.min.js" type="text/javascript"></script>
<script src="./assets/js/vendor/popper.min.js" type="text/javascript"></script>
<script src="./assets/js/vendor/bootstrap.min.js" type="text/javascript"></script>
<script src="./assets/js/functions.js" type="text/javascript"></script>

<!-- Parallax -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/parallax/3.1.0/parallax.min.js"></script>

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
	$(function () { $('[data-toggle="tooltip"]').tooltip() })
	AOS.init({
		disable: function() {
			var maxWidth = 1200;
			return window.innerWidth < maxWidth;
		}
	});
</script>

</body>

</html>