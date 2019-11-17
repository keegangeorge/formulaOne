<?php require_once '../private/initialize.php'; ?>

<?php $page_title = 'Race Details'; ?>
<?php $whiteNav = true; ?>
<?php include SHARED_PATH . '/public_header.php'; ?>

<?php

$raceId = $_GET['raceId'] ?? '1';
$race = find_race_by_raceId($raceId);
$circuit = find_circuit($race['circuitId']);
$race_results = find_results_by_raceId($raceId);
$driver_standings_set = find_driver_standings_by_raceId($raceId);
$get_race_winner_set = find_driver_standings_by_raceId($raceId);
$qualifying_set = find_qualifying_by_raceId($raceId);
$drivers_names = [];
$constructor_names = [];
$comment_set = find_comments_by_raceId($raceId);

if (is_post_request()) {
    $message = $_POST['message'];
    $result = insert_comment($message, $raceId);
    redirect_to(url_for('race-details.php?raceId=' . $raceId . '#comments'));
} else {
    // display the blank form
}

?>

<div class="container pb-5 mt-5 pt-4 text-left">

    <nav class="mt-5" aria-label="breadcrumb" data-aos="fade">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo url_for('races.php'); ?>">Races</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $race['name'] . " (" . $race['year'] . ")"; ?></li>
        </ol>
    </nav>



    <div class="container mt-5" data-aos="fade-right">
        <h5 class="ml-1 text-muted text-uppercase font-weight-light">
            <?php echo $circuit['name']; ?>
        </h5>
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
        <figure data-aos="fade-left">
            <img src="../public/assets/img/recent-race-img/<?php echo $circuit['country'] ?>.jpg" alt="">
        </figure>
        <div class="mb-5">
            <a target="_blank" href="<?php echo $race['url']; ?>" data-toggle="tooltip" data-placement="bottom" data-original-title="View Race Information" class="mt-2 iconbox iconsmall bg-gray rounded text-dark border-0">
                <i class="fab fa-wikipedia-w"></i>
            </a>

            <a target="_blank" href="http://google.com/maps/place/
            <?php echo h($circuit['lat']) . ', ' . h($circuit['lng']); ?>" data-toggle="tooltip" data-placement="bottom" data-original-title="View Circuit Location" class="mt-2 iconbox iconsmall bg-gray rounded text-dark border-0">
                <i class="fas fa-map-marker-alt"></i>
            </a>
        </div>


        <div class="container">
            <div class="row" data-aos="fade">

                <div class="col-md-4">
                    <h6 class="text-muted font-weight-light">Winner</h6>
                    <?php
                    while ($race_winner = mysqli_fetch_assoc($get_race_winner_set)) {
                        $winnerDriverId = $race_winner['driverId'];
                        $winner_driver_set = find_drivers_by_driverId($winnerDriverId);

                        while ($winner_drivers = mysqli_fetch_assoc($winner_driver_set)) {
                            if ($race_winner['position'] == '1') {
                                ?>
                                <h2 class="display-5 font-weight-bold">
                                    <i class="fas fa-trophy"></i>
                                    <a target="_blank" class="text-dark" href="<?php echo $winner_drivers['url']; ?>">
                                        <?php echo $winner_drivers['forename']; ?>
                                        <?php echo $winner_drivers['surname']; ?>
                                    </a>
                                </h2>
                    <?php }
                        }
                    }

                    ?>
                </div>
                <div class="col-md-1">
                    <h6 class=" font-weight-light">Driver #</h6>
                    <h2 class="display-5 font-weight-bold"><?php echo $race_results['number']; ?></h2>
                </div>
                <div class="col-md-1 pr-4 border-right border-gray">
                    <h6 class="text-muted font-weight-light">Points</h6>
                    <h2 class="display-5 font-weight-bold"><?php echo $race_results['points']; ?></h2>
                </div>
                <div class="col-md-1 pl-4">
                    <h6 class="text-muted font-weight-light">Round</h6>
                    <h2 class="display-5 font-weight-bold""><?php echo $race['round']; ?></h2>
                </div>
                <div class=" col-md-1">
                        <h6 class="text-muted font-weight-light">Laps</h6>
                        <h2 class="display-5 font-weight-bold"><?php echo $race_results['laps']; ?></h2>
                </div>
                <div class="col-md-3">
                    <h6 class="text-muted font-weight-light">Total Race Time</h6>
                    <h2 class="display-5 font-weight-bold"><?php echo $race_results['time']; ?></h2>
                </div>


            </div>

            <br>
            <hr size="10">
            <br>



            <div class="row accordion">
                <a data-toggle="collapse" class="text-decoration-none" href="#collapseRankings" aria-expanded="true" aria-controls="collapseRankings">

                    <h5 class="text-secondary mb-4" data-aos="fade">
                        <i class="fa fa-chevron-right mr-3 pull-right"></i>
                        <i class="fas fa-chevron-down mr-3"></i>
                        Race Rankings
                    </h5>
                </a>

                <div class="col-12 clearfix" id="collapseRankings">
                    <table id="race-details-table" class="table table-hover border-left border-right border-bottom" data-aos="fade-up">

                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Position</th>
                                <th scope="col">Driver Name</th>
                                <th scope="col">Nationality</th>
                                <th scope="col">Constructor</th>
                                <th scope="col">Points</th>
                                <th scope="col">Wins</th>
                                <th scope="col">Fastest Lap Time</th>
                                <th scope="col">Fastest Lap Speed</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php while ($driver_standings = mysqli_fetch_assoc($driver_standings_set)) {
                                $driverId = $driver_standings['driverId'];
                                $drivers_set = find_drivers_by_driverId($driverId);

                                while ($drivers = mysqli_fetch_assoc($drivers_set)) {
                                    $race_specific_results_set = find_specific_results_by_raceId($raceId, $drivers['driverId']);
                                    while ($race_specific_results = mysqli_fetch_assoc($race_specific_results_set)) {
                                        $constructor_set = find_constructors($race_specific_results['constructorId']);
                                        while ($constructor = mysqli_fetch_assoc($constructor_set)) {

                                            ?>
                                            <tr>
                                                <td><?php echo $driver_standings['position'];
                                                                    if ($driver_standings['position'] == '1') {
                                                                        $winner = $drivers['forename'];
                                                                    }
                                                                    ?></td>

                                                <th scope="row">
                                                    <a class="text-dark" target="_blank" href="<?php echo $drivers['url']; ?>">
                                                        <?php
                                                                        $temp_drivers = h($drivers['forename']) . " " . h($drivers['surname']);

                                                                        array_push($drivers_names, $temp_drivers);

                                                                        echo h($drivers['forename']) . " " . h($drivers['surname']); ?>
                                                    </a>
                                                </th>
                                                <!-- INDEX 1 -->
                                                <td>
                                                    <?php echo $drivers['nationality']; ?>
                                                </td>
                                                <td>
                                                    <a class="text-dark" target="_blank" href="<?php echo $constructor['url']; ?>">
                                                        <?php
                                                                        $temp_constructors = $constructor['name'];

                                                                        array_push($constructor_names, $temp_constructors);

                                                                        echo $constructor['name']; ?>
                                                    </a>
                                                </td>
                                                <!-- INDEX 2 -->
                                                <td>
                                                    <?php echo $driver_standings['points']; ?>
                                                </td>
                                                <!-- INDEX 3 -->
                                                <td>
                                                    <?php echo $driver_standings['wins']; ?>
                                                </td>
                                                <!-- INDEX 4 -->
                                                <td>
                                                    <?php if (!is_blank($race_specific_results['fastestLapTime'])) { ?>
                                                        <span class="pr-2" data-toggle="tooltip" data-placement="right" data-original-title="Lap: <?php echo $race_specific_results['fastestLap']; ?>">
                                                            <?php echo $race_specific_results['fastestLapTime']; ?> </span> <?php } else {
                                                                                                                                                ?>
                                                        <span class="text-muted">Lap Time Unavailable</span>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <?php if (!is_blank($race_specific_results['fastestLapSpeed'])) {
                                                                        echo $race_specific_results['fastestLapSpeed'] . " km/h";
                                                                    } else { ?>
                                                        <span class="text-muted">Speed Unavailable</span>
                                                    <?php } ?>
                                                </td>
                                            </tr>

                            <?php
                                        }
                                    }
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

            </div>

            <br>
            <hr size="10">
            <br>


            <div class="row accordion">
                <a data-toggle="collapse" class="text-decoration-none" href="#collapseQualifying" aria-expanded="true" aria-controls="collapseQualifying">

                    <h5 class="text-secondary mb-4">
                        <i class="fa fa-chevron-right mr-3 pull-right"></i>
                        <i class="fas fa-chevron-down mr-3"></i>
                        Qualifying
                    </h5>
                </a>
                <div class="col-12 clearfix" id="collapseQualifying">
                    <table role="tabpanel" id="race-qualifying-table" class="table table-hover border-left border-right border-bottom">

                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Position</th>
                                <th scope="col">Driver</th>
                                <th scope="col">Number</th>
                                <th scope="col">Constructor</th>
                                <th scope="col">Q1</th>
                                <th scope="col">Q2</th>
                                <th scope="col">Q3</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $i = -1;
                            while ($qualifying = mysqli_fetch_assoc($qualifying_set)) { ?>
                                <?php
                                    if ($i < count($drivers_names) - 1) {
                                        $i++;

                                        ?>

                                    <tr>
                                        <td><?php echo $qualifying['position']; ?></td>
                                        <td class="font-weight-bold">
                                            <?php
                                                    echo $drivers_names[$i]; ?></td>
                                        <td><?php echo $qualifying['number']; ?></td>


                                        <td><?php echo $constructor_names[$i]; ?></td>
                                        <td><?php echo $qualifying['q1']; ?></td>
                                        <td><?php echo $qualifying['q2']; ?></td>
                                        <td><?php echo $qualifying['q3']; ?></td>
                                    <?php } ?>
                                    </tr>
                        </tbody>
                    <?php } ?>

                    <?php // } 
                    ?>
                    </table>

                </div>







                <div class="col-12 border-top mt-5" data-aos="fade">
                    <!-- Comment Section Header -->
                    <div class="mt-4">
                        <h3 class="text-secondary" id="comments">Comments</h3>

                        <div class="col-12 mt-5">
                            <!-- A Single Comment START-->
                            <?php
                            // $comment_set = find_comments_by_raceId($raceId);
                            while ($comments = mysqli_fetch_assoc($comment_set)) { ?>
                                <div class="media media-comment bg-light p-4">
                                    <div>
                                        <div>
                                            <div class="row mb-3 ml-1">
                                                <div class="iconbox iconsmall bg-gray border-0 mr-2 rounded-circle">
                                                    <i class="text-dark fas fa-user"></i>
                                                </div>
                                                <h6 class="mt-2 mb-3"><?php echo $comments['username']; ?>
                                                    <span class="font-weight-light"> &#183;
                                                        <?php
                                                            echo date_format(date_create($comments['date']), "M/d/Y h:i:s A "); ?>
                                                    </span></h6>
                                            </div>
                                            <p class="text-dark lh-160 bg-gray p-4 rounded">
                                                <?php echo $comments['message']; ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                            <!-- A Single Comment END -->
                            <?php if (is_logged_in()) { ?>
                            <div class="mt-4 media media-comment align-items-center">
                                <!-- User Icon START -->
                                <div class="iconbox iconsmall bg-gray border-0 mr-3 rounded-circle">
                                    <i class="text-dark fas fa-user"></i>
                                </div>
                                <!-- User Icon END -->
                                <div class="col-9 media-body">
                                    <!-- User Comment Write/Submit Section START -->
                                    <form action="<?php echo url_for('/race-details.php?raceId=' . $raceId); ?>" method="post" class="rounded border">
                                        <div class="input-group input-group-lg input-group-merge">
                                            <div class="input-group-prepend"><span class="input-group-text bg-transparent border-0 pr-2">
                                                    <i class="text-muted fas fa-marker"></i>
                                            </div>

                                            <input name="message" type="text" class="form-control border-0 px-2" aria-label="Find something" placeholder="Write a comment...">
                                            <!-- Comment Submit Button START -->
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-primary">
                                                    Post
                                                </button>
                                            </div>
                                            <!-- Comment Submit Button END -->
                                        </div>
                                    </form>
                                    <!-- User Comment Write/Submit Section END -->
                                </div>
                            </div>
                            <?php } else { ?>
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 bg-light mt-4">
                                    <p class="text-muted p-2 mt-4 mb-4">
                                        <a href="<?php echo url_for('sign-in.php'); ?>">Sign in </a>to write a comment.
                                    </p>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

<?php
if (isset($drivers_set)) {
    mysqli_free_result($drivers_set);
}
if (isset($driver_standings_set)) {
    mysqli_free_result($driver_standings_set);
}
if (isset($race_specific_results_set)) {
    mysqli_free_result($race_specific_results_set);
}
if (isset($get_race_winner_set)) {
    mysqli_free_result($get_race_winner_set);
}
if (isset($winner_driver_set)) {
    mysqli_free_result($winner_driver_set);
}
if (isset($qualifying_set)) {
    mysqli_free_result($qualifying_set);
}
if (isset($comment_set)) {
    mysqli_free_result($comment_set);
}

?>

<?php include SHARED_PATH . '/public_footer.php'; ?>