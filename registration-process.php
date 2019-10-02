
<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="utf-8"/>
		<link rel="apple-touch-icon" sizes="76x76" href="./assets/img/favicon.png">
		<link rel="icon" type="image/png" href="./assets/img/favicon.png">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
		<title>F1 | Registration Success!</title>
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
    
    
<!--------------------------------------
NAVBAR
--------------------------------------->
<nav class="topnav navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
<div class="container">
	<a class="navbar-brand" href="./index.php"><i class="fas fa-flag-checkered mr-2"></i><strong>Formula</strong> One</a>
	<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
	</button>
	<div class="navbar-collapse collapse" id="navbarColor02">
		<ul class="navbar-nav mr-auto d-flex align-items-center">
			<li>
				<a class="nav-link" href="./about.php">About</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="./docs.html">Races</a>
			</li>
		</ul>
	</div>
</div>
</nav>
<!-- End Navbar -->


   
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
				<h5 class="mb-4 font-weight-light text-muted">Already have an account? <a class="text-muted" href="#" data-toggle="modal" data-target="#modal_signin">Sign In <a href="#signin" class="hidden"></a>
				</a> instead
				</h5>
			</div>
		</div>
	</div>
	<div class="col-md-6 p-0 bg-white h-md-100 loginarea">
		<div class="d-md-flex align-items-center h-md-100 p-5 justify-content-center">
            
        <div class="border rounded p-5" data-aos="fade">
            <div class="text-center success-items">
                <i class="fas fa-check-circle fa-2x text-success"></i>
                <h3 class="text-success">Success!</h3>
                <p>An account has been created with the email address:</p>
            </div>
            <?php
                $email = (!empty($_POST['email']) ? $_POST['email'] : "");
                $password = (!empty($_POST['password']) ? $_POST['password'] : "");

                $file = 'user-accounts.txt';
                // OPEN CONNECTION
                if($handle = fopen($file, 'a+')) {
                    fwrite($handle, "$email,$password \n");

                    fclose($handle);
                } else {
                    echo "Could not open file for writing.";
                }

                    $content = "";
                    if($handle = fopen($file, 'r')) {
                        // READS CONTENT UNTIL FILE END
                        while(!feof($handle)) {
                            $content = fgets($handle);
                            if (!empty($content) ){
                            $account=explode(",", $content);
                            // echo "<p>" . $account[0];
                            }
                        }
                    fclose($handle);
                    }
                
                echo '<h4 class="text-center">' . $email . '</h4>';
                echo '<p class="text-center"><a class="text-muted" href="./index.php">Return to Homepage</a></p>';
            ?>
        </div>

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



