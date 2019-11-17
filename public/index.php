<?php require_once('../private/initialize.php'); ?>

<?php $page_title = 'Home'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<?php


$recent_races_set = find_latest_races();
$fade = [];
?>

<!-------------------------------------
JUMBOTRON
--------------------------------------->
<div class="overlay home-bgimg bg-primary jumbotron jumbotron-lg jumbotron-fluid mb-0 pb-5  position-relative">
	<div class="container-fluid text-white h-100">
		<div class="d-lg-flex align-items-center justify-content-between text-center pl-lg-5" >
			<div class="col pt-5 pb-5" data-aos="zoom-out">
				<h1 class="">
					<strong class="display-4 font-italic font-weight-bold">F1</strong>
					<span class="font-italic font-weight display-4">Race History</span>
				</h1>
				<h5 class="font-weight-light mb-4">View all race information since the <strong> 1950&#8217;s</strong></strong></h5>
				<a href="<?php echo url_for('/about.php') ?>" class="btn mr-3 btn-lg btn-white  shadow" data-aos="fade-right">Learn more</a>
				<a href="<?php echo url_for('/races.php') ?>" class="btn btn-lg btn-secondary shadow" data-aos="fade-left">View Races</a>
			</div>
			<div class="col align-self-bottom align-items-right text-right h-max-380 position-relative z-index-1">
				<!-- <img data-aos="fade-up" src="<?php // echo url_for('../public/assets/img/f1car.png'); ?>" class="rounded img-fluid"> -->
			</div>
		</div>
	</div>


</div>


<!--- END JUMBOTRON -->

<!-- Start CTA -->
<div class="border-bottom border-top">
	<div class="text-center">
		<img src="<?php echo url_for('../public/assets/img/f1-sponsors.jpg'); ?>" alt="f1 sponsors">
	</div>
</div>
<!-- End CTA -->

<!-- Start Recent Races -->
<div class="container pt-5 pb-5 mt-4" data-aos="fade" id="upcoming">
	<div class="row">
		<h2><strong>Upcoming Races </strong>
			<a class="btn btn-outline-primary ml-3 mb-1 btn-sm " href="<?php echo url_for('/races.php'); ?>"> VIEW ALL</a>
		</h2>
	</div>
	<div class="row gap-y">

		<?php
		$fade = ['fade-right', 'fade', 'fade-left'];
		$loop_fade_array = -1;
		while ($recent_races = mysqli_fetch_assoc($recent_races_set)) {

			$circuitId = $recent_races['circuitId'];
			$circuit_set = find_race_by_circuitId($circuitId);

			while ($circuit = mysqli_fetch_assoc($circuit_set)) {
				$loop_fade_array++;
				if ($loop_fade_array > 3) {
					$loop_fade_array = -1;
				}

				?>

				<div class="col-md-6 col-xl-4">
					<div class="card shadow-sm border-0" data-aos="<?php echo $fade[$loop_fade_array]; ?>">
						<img class="card-img-top" src="../public/assets/img/recent-race-img/<?php echo $circuit['country']; ?>.jpg" alt="Card image cap">
						<div class="card-body">
							<h5 class="card-title text-secondary"><a target="_blank" href="<?php echo $recent_races['url']; ?>"><?php echo $recent_races['name']; ?></a></h5>
							<div class="row ml-0">
								<i class="fas fa-calendar-day mr-2 text-primary"></i>
								<h6><?php
											echo date_format(date_create(h($recent_races['date'])), "M jS, Y");
											?></h6>
							</div>
							<div class="row ml-0">
								<i class="fas fa-map-marker-alt mr-2 text-primary"></i>
								<h6>
									<a class="text-dark" data-toggle="tooltip" data-placement="right" data-original-title="<?php echo h($circuit['lat']) . ", " . h($circuit['lng']); ?>" class="text-dark" target="_blank" href="http://google.com/maps/place/ <?php echo h($circuit['lat']) . ', ' . h($circuit['lng'])  . "\">"; ?>
                                    <?php
											echo h($circuit['location']);
											// When specific location doesn't exist, the comma separator is not displayed
											if (!is_blank(h($circuit['location']))) {
												echo ', ';
											}
											?> 
                                    <?php

											echo h($circuit['country']);
											?>
                                    </a>
                                </h6>
						</div>
						
						<?php if (!is_blank($recent_races['time'])) {  ?>
                                <div class=" row ml-0">
										<i class="fas fa-clock mr-2 text-primary"></i>
										<h6><?php echo date_format(date_create(h($recent_races['time'])), "g:i A");  ?></h6>
							</div>
						<?php } ?>
						</div>
					</div>
				</div>
		<?php }
		} ?>
	</div>
</div>
<!-- End Recent Races -->





<!-- Start News Items -->
<div class="container">
	<h2><strong>News</strong></h2>

	<div class="row gap-y" data-aos="fade-up">
		<div class="col-md-6 col-lg-4">
			<div class="card">
				<img class="img-card-top" src="../public/assets/img/news-item-img/esports-roster.jpg">
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
				<img class="img-card-top" src="../public/assets/img/news-item-img/russia.jpg">
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
				<img class="img-card-top" src="../public/assets/img/news-item-img/singapore.jpg">
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
				<img class="img-card-top" src="../public/assets/img/news-item-img/power-rankings.jpg">
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
				<img class="img-card-top" src="../public/assets/img/news-item-img/carlos.jpg">
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
				<img class="img-card-top" src="../public/assets/img/news-item-img/greg.jpg">
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



<?php include(SHARED_PATH . '/public_footer.php'); ?>