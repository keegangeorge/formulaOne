<?php require_once('../private/initialize.php'); ?>

<?php $page_title = 'About'; ?>
<?php $whiteNav = true; ?>

<?php include(SHARED_PATH . '/public_header.php'); ?>


<!----------------------- Content - About START ---------------------->
<div class="container pt-5 pb-4">
    <div class="pb-5 pt-3 text-center">
		<h2 class="mb-4 mt-5">About</h2>
		<p class="text-muted">
		Formula One (also known as Formula 1 or F1) is the highest class of single-seater auto racing sanctioned by the Fédération Internationale de l'Automobile (FIA) and owned by the Formula One Group. The FIA Formula One World Championship has been one of the premier forms of racing around the world since its inaugural season in 1950. Formula One cars are the fastest regulated road-course racing cars in the world, owing to very high cornering speeds achieved through the generation of large amounts of aerodynamic downforce.
		While Europe is the sport's traditional base, the championship operates globally, with 11 of the 21 races in the 2019 season taking place outside Europe. With the annual cost of running a mid-tier team—designing, building, and maintaining cars, pay, transport—being US$120 million, Formula One has a significant economic and job-creation effect, and its financial and political battles are widely reported.Its high profile and popularity have created a major merchandising environment, which has resulted in large investments from sponsors and budgets (in the hundreds of millions for the constructors).
		</p>
    </div>

    <div class="pb-5 pt-3 text-center">
		<h2 class="mt-5">Team</h2>
    </div>

	<div class="row gap-y justify-content-center">
		<div class="col-md-5">
			<div class="card shadow-sm border-0">
				<img class="card-img-top" src="./assets/img/about-img/Keegan.png" alt="Card image cap">
				<div class="card-body">
					<h5 class="card-title">Keegan George</h5>
					<p class="card-text text-muted">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ex lectus, ultricies nec ex sit amet, sodales rhoncus est.
					</p>
				</div>
			</div>
		</div>
		<div class="col-md-5">
			<div class="card shadow-sm border-0">
				<img class="card-img-top" src="./assets/img/about-img/Apoorva.png" alt="Card image cap">
				<div class="card-body">
				<h5 class="card-title">Apoorva Bitton</h5>
				<p class="card-text text-muted">
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ex lectus, ultricies nec ex sit amet, sodales rhoncus est.
				</p>	
				</div>
			</div>
		</div>
	</div>
</div>

<!----------------------- Content - About END ---------------------->
<?php include(SHARED_PATH . '/public_footer.php'); ?>


<!-- Javascript -->
<script src="./assets/js/vendor/jquery.min.js" type="text/javascript"></script>
<script src="./assets/js/vendor/popper.min.js" type="text/javascript"></script>
<script src="./assets/js/vendor/bootstrap.min.js" type="text/javascript"></script>
<script src="./assets/js/functions.js" type="text/javascript"></script>

</body>
    
</html>
