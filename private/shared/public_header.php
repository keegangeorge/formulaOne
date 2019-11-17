<!DOCTYPE html>
<html lang="en">

<!-- Document Head START -->

<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo url_for('assets/img/favicon.png'); ?>">
	<link rel="icon" type="image/png" href="<?php echo url_for('assets/img/favicon.png'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<!-- If a page title is set, show it next to F1 text -->
	<title>
		F1
		<?php
		if (isset($page_title)) {
			echo '| ' . h($page_title);
		}
		?>
	</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

	<!-- Adobe Fonts -->
	<link rel="stylesheet" href="https://use.typekit.net/qah3bmy.css">

	<!-- Font Awesome Icons -->
	<script src="https://kit.fontawesome.com/2df6258c61.js" crossorigin="anonymous"></script>

	<!-- Main CSS -->
	<link href="<?php echo url_for('assets/css/main.css'); ?>" rel="stylesheet" />

	<!-- Animation CSS -->
	<link href="<?php echo url_for('assets/css/vendor/aos.css'); ?>" rel="stylesheet" />



	<!-- Collapsible Table CSS -->
	<style>
		a[aria-expanded=false] .fa-chevron-down {
			display: none;
		}

		a[aria-expanded=true] .fa-chevron-right {
			display: none;
		}
	</style>
	<!-- Landing Page Background CSS -->
	<style>
		.home-bgimg {
			<?php if (is_logged_in()) { ?>background-image: url("assets/img/landing-img/img4.jpg");
			<?php } else { ?>background-image: url("assets/img/landing-img/img1.jpg");
			<?php } ?>
			/* background-color: #cccccc;
			/* Used if the image is unavailable */
			height: 100%;
			/* You must set a specified height */
			background-position: center;
			/* Center the image */
			background-repeat: no-repeat;
			background-size: 110%;
			/* Do not repeat the image */
			/* background-size: cover; */
			/* Resize the background image to cover the entire container */
			transition: .3s linear;
		}
	</style>
</head>
<!-- Document Head END -->

<body>



	<nav class="
<?php
// If a white navigation bar is preferred:
if ($whiteNav) {
	echo "topnav navbar navbar-expand-lg scrollednav navbar-light text-black bg-white fixed-top shadow-sm py-0 border-bottom border-muted";
	// If a dark navigation bar is preferred: 
} else {
	echo "topnav navbar navbar-expand-lg navbar-dark fixed-top ";
}

?>">
		<div class="container">
			<!-- Navigation Bar Branding Section -->
			<a class="navbar-brand <?php if ($whiteNav) {
										echo 'text-dark';
									} ?>" href="<?php echo url_for('/index.php'); ?>"><i class="fas fa-flag-checkered mr-2"></i><strong>Formula</strong> One</a>
			<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<!-- Navigation Bar Links -->
			<div class="navbar-collapse collapse" id="navbarColor02">
				<ul class="navbar-nav mr-auto d-flex align-items-center">
					<li class="nav-item">
						<a class="nav-link <?php if ($whiteNav) {
												echo 'text-muted';
											} ?>" href="<?php echo url_for('/races.php'); ?>">Races</a>
					</li>
					<li>
						<a class="nav-link <?php if ($whiteNav) {
												echo 'text-muted';
											} ?>" href="<?php echo url_for('/about.php'); ?>">About</a>
					</li>
				</ul>
				<!-- User Login Related Links -->
				<ul class="navbar-nav ml-auto d-flex align-items-center">
					<!-- Show username in navigation when logged in -->
					<li class="nav-item">
						<?php if (is_logged_in()) { ?>
							<a class="nav-link" href="<?php echo url_for('/account.php'); ?>">
								<i class="fas fa-user-circle"></i>
								<?php echo $_SESSION['username']; ?>
							</a>
						<?php
						} else {
							echo '';
						}
						?>
					</li>

					<!-- Show register button when logged out -->
					<li class="nav-item">
						<?php if (!is_logged_in()) { ?>
							<span class="nav-link">
								<a class="plain-link bg-transparent" href="<?php echo url_for('/register.php'); ?>"><i class="fas fa-user-plus"></i> Register <a href="#signup" class="hidden"></a>
								</a>
							</span>
						<?php } else {
							echo '';
						} ?>
					</li>

					<!-- Show sign-in if logged out, sign out if logged in -->
					<li class="nav-item">
						<span class="nav-link">
							<?php if (is_logged_in()) { ?>
								<a class="btn btn-secondary btn-round" href="<?php echo url_for('/sign-out.php'); ?>">
									<i class="fas fa-sign-out-alt"></i>
									Sign Out
								</a>
							<?php } else { ?>
								<a class="btn btn-secondary btn-round" href="<?php echo url_for('/sign-in.php'); ?>">
									<i class="fas fa-sign-in-alt"></i>
									Sign In
								</a>
							<?php } ?>
						</span>
					</li>
				</ul>
			</div>
		</div>
	</nav>