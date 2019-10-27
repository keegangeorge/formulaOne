
<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="utf-8"/>
		<link rel="apple-touch-icon" sizes="76x76" href="./assets/img/favicon.png">
		<link rel="icon" type="image/png" href="./assets/img/favicon.png">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
		<title>F1 | Register</title>
		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport'/>
		<!-- Adobe Fonts -->
		<link rel="stylesheet" href="https://use.typekit.net/qah3bmy.css">
		<!-- Font Awesome Icons -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
		<!-- Main CSS -->
		<link href="./assets/css/main.css" rel="stylesheet"/>
		<!-- Animation CSS -->
		<link href="./assets/css/vendor/aos.css" rel="stylesheet"/>
	</head>
<body> 
    
    
<?php require("includes/navigation.php"); ?>

    
<!-- Main -->
<div class="d-md-flex h-md-100 align-items-center">
	<div class="col-md-6 p-0 bg-primary h-md-100">
		<div class="text-white d-md-flex align-items-center h-100 p-5 text-center justify-content-center">
			<div class="logoarea pt-5 pb-5" data-aos="fade">
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
			<form class="border rounded p-5" method="post" action="registration-process.php">
				<h3 class="mb-4 text-center">Register an Account</h3>
				<div class="form-group">
					<input type="text" name="firstname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="First Name" required>
				</div>					
				<div class="form-group">
					<input type="text" name="lastname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Last Name" required>
				</div>				
				<div class="form-group">
					<input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="E-mail" required>
				</div>
				<div class="form-group">
					<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
					<small id="emailHelp" class="form-text text-muted">Use 8 or more characters with a mix of letters, numbers & symbols</small>
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
  disable: function () {
    var maxWidth = 1200;
    return window.innerWidth < maxWidth;
  }
});
</script>

</body>
</html>