<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<link rel="apple-touch-icon" sizes="76x76" href="<?php echo url_for('/assets/img/favicon.png'); ?>">
		<link rel="icon" type="image/png" href="<?php echo url_for('/assets/img/favicon.png'); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
		<title>F1 <?php if (isset($page_title)) { echo '| ' . h($page_title); } ?></title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport'/>
        
		<!-- Adobe Fonts -->
        <link rel="stylesheet" href="https://use.typekit.net/qah3bmy.css">
        
		<!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/2df6258c61.js" crossorigin="anonymous"></script>
        
		<!-- Main CSS -->
		<link href="<?php echo url_for('assets/css/main.css'); ?>" rel="stylesheet"/>

        
		<!-- Animation CSS -->
		<link href="<?php echo url_for('assets/css/vendor/aos.css'); ?>" rel="stylesheet"/>
	</head>

<body>


<nav class="topnav navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
<div class="container">
	<a class="navbar-brand" href="<?php echo url_for('/index.php'); ?>"><i class="fas fa-flag-checkered mr-2"></i><strong>Formula</strong> One</a>
	<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
	</button>
	<div class="navbar-collapse collapse" id="navbarColor02">
		<ul class="navbar-nav mr-auto d-flex align-items-center">
			<li class="nav-item">
				<a class="nav-link" href="<?php echo url_for('/races.php'); ?>">Races</a>
			</li>
			<li>
				<a class="nav-link" href="<?php echo url_for('/about.php'); ?>">About</a>
			</li>
		</ul>
		<ul class="navbar-nav ml-auto d-flex align-items-center">
			<li class="nav-item">
			<span class="nav-link" href="#">
			<a class="plain-link bg-transparent" href="<?php echo url_for('/register.php'); ?>"><i class="fas fa-user-plus"></i> Register <a href="#signup" class="hidden"></a>
			</a>
			</span>
			</li>
			<li class="nav-item">
			<span class="nav-link" href="#">
			<a class="btn btn-secondary btn-round" href="<?php echo url_for('/sign-in.php'); ?>"><i class="fas fa-sign-in-alt"></i> Sign In <a href="#signin" class="hidden"></a>
			</a>
			</span>
			</li>
		</ul>
	</div>
</div>
</nav>