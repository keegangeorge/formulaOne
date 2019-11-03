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
<?php require("includes/navigation-member.php"); ?>


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

<!-- Start Favourites -->
  <div class="container pt-5 pb-5 mt-4" data-aos="fade">
    <h2><strong>Favourites</strong></h2>
    <div class="row gap-y">
      <div class="col-md-6 col-xl-4">

        <div class="card shadow-sm border-0">
          <img class="card-img-top" src="./assets/img/recent-race-img/Hungary.jpg" alt="Card image cap">
          <div class="card-body">
			<h5 class="card-title text-secondary">ROLEX MAGYAR NAGYDÍJ 2019 <i class="fas fa-heart text-secondary"></i></h5>
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
			<h5 class="card-title text-secondary">GRAN PREMIO DE MÉXICO 2019            <i class="fas fa-heart text-secondary"></i></h5>
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
      <!-- <div class="col-md-6 col-xl-4">
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
        </div> -->
      </div>
    </div>
  </div>
  <!-- End Favourite Races -->
  
  <!-- Start Recent Races -->
  <div class="container pt-5 pb-5 mt-4" data-aos="fade">
    <h2><strong>Recent and Upcoming Races</strong></h2>
    <div class="row gap-y">
      <div class="col-md-6 col-xl-4">

        <div class="card shadow-sm border-0">
          <img class="card-img-top" src="./assets/img/recent-race-img/Hungary.jpg" alt="Card image cap">
          <div class="card-body">
			<h5 class="card-title text-secondary">ROLEX MAGYAR NAGYDÍJ 2019 <i class="fas fa-heart text-secondary"></i></h5>
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
			<h5 class="card-title text-secondary">GRAN PREMIO DE MÉXICO 2019 <i class="fas fa-heart text-secondary"></i></h5>
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
			<h5 class="card-title text-secondary">SOCAR AZERBAIJAN 2019 <i class="far fa-heart text-secondary"></i></h5>
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

  <!--------------------------------------
CTA
--------------------------------------->

<div class="pt-4 pb-5 mb-5" data-aos="fade-up">
	<div class="pb-4 text-center">
		<img src="./assets/img/sponsors.jpg" alt="f1 sponsors">
	</div>
</div>
<!-- End CTA -->



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
			 Some common questions regarding F1
		</p>
	</div>
	<div class="row gap-y justify-content-center">
		<div class="col-md-5">
			<h5>What is Formula 1?</h5>
			<p class="text-muted">
				Formula 1 or F1 is the pinnacle of open wheel auto racing, sanctioned by the Fédération Internationale de l'Automobile (FIA). Each season is made up of various Grands Prix across the world, as of late, running from March to November each year. Each team competes with two drivers who battle for the World Drivers' Championship as well as the World Constructors' Championship.
			</p>
		</div>
		<div class="col-md-5">
			<h5>What happens from start to finish on a race weekend?</h5>
			<p class="text-muted">
				Most race weekends are made up of five events - Free Practice 1, 2 and 3; Qualifying and the Race. FP1 and FP2 generally occur on Friday, FP3 and Qualifying on Saturday with the Race always on Sunday.
			</p>			
		</div>
		<div class="col-md-5">
			<h5>How is Qualifying constructed?</h5>
			<p class="text-muted">
				Qualifying is split up into three sections. The first section, named 'Q1', lasts for 18 minutes and the drivers will go and try to set the fastest lap. They can go out whenever they want and for however many laps they want within this 18 minute period. After it ends the slowest five drivers are eliminated. These five are then ordered at the back of the grid in how fast they were.
			</p>
		</div>
		<div class="col-md-5">
			<h5>What do all the guys in the pit stops do?</h5>
			<p class="text-muted">
				First let me point out that refuelling remains banned for 2019 due to safety concerns, so cars must carry a race loads worth of fuel from the start of the race. But to answer your question Sauber has made a pretty cool video, they also have a more detailed infographic here.
			</p>
		</div>
	</div>
</div>
<!-- End FAQ -->


<?php require("includes/footer.php"); ?>




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
