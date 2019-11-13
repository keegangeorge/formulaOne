<footer class="bg-primary pt-5 pb-5">
	<div class="container">
		<div class="row">
			<!-- Logo and Copyright Area -->
			<div class="col-12 col-md mr-4 text-white">
				<i class="fas fa-flag-checkered fa-3x"></i>
				<small class="d-block mt-3 mb-4 text-muted">©
					<script>
						document.write(new Date().getFullYear())
					</script>
					<a target="_blank" class="text-muted" href="https://keegangeorge.com">Keegan George</a> & <a target="_blank" class="text-muted" href="https://apoorvabitton.com">Apoorva Bitton</a></small>
			</div>
			<!-- Races Column -->
			<div class="col-6 col-md">
				<h5 class="mb-4 text-white">Races</h5>
				<ul class="list-unstyled text-small">
					<li><a class="text-muted" href="<?php echo url_for('/races.php?year=2019&country=All'); ?>">View by Season</a></li>
					<li><a class="text-muted" href="<?php echo url_for('/races.php?year=2019&country=All'); ?>">View by Country</a></li>
					<li><a class="text-muted" href="<?php echo url_for('/index.php#upcoming'); ?>">Upcoming Races</a></li>
				</ul>
			</div>
			<!-- About Column -->
			<div class="col-6 col-md">
				<h5 class="mb-4 text-white">About</h5>
				<ul class="list-unstyled text-small">
					<li><a class="text-muted" href="<?php echo url_for('/about.php'); ?>">About F1</a></li>
					<li><a class="text-muted" href="<?php echo url_for('/about.php'); ?>">About F1</a></li>
					<li><a class="text-muted" href="<?php echo url_for('/index.php'); ?>">FAQ</a></li>
				</ul>
			</div>
			<!-- Membership Column -->
			<div class="col-6 col-md">
				<h5 class="mb-4 text-white">Membership</h5>
				<ul class="list-unstyled text-small">
					<!-- Show sign-out link instead if user is logged in -->
					<?php if (is_logged_in()) { ?>
						<li><a class="text-muted" href="<?php echo url_for('/sign-out.php'); ?>">Sign Out</a></li>
						<!-- Show register and sign-in links if user is logged out -->
					<?php } else { ?>
						<li><a class="text-muted" href="<?php echo url_for('/register.php'); ?>">Register</a></li>
						<li><a class="text-muted" href="<?php echo url_for('/sign-in.php'); ?>">Sign In</a></li>
					<?php } ?>
				</ul>
			</div>
			<!-- News Column -->
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

<!------------------------- JAVASCRIPT REFERENCES ---------------------------->
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
	$(function() {
		$('[data-toggle="tooltip"]').tooltip()
	})
	AOS.init({
		disable: function() {
			var maxWidth = 1200;
			return window.innerWidth < maxWidth;
		}
	});
</script>

</body>

</html>