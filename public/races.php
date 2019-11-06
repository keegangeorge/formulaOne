<?php require_once '../private/initialize.php'; ?>

<?php $page_title = 'Races'; ?>
<?php include SHARED_PATH . '/public_header.php'; ?>

<?php
// SEASON
$season_set = find_all_seasons();
$seasons = [];
$year = $_GET['year'] ?? date('Y');

// COUNTRY
$country_set = find_all_countries();
$country = [];
$country = $_GET['country'] ?? '';

// RACES
// $race_set = find_race_by_year($year, $country);
$race_set = find_race_by_year($year);


?>



<!----------------------- Begin Content -- Races ---------------------->
<!-- Races Header START -->
<div class="jumbotron jumbotron-lg jumbotron-fluid mb-3 bg-primary position-relative">
    <div class="container text-white tofront" data-aos="fade">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-12">
                <h1 class="display-3">Races</h1>
            </div>
        </div>
    </div>
</div>

<!-- Races Header END -->

<div class="border-bottom">
    <div class="container mb-4 d-flex">
        <div class="mr-auto btn-group" role="group" aria-label="Race Filters Buttons">


            <button type="button" class="btn btn-outline-primary">Driver Names</button>

            <!-- DRIVER NAMES BUTTON -->
            <div class="btn-group">

                <!-- SEASON DROPDOWN BUTTON -->
                <button type="button" class="dropdown-toggle btn btn-primary" id="seasonDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Season: <?php echo $year; ?>
                </button>
                <!-- SEASON DROPDOWN ITEMS -->
                <div id="" class="dropdown-menu" aria-labelledby="seasonDropdown" style="height: auto;max-height: 9em; overflow-x: hidden;">
                    <?php
                    while ($seasons = mysqli_fetch_assoc($season_set)) { ?>
                        <a class="dropdown-item" href="<?php echo url_for('/races.php?year=' . h(u($seasons['year']))) . '&country=' . $country; ?>"><?php echo h($seasons['year']); ?>
                        </a>
                    <?php } ?>
                </div>
            </div>

            <!-- RECENT BUTTON -->
            <div class="btn-group">

                <button type="button" class="btn btn-outline-primary">Recent</button>
                <!-- COUNTRY DROPDOWN BUTTON -->
                <button class="btn btn-outline-primary border-left-0 dropdown-toggle" type="button" id="dropdownCountryButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php if (is_blank($country)) {
                        echo 'Country';
                    } else {
                        echo $country;
                    }
                    ?>
                </button>

                <!-- COUNTRY DROPDOWN ITEMS -->
                <div class="dropdown-menu" aria-labelledby="dropdownCountryButton" style="height: auto;max-height: 9em; overflow-x: hidden;">
                    <?php
                    while ($country = mysqli_fetch_assoc($country_set)) { ?>
                        <a class="dropdown-item" href="<?php echo url_for('/races.php?year=' . $year . '&country=' . h(u($country['country']))); ?>"><?php echo h($country['country']); ?>
                        </a>
                    <?php } ?>
                   
                </div>
            </div>


        </div>

        <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <label class="m-auto pr-3 font-weight-bold text-primary">
                VIEW
            </label>

            <label class="btn btn-outline-primary rounded-left active">
                <input type="radio" name="radio" value="galleryView" id="galleryView" autocomplete="off"> <i class="fas fa-th-large"></i>
            </label>

            <label class="btn btn-outline-primary">
                <input type="radio" name="radio" value="listView" id="listView" autocomplete="off"> <i class="fas fa-th-list"></i>
            </label>


        </div>

    </div>
</div>

<!-- Races Cards Start -->
<div class="container pt-0 pb-4">
    <div class="row gap-y justify-content-center">
        <?php while ($race = mysqli_fetch_assoc($race_set)) { ?>
            <?php
                $circuitId = $race['circuitId'];
                $circuit_set = find_race_by_circuitId($circuitId);

                while ($circuit = mysqli_fetch_assoc($circuit_set)) {

                    ?>
                <div class="col-md-4 col-sm-6">
                    <!-- Card -->
                    <div class="card shadow-sm border-0" data-aos="fade-up">
                        <img class="card-img-top" src="../public/assets/img/recent-race-img/<?php echo $circuit['country'] ?>.jpg" alt="">
                        <div class="card-body">

                            <h5 class="card-title text-secondary">
                                <?php echo h($race['name']); ?>
                            </h5>

                            <div class="row ml-0">
                                <i class="fas fa-calendar-day mr-2 text-primary"></i>
                                <h6><?php echo date_format(date_create(h($race['date'])), "M jS, Y"); ?></h6>
                            </div>

                            <div class="row ml-0">
                                <i class="fas fa-map-marker-alt mr-2 text-primary"></i>
                                <h6>
                                    <a 
                                    class="text-dark"
                                    data-toggle="tooltip" data-placement="right" data-original-title="<?php echo h($circuit['lat']) . ", " . h($circuit['lng']); ?>"
                                    class="text-dark" target="_blank" href="http://google.com/maps/place/ <?php echo h($circuit['lat']) . ', ' . h($circuit['lng'])  . "\">"; ?>
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

                            <?php if (!is_blank($race['time'])) {  ?>
                                <div class="row ml-0">
                                    <i class="fas fa-clock mr-2 text-primary"></i>
                                    <h6><?php echo date_format(date_create(h($race['time'])), "g:i A");  ?></h6>
                                </div>
                            <?php } ?>

                            <a href='#' class='btn mt-2 btn-sm btn-primary text-white'>
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
        <?php }
        } ?>






    </div>
</div>

<?php

mysqli_free_result($season_set);
mysqli_free_result($race_set);
mysqli_free_result($country_set);

?>

<?php include SHARED_PATH . '/public_footer.php'; ?>