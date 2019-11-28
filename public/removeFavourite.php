<?php 

 require_once '../private/initialize.php';

    global $db;

    $raceId = "";
    if (isset($_POST['race'])) {
        $raceId = $_POST['race'];
    }

    $starred = 1;

    $sql = "DELETE FROM race_favourites WHERE username=";
    $sql .= "'" . db_escape($db, $_SESSION['username']) . "' ";
    $sql .= "AND raceId='" . db_escape($db, $raceId) . "'";


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