<?php 
require_once '../..//private/initialize.php'; 

function finddd($year, $country, $title) {
    global $db;

    $sql = "SELECT DISTINCT r.name, r.raceId, r.date, r.time, c.location, c.country, c.lat, c.lng FROM circuits as c INNER JOIN races as r on r.circuitId = c.circuitId ";
    
    if (isset($year) and !empty($year)) {
        $sql .= "WHERE r.year='" . db_escape($db, $year) . "' ";
    }

    if (isset($country) and !empty($country)) {
        if (substr($sql, -2) == "' ") {
            $sql .= "AND c.country ='" . db_escape($db, $country) . "' ";
        } else {
            $sql .= "WHERE c.country ='" . db_escape($db, $country) . "' ";
        }
    }

    if (isset($title) and !empty($title)) {
        if (substr($sql, -2) == "' ") {
            $sql .= "AND r.name like '" . db_escape($db, $title) . "%' ";
        } else {
            $sql .= "WHERE r.name like '" . db_escape($db, $title) . "%' ";
        }
    }

    $sql .= "ORDER by country ASC";
    
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

$year = $_GET['year'];

$country = "" ;
if (isset($_GET['country'])) {
    $country = $_GET['country'];
}

$country = "" ;
if (isset($_GET['country'])) {
    $country = $_GET['country'];
}

$title = "" ;
if (isset($_GET['title'])) {
    $title = $_GET['title'];
}


$country_set = finddd($year, $country, $title);
$result_array = array();

while ($country = mysqli_fetch_assoc($country_set)) { 
   array_push($result_array, $country);

}

echo json_encode($result_array);
mysqli_free_result($country_set);

?>


