<?php 

 require_once '../private/initialize.php';

    global $db;

    $raceId = "";
    if (isset($_POST['race'])) {
        $raceId = $_POST['race'];
    }

    $starred = 1;

    $sql = "INSERT INTO race_favourites ";
    $sql .= "(username, raceId, starred) ";
    $sql .= "VALUES (";
    $sql .= "'" . db_escape($db, $_SESSION['username']) . "', ";
    $sql .= "'" . db_escape($db, $raceId) . "', ";
    $sql .= "'" . db_escape($db, $starred) . "'";
    $sql .= ")";


    $result = mysqli_query($db, $sql);

    if ($result) {
        return true;
    } else {
        // inserrt failed.
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }


?>