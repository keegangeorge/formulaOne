<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<link rel="apple-touch-icon" sizes="76x76" href="./assets/img/favicon.png">
		<link rel="icon" type="image/png" href="./assets/img/favicon.png">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
		<title>F1 | Home</title>
		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport'/>
		<!-- Adobe Fonts -->
		<link rel="stylesheet" href="https://use.typekit.net/qah3bmy.css">
		<!-- Font Awesome Icons -->
		<script src="https://kit.fontawesome.com/2df6258c61.js" crossorigin="anonymous"></script>
		<!-- Main CSS -->
		<link href="./assets/css/main.css" rel="stylesheet"/>
		<!-- Animation CSS -->
		<link href="./assets/css/vendor/aos.css" rel="stylesheet"/>
	</head>

<body>

<?php require("includes/navigation.php"); ?>


<!-------------------------------------
HEADER
--------------------------------------->
<div class="jumbotron jumbotron-lg jumbotron-fluid mb-0 pb-5 bg-primary position-relative">
    <div class="container-fluid text-white h-100">
        <div class="d-lg-flex align-items-center justify-content-between text-center pl-lg-5">
            <div class="col pt-4 pb-4">
				<h1 class="display-3">
					<strong>Formula 1</strong>
					<br>Race History
				</h1>
                <h5 class="font-weight-light mb-4">View all race information since the <strong> 1950&#8217;s</strong></strong></h5>
                <a href="./about.php" class="btn btn-lg btn-outline-white btn-round">Learn more</a>
            </div>
            <div class="col align-self-bottom align-items-right text-right h-max-380 position-relative z-index-1">
				<img data-aos="fade-up" src="assets/img/f1car.png" class="rounded img-fluid">
            </div>
        </div>
    </div>
</div>

<!--- END HEADER -->


<!--------------------------------------
FEATURES
--------------------------------------->
<div class="container pt-5 pb-3 mt-4" data-aos="fade">
	<div class="row gap-y">
		<div class="col-md-6 col-xl-4">
			<div class="media">
				<div class="iconbox iconlarge bg-secondary rounded-circle text-white mr-4">
					<i class="fas fa-globe-europe "></i>
				</div>
				<div class="media-body">
					<h5>Global</h5>
					<p class="text-muted">
						 Races occur in a variety of host countries around the world where each location has a unique circuit.
					</p>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-xl-4">
			<div class="media">
				<div class="iconbox iconlarge bg-primary rounded-circle text-white mr-4">
					<i class="fas fa-cog"></i>
				</div>
				<div class="media-body">
					<h5>Engineering</h5>
					<p class="text-muted">
						 See the marvels of engineering put in actions as teams develop unique vehicles to compete for fastest time.
					</p>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-xl-4">
			<div class="media">
				<div class="iconbox iconlarge bg-secondary rounded-circle text-white mr-4">
					<i class="fas fa-tachometer-alt"></i>
				</div>
				<div class="media-body">
					<h5>Speed</h5>
					<p class="text-muted">
						The cars are the fastest road-course cars in the world. With high cornering speeds achieved through aerodynamics.
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Features -->

<!-- Start Recent Races -->
  <div class="container pt-5 pb-5 mt-4" data-aos="fade">
    <h2><strong>Recent and Upcoming Races</strong></h2>
    <div class="row gap-y">
      <div class="col-md-6 col-xl-4">

        <div class="card shadow-sm border-0">
          <img class="card-img-top" src="./assets/img/recent-race-img/Hungary.jpg" alt="Card image cap">
          <div class="card-body">
			<h5 class="card-title text-secondary">ROLEX MAGYAR NAGYDÍJ 2019</h5>
			<div class="row ml-0">
			<i class="fas fa-calendar-day mr-2 text-primary"></i>
				<h6>Aug. 2 - 4 2019</h6>
			</div>
			<div class="row ml-0">
				<i class="fas fa-map-marker-alt mr-2 text-primary"></i>
				<h6>Hungary</h6>
			</div>					
			<div class="row ml-0">
				<i class="fas fa-trophy mr-2 text-primary"></i>
				<h6>Lewis Hamilton</h6>
			</div>			
            <a href='#' class='btn btn-sm btn-primary text-white'>
				View Details
			</a>
          </div>
        </div>
	  </div>

      <div class="col-md-6 col-xl-4">
        <div class="card shadow-sm border-0">
          <img class="card-img-top" src="./assets/img/recent-race-img/Mexico.jpg" alt="Card image cap">
		  <div class="card-body">
			<h5 class="card-title text-secondary">GRAN PREMIO DE MÉXICO 2019</h5>
			<div class="row ml-0">
			<i class="fas fa-calendar-day mr-2 text-primary"></i>
				<h6>Oct. 25 - 27 2019</h6>
			</div>
			<div class="row ml-0">
				<i class="fas fa-map-marker-alt mr-2 text-primary"></i>
				<h6>Mexico</h6>
			</div>					
			<div class="row ml-0">
				<i class="fas fa-trophy mr-2 text-primary"></i>
				<h6>NYD</h6>
			</div>			
            <a href='#' class='btn btn-sm btn-primary text-white'>
				View Details
			</a>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-xl-4">
        <div class="card shadow-sm border-0">
          <img class="card-img-top" src="./assets/img/recent-race-img/Azerbaijan.jpg" alt="Card image cap">
		  <div class="card-body">
			<h5 class="card-title text-secondary">SOCAR AZERBAIJAN 2019</h5>
			<div class="row ml-0">
			<i class="fas fa-calendar-day mr-2 text-primary"></i>
				<h6>Apr. 26 - 28 2019</h6>
			</div>
			<div class="row ml-0">
				<i class="fas fa-map-marker-alt mr-2 text-primary"></i>
				<h6>Azerbaijan</h6>
			</div>					
			<div class="row ml-0">
				<i class="fas fa-trophy mr-2 text-primary"></i>
				<h6>Valtteri Bottas</h6>
			</div>			
            <a href='#' class='btn btn-sm btn-primary text-white'>
				View Details
			</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Recent Races -->



  <!-- Start News Items -->
  <div class="container">
  <h2><strong>News</strong></h2>

  <div class="row gap-y"  data-aos="fade-up">
		<div class="col-md-6 col-lg-4">
			<div class="card">
				<img class="img-card-top" src="./assets/img/news-item-img/esports-roster.jpg">
				<div class="card-body">
					<a href="https://www.formula1.com/en/latest/article.fdas-tonizza-continues-to-lead-the-2019-f1-new-balance-esports-pro-series.3p2aT806MO0cw2XIfuBjUF.html" target="_blank">
					<h5 class="card-title text-dark">FDA’s Tonizza continues to lead the 2019 F1 New Balance Esports Pro Series</h5>
					<span class="card-text text-muted">
					Posted on Oct. 02, 2019</span>
					</a>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-lg-4">
			<div class="card pb-4">
				<img class="img-card-top" src="./assets/img/news-item-img/russia.jpg">
				<div class="card-body">
					<a href="https://www.formula1.com/en/latest/article.ferrari-to-run-vettel-in-extra-pirelli-test-pre-japan.75Tpodf53gSv1ir8e5PmEh.html" target="_blank">
					<h5 class="card-title text-dark">Ferrari to run Vettel in extra Pirelli test pre-Japan</h5>
					<span class="card-text text-muted">
					Posted on Oct 02, 2019</span>
					</a>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-lg-4">
			<div class="card">
				<img class="img-card-top" src="./assets/img/news-item-img/singapore.jpg">
				<div class="card-body">
					<a href="formula1.com/en/latest/article.a-lost-opportunity-why-renault-wanted-a-stronger-partnership-with-mclaren.6ARaPKbGYeRdHXsZNqTydu.html" target="_blank">
					<h5 class="card-title text-dark">‘A lost opportunity’ – Why Renault wanted a stronger partnership with McLaren</h5>
					<span class="card-text text-muted">
					Posted on Oct 02, 2019 </span>
					</a>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-lg-4">
			<div class="card">
				<img class="img-card-top" src="./assets/img/news-item-img/power-rankings.jpg">
				<div class="card-body">
					<a href="https://www.formula1.com/en/latest/article.power-rankings-which-former-champion-has-fallen-out-of-the-top-10-after.3n0esTPWAWmnjzwY3c2jzm.html" target="_blank">
					<h5 class="card-title text-dark">POWER RANKINGS: Which former champion has fallen out of the top 10 after Russia?</h5>
					<span class="card-text text-muted">
					Posted on Oct 02, 2019 </span>
					</a>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-lg-4">
			<div class="card">
				<img class="img-card-top" src="./assets/img/news-item-img/carlos.jpg">
				<div class="card-body">
					<a href="https://www.formula1.com/en/latest/article.f1-partners-with-complex-to-launch-new-content-series-the-pit-hosted-by.1oQe5B4sZFxY1wnUe0dlio.html" target="_blank">
					<h5 class="card-title text-dark">F1 partners with Complex to launch new content series, The Pit, hosted by A$AP Ferg</h5>
					<span class="card-text text-muted">
					Posted on Oct 03, 2019 </span>
					</a>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-lg-4">
			<div class="card pb-4">
				<img class="img-card-top" src="./assets/img/news-item-img/greg.jpg">
				<div class="card-body">
					<a href="https://www.formula1.com/en/latest/article.f1-fantasy-how-williams-tough-weekend-in-russia-hurt-players.46Ek0VO3A3zVQBBoN3nU1q.html" target="_blank">
					<h5 class="card-title text-dark">F1 FANTASY: How Williams’ tough weekend in Russia hurt players</h5>
					<span class="card-text text-muted">
					Posted on May 24, 2019 by Sal </span>
					</a>
				</div>
			</div>
		</div>
	</div>
  </div>

  <!-- End News Items -->




<!--------------------------------------
FAQ
--------------------------------------->
<div class="container pt-5 pb-5" data-aos="fade-up">
	<div class="text-center pt-3 pb-4">
		<h2>Frequently Asked Questions</h2>
		<p class="text-muted">
			 Transparent answers, licensing and lore ipsum super funny.
		</p>
	</div>
	<div class="row gap-y justify-content-center">
		<div class="col-md-5">
			<h5>What is Anchor Bootstrap UI Kit?</h5>
			<p class="text-muted">
				 Anchor Bootstrap UI Kit is a set of polished components that you can use for building your own template. This page is built with it.
			</p>
		</div>
		<div class="col-md-5">
			<h5>Is it updated to Bootstrap?</h5>
			<p class="text-muted">
				 Yes, Anchor Bootstrap UI Kit is built with the latest Bootstrap version and will be updated whenever a new version is released.
			</p>
		</div>
		<div class="col-md-5">
			<h5>Can I use it for commercial projects?</h5>
			<p class="text-muted">
				 Absolutely! Use Anchor Bootstrap UI Kit for any personal and commercial projects.
			</p>
		</div>
		<div class="col-md-5">
			<h5>Is there a way to thank you?</h5>
			<p class="text-muted">
				 That is very nice of you. Sure, I would gladly accept a cup of coffee <a href="https://www.paypal.me/wowthemes/10">here</a>.
			</p>
		</div>
	</div>
</div>
<!-- End FAQ -->


<!--------------------------------------
CTA
--------------------------------------->
<img src="./assets/img/sponsor-banner.jpg" alt="">

<div class="pt-4 pb-5 mb-5" data-aos="fade-up">
	<div class="pb-4 text-center">
		<h2>Ready? <strong><span class="text-white">Start</span> your free trial!</strong></h2>
		<p class="text-muted">
			 A lot of features to develop your own lore ipsum. No credit card required.
		</p>
	</div>
	<form class="row justify-content-center">
		<div class="col-md-3">
			<input type="text" class="form-control input-round w-100 form-control-lg" placeholder="First name*">
		</div>
		<div class="col-md-3">
			<input type="text" class="form-control input-round w-100 form-control-lg" placeholder="E-mail address*">
		</div>
		<div class="col-md-3">
			<button type="submit" class="btn btn-info btn-round btn-lg w-100">Start Free</button>
		</div>
	</form>
</div>
<!-- End CTA -->
<div class="modal fade" id="modal_signin" tabindex="-1" role="dialog" aria-labelledby="modal_signin" aria-hidden="true">
	<div class="modal-dialog shadow-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<div class="d-flex align-items-center justify-content-center">
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
			<div class="bg-white loginarea">
			<div class="d-sm-flex align-items-center  justify-content-center">
			<!-- User Signin Form -->
			<form class="p-1">
				<h3 class="mb-4 text-center">Sign In</h3>
				<div class="form-group">
					<input type="email" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="E-mail" required="">
				</div>
				<div class="form-group">
					<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required="">
				</div>
				<div class="form-group form-check">
					<input type="checkbox" class="form-check-input" id="exampleCheck1">
					<label class="form-check-label small text-muted" for="exampleCheck1">Remember me</label>
				</div>
				<button type="submit" name="submit" class="btn btn-primary btn-round btn-block">Sign in</button>
				<small class="d-block mt-4 text-center"><a class="text-gray" href="#">Forgot your password?</a></small>
			</form>
			<!-- User Signin Form End -->

			</div>
			</div>
		</div>
	</div>
</div>
</div>



<!--------------------------------------
END DEMO MODAL & DONATE BUTTON
--------------------------------------->


<!--------------------------------------
FOOTER
--------------------------------------->
<!-- <footer class="bg-black pb-5">
<div class="container">
	<div class="row">
		<div class="col-12 col-md mr-4">
			<i class="fas fa-copyright text-white"></i>
			<small class="d-block mt-3 mb-4 text-muted">©
			<script>document.write(new Date().getFullYear())</script>
			 Keegan George & Apoorva Bitton</a></small>
		</div>
		<div class="col-6 col-md">
			<h5 class="mb-4 text-white">Features</h5>
			<ul class="list-unstyled text-small">
				<li><a class="text-muted" href="#">Cool stuff</a></li>
				<li><a class="text-muted" href="#">Random feature</a></li>
				<li><a class="text-muted" href="#">Team feature</a></li>
				<li><a class="text-muted" href="#">Stuff for developers</a></li>
			</ul>
		</div>
		<div class="col-6 col-md">
			<h5 class="mb-4 text-white">Resources</h5>
			<ul class="list-unstyled text-small">
				<li><a class="text-muted" href="#">Resource</a></li>
				<li><a class="text-muted" href="#">Resource name</a></li>
				<li><a class="text-muted" href="#">Another resource</a></li>
				<li><a class="text-muted" href="#">Final resource</a></li>
			</ul>
		</div>
		<div class="col-6 col-md">
			<h5 class="mb-4 text-white">Utilities</h5>
			<ul class="list-unstyled text-small">
				<li><a class="text-muted" href="#">Business</a></li>
				<li><a class="text-muted" href="#">Education</a></li>
				<li><a class="text-muted" href="#">Government</a></li>
				<li><a class="text-muted" href="#">Gaming</a></li>
			</ul>
		</div>
		<div class="col-6 col-md">
			<h5 class="mb-4 text-white">About</h5>
			<ul class="list-unstyled text-small">
				<li><a class="text-muted" href="#">Team</a></li>
				<li><a class="text-muted" href="#">Locations</a></li>
				<li><a class="text-muted" href="#">Privacy</a></li>
				<li><a class="text-muted" href="#">Terms</a></li>
			</ul>
		</div>
	</div>
</div>
</footer> -->



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
AOS.init({
  disable: function () {
    var maxWidth = 1200;
    return window.innerWidth < maxWidth;
  }
});
</script>

</body>
</html>
