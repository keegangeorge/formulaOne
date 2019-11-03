<?php require_once('../private/initialize.php'); ?>

<?php $page_title = 'Races'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>


<!----------------------- Begin Content -- Races ---------------------->
<div class="container pb-5 pt-5 text-center"> <br><br><br><br>  
        <h2>Races</h2>
        <div class ="pt-3">
            <a class="btn btn-outline-primary btn-round" href="#">Recent</a>
            <a class="btn btn-outline-primary btn-round" href="#">Country A-Z</a>
            <a class="btn btn-outline-primary btn-round" href="#">Driver Names</a>
            <a class="btn btn-outline-primary btn-round" href="#">Year</a>
        </div>
</div>


<div class="container pt-0 pb-4"> 
    <div class="row gap-y justify-content-center">
		<div class="col-md-3">

			<!-- Simple Card -->
            <div class="card shadow-sm border-0">
            <img class="card-img-top" src="./assets/img/races-img/placeholder-race-img.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Race 1 - This is the only linked card</h5>
                    <p class="card-text text-muted">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ex lectus, ultricies nec ex sit amet, sodales rhoncus est.
                    </p>
                <a href="./race-details.php" class="btn btn-info btn-round">Read More</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <img class="card-img-top" src="./assets/img/races-img/placeholder-race-img.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Race 2</h5>
                    <p class="card-text text-muted">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ex lectus, ultricies nec ex sit amet, sodales rhoncus est.
                    </p>
                <a href="#" class="btn btn-info btn-round">Read More</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <img class="card-img-top" src="./assets/img/races-img/placeholder-race-img.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Race 3</h5>
                    <p class="card-text text-muted">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ex lectus, ultricies nec ex sit amet, sodales rhoncus est.
                    </p>
                <a href="#" class="btn btn-info btn-round">Read More</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container pt-5 pb-4">
    <div class="row gap-y justify-content-center">
		<div class="col-md-3">
                    <!-- Simple Card -->
            <div class="card shadow-sm border-0">
            <img class="card-img-top" src="./assets/img/races-img/placeholder-race-img.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Race 1</h5>
                    <p class="card-text text-muted">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ex lectus, ultricies nec ex sit amet, sodales rhoncus est.
                    </p>
                <a href="#" class="btn btn-info btn-round">Read More</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <img class="card-img-top" src="./assets/img/races-img/placeholder-race-img.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Race 2</h5>
                    <p class="card-text text-muted">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ex lectus, ultricies nec ex sit amet, sodales rhoncus est.
                    </p>
                <a href="#" class="btn btn-info btn-round">Read More</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <img class="card-img-top" src="./assets/img/races-img/placeholder-race-img.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Race 3</h5>
                    <p class="card-text text-muted">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ex lectus, ultricies nec ex sit amet, sodales rhoncus est.
                    </p>
                <a href="#" class="btn btn-info btn-round">Read More</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>

<!-- End Content - Races -->


 <!-- <main> My content goes here </main> -->

<!-- Javascript -->
<script src="./assets/js/vendor/jquery.min.js" type="text/javascript"></script>
<script src="./assets/js/vendor/popper.min.js" type="text/javascript"></script>
<script src="./assets/js/vendor/bootstrap.min.js" type="text/javascript"></script>
<script src="./assets/js/functions.js" type="text/javascript"></script>

</body>
    
</html>
