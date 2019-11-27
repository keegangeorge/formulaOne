<?php require_once '../private/initialize.php'; ?>

<?php $page_title = 'Races'; ?>
<?php include SHARED_PATH . '/public_header.php'; ?>

<?php
// SEASON
$seasons = [];
$year = $_GET['year'] ?? date('Y');

// COUNTRY
$country_set = find_all_countries();
$country = [];
$country = $_GET['country'] ?? 'All';

// RACES
// $race_set = find_race_by_year($year, $country);
$race_set = find_race_by_year($year);
?>


<script src="./assets/js/vendor/jquery.min.js" type="text/javascript"></script>

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

            <!-- DRIVER NAMES BUTTON -->
            <div class="btn-group">

                <!-- SEASON DROPDOWN BUTTON -->
                <button type="button" class="dropdown-toggle btn btn-primary" id="seasonDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                </button>
                <!-- SEASON DROPDOWN ITEMS -->
                <div id="seasonDropdownDiv" class="dropdown-menu" aria-labelledby="seasonDropdown" style="height: auto;max-height: 9em; overflow-x: hidden;">

                </div>
            </div>

            <!-- RECENT BUTTON -->
            <div class="btn-group">

                <!-- COUNTRY DROPDOWN BUTTON -->
                <button class="border-right-0 btn btn-outline-primary border-left-0 dropdown-toggle" type="button" id="dropdownCountryButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                </button>

                <!-- COUNTRY DROPDOWN ITEMS -->
                <div id="countryDropdownSelect" class="dropdown-menu" aria-labelledby="dropdownCountryButton" style="height: auto;max-height: 9em; overflow-x: hidden;">
                </div>
            </div>

            <div class="btn-group">
                <input id="search_by_title" type="text" class="form-control  rounded-0 border-primary dropdown-toggle" placeholder="Search By Title" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div id="suggestionSelect" class="mt-2 dropdown-menu" aria-labelledby="dropdownCountryButton" style="height: auto;max-height: 9em; overflow-x: hidden;">
                </div>
            </div>

        </div>

        <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <label class="m-auto pr-3 font-weight-bold text-primary">
                VIEW
            </label>

            <label class="btn btn-outline-primary rounded-left active" id="galleryView">
                <input type="radio" name="radio" value="galleryView"  autocomplete="off" class="d-none" id="galleryButton"><i class="fas fa-th-large"></i>
            </label>

            <label class="btn btn-outline-primary" id="listView">
                <input type="radio" name="radio" value="listView"  autocomplete="off" class="d-none" id="listButton"> <i class="fas fa-th-list"></i>
            </label>

        </div>

    </div>
</div>

<!-- Races Cards Start -->
<div class="container pt-0 pb-4">
    <div id="card_set" class="row gap-y justify-content-center">
        
        <div id="card_ui" class="row">
            <div class="card shadow-sm border-0">

            </div>
        </div>
        <button id="btnShowMore" class="mt-5 btn btn-gray btn-block shadow-sm">
        Show More
        </button>

    </div>

</div>

<script src="./js/race.js" type="text/javascript"></script>

<?php

mysqli_free_result($race_set);
mysqli_free_result($country_set);

?>

<?php include SHARED_PATH . '/public_footer.php'; ?>