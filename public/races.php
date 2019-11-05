<?php require_once '../private/initialize.php';?>

<?php $page_title = 'Races';?>
<?php include SHARED_PATH . '/public_header.php';?>

<?php
$season_set = find_all_seasons();
$seasons = [];
$year = $_GET['year'] ?? '2019';

$race_set = find_race_by_year($year);


?>



<!----------------------- Begin Content -- Races ---------------------->
<!-- Races Header START -->
<div class="jumbotron jumbotron-lg jumbotron-fluid mb-3 bg-primary position-relative">
    <div class="container text-white tofront">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-10">
                <h1 class="display-3">Races</h1>
            </div>
            <div class="btn-group" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-outline-white">Recent</button>
                <button type="button" class="btn btn-outline-white">Country (A-Z)</button>
                <button type="button" class="btn btn-outline-white">Driver Names</button>
                <button type="button" class="dropdown-toggle btn btn-outline" href="#" id="seasonDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Season <?php echo $year; ?>
                </button>
                <div class="dropdown-menu" aria-labelledby="seasonDropdown" style="height: auto;max-height: 9em; overflow-x: hidden;">
                    <?php while ($seasons = mysqli_fetch_assoc($season_set)) {?>
                        <a class="dropdown-item" href="<?php echo url_for('/races.php?year=' . h(u($seasons['year']))); ?>"><?php echo h($seasons['year']);
                        ?>
                        </a>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Races Header END -->


<div class="container pt-0 pb-4">
    <div class="row gap-y justify-content-center">
    <?php while ($race = mysqli_fetch_assoc($race_set)) { ?>
        <div class="col-md-3">
            <!-- Simple Card -->
            <div class="card shadow-sm border-0">
                <img class="card-img-top" src="../public/assets/img/recent-race-img/Hungary.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title text-secondary">
                        <?php echo h($race['name']); ?>
                    </h5>
                    <div class="row ml-0">
                        <i class="fas fa-calendar-day mr-2 text-primary"></i>
                        <h6><?php echo date_format(date_create(h($race['date'])), "M dS, Y"); ?></h6>
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
        <?php } ?>






    </div>
</div>

<?php mysqli_free_result($season_set);?>

<?php include SHARED_PATH . '/public_footer.php';?>

<!-- End Content - Races -->


<!-- <main> My content goes here </main> -->

<!-- Javascript -->
<script src="./assets/js/vendor/jquery.min.js" type="text/javascript"></script>
<script src="./assets/js/vendor/popper.min.js" type="text/javascript"></script>
<script src="./assets/js/vendor/bootstrap.min.js" type="text/javascript"></script>
<script src="./assets/js/functions.js" type="text/javascript"></script>

</body>

</html>