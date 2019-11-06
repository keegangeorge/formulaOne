<?php require_once '../private/initialize.php'; ?>

<?php $page_title = 'Race Details'; ?>
<?php include SHARED_PATH . '/public_header.php'; ?>

<?php

$raceId = $_GET['raceId'] ?? '1';
$race = find_race_by_raceId($raceId);
$circuit = find_circuit($race['circuitId']);
$race_results = find_results_by_raceId($raceId);
// $driver_standings = find_driver_standings_by_raceId($raceId);
$driver_standings_set = find_driver_standings_by_raceId($raceId);
// $drivers = find_drivers_by_driverId($driver_standings['driverId']);
?>

<div class="container pb-5 mt-5 pt-4 text-left">

    <nav class="mt-5" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo url_for('races.php'); ?>">Races</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $race['name'] . " (" . $race['year'] . ")"; ?></li>
        </ol>
    </nav>

    <!-- Testing some stuffs -->

    <?php 
    while ($driver_standings = mysqli_fetch_assoc($driver_standings_set)) {
        $driverId = $driver_standings['driverId'];
        $drivers_set = find_drivers_by_driverId($driverId);
        while ($drivers = mysqli_fetch_assoc($drivers_set)) {
    // echo $drivers['forename'] . " " . $drivers['surname']; 
        echo "<strong>Driver Id:</strong " . $driver_standings['driverId'] . " <strong>Driver Name:</strong> <a href=\"" . $drivers['url'] . "\">" . h($drivers['forename']) . "  " . h($drivers['surname']) . "</a> <strong>Points:</strong> " . $driver_standings['points'] . " <strong>Position:</strong> " . $driver_standings['position'] . " <strong>Wins:</strong> " . $driver_standings['wins'] . " <strong>Driver Number:</strong> " . $drivers['number'] . " <strong>Nationality:</strong> " . $drivers['nationality'] . "<br>";
    } 
}
    ?>
    <!-- End of tests -->

    <div class="container mt-5">
        <h5 class="ml-1 text-muted text-uppercase font-weight-light"><?php echo $circuit['name']; ?></h5>
        <h1 class="text-secondary font-weight-normal">
            <?php echo $race['name']; ?>
        </h1>
        <div class="row text-muted ml-1">
            <i class="fas fa-calendar-day mr-2"></i>
            <h6>
                <?php
                echo date_format(date_create(h($race['date'])), "M jS, Y") . ' &#x007C; ';
                ?>
                <?php
                if (!is_blank($race['time'])) {
                    ?>
                    <i class="fas fa-clock mr-2"></i>
                <?php
                    echo date_format(date_create(h($race['time'])), "g:i A") . ' &#x007C; ';
                }
                ?>
                <i class="fas fa-map-marker-alt mr-1"></i>

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
            </h6>
        </div>


    </div>

    <div class="container pt-2">
        <figure>
            <img src="../public/assets/img/recent-race-img/<?php echo $circuit['country'] ?>.jpg" alt="">
        </figure>
        <div class="col mt-4">
            <a target="_blank" href="<?php echo $race['url']; ?>" data-toggle="tooltip" data-placement="bottom" data-original-title="View Race Information" class="mt-2 iconbox iconsmall bg-secondary rounded text-white">
                <i class="fab fa-wikipedia-w"></i>
            </a>

            <a target="_blank" href="http://google.com/maps/place/
            <?php echo h($circuit['lat']) . ', ' . h($circuit['lng']); ?>" data-toggle="tooltip" data-placement="bottom" data-original-title="View Circuit Location" class="mt-2 iconbox iconsmall bg-secondary rounded text-white">
                <i class="fas fa-map-marker-alt"></i>
            </a>
        </div>
        <div class="container">

            <div class="row mt-5">
                <h5>General Race Information</h5>
                <?php echo $race['time']; ?>
            </div>
            <br>
            <div class="row">
                <div class="col-md-3">
                    <p>Country</p>
                    <h2>Info</h2>
                </div>
                <div class="col-md-3">
                    <p>Location</p>
                    <h2>Info</h2>
                </div>
                <div class="col-md-3">
                    <p>Latitude</p>
                    <h2>Info</h2>
                </div>
                <div class="col-md-3">
                    <p>Longitude</p>
                    <h2>Info</h2>
                </div>
            </div>

            <br>
            <hr size="10">
            <br>


            <div class="row">
                <h5>Race Results</h5>
            </div>
            <br>
            <div class="row">
                <div class="col-md-3">
                    <p>Winner</p>
                    <h2>Info</h2>
                </div>
            </div>

            <br>
            <hr size="10">
            <br>

            <div class="row">
                <h5>Drivers Information</h5>
            </div>
            <br>
            <div class="row">
                <div class="col-md-3">
                    <p>Names</p>
                    <h2>Info</h2>
                </div>
                <div class="col-md-3">
                    <p>Standings</p>
                    <h2>Info</h2>
                </div>
                <div class="col-md-3">
                    <p>Laps Times</p>
                    <h2>Info</h2>
                </div>
                <div class="col-md-3">
                    <p>Longitude</p>
                    <h2>Info</h2>
                </div>
            </div>


            <br>
            <hr size="10">
            <br>
            <h5>Status Information</h5>


            <br>


            <div class="border-top mt-5">
                <!-- Comment Section Header -->
                <div class="mt-4">
                    <h3 class="text-secondary">Comments</h3>

                    <div class="col-12 mt-5">
                        <!-- A Single Comment START-->
                        <div class="media media-comment bg-light p-4">
                            <div>
                                <div>
                                    <div class="row mb-3 ml-1">
                                        <div class="iconbox iconsmall bg-gray border-0 mr-2 rounded-circle">
                                            <i class="text-dark fas fa-user"></i>
                                        </div>
                                        <h6 class="mt-2 mb-3">Keegan George</h6>
                                    </div>
                                    <p class="text-dark lh-160 bg-gray p-4 rounded">This race was one of the greatest! Great work by the drivers, pit crew, and constructors.</p>
                                </div>
                            </div>
                        </div>
                        <!-- A Seingle Comment END -->

                        <div class="mt-4 media media-comment align-items-center">
                            <!-- User Icon START -->
                            <div class="iconbox iconsmall bg-gray border-0 mr-3 rounded-circle">
                                <i class="text-dark fas fa-user"></i>
                            </div>
                            <!-- User Icon END -->
                            <div class="col-9 media-body">
                                <!-- User Comment Write/Submit Section START -->
                                <form class="rounded border">
                                    <div class="input-group input-group-lg input-group-merge">
                                        <div class="input-group-prepend"><span class="input-group-text bg-transparent border-0 pr-2">
                                                <i class="text-muted fas fa-marker"></i>
                                        </div>

                                        <input type="text" class="form-control border-0 px-2" aria-label="Find something" placeholder="Write a comment...">
                                        <!-- Comment Submit Button START -->
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-primary">
                                                Post
                                            </button>
                                        </div>
                                        <!-- Comment Submit Button END -->
                                    </div>
                                </form>
                                <!-- User Comment Write/Submit Section END -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
</div>

<?php

// mysqli_free_result($season_set);
// mysqli_free_result($race_set);
// mysqli_free_result($circuit);
mysqli_free_result($driver_standings_set);
mysqli_free_result($drivers_set);


?>

<?php include SHARED_PATH . '/public_footer.php'; ?>