<?php
require_once '../..//private/initialize.php';

/**
 * Function for finding general race related information
 * as well as for filtering among races by title, year, or country
 */
function finddd($year, $country, $title, $result_limit)
{
    global $db;


    $sql = "SELECT DISTINCT r.name, r.raceId, r.date, r.time, c.location, c.country, c.lat, c.lng FROM circuits as c INNER JOIN races as r on r.circuitId = c.circuitId ";

    // When year is set, filter by year
    if (isset($year) and !empty($year)) {
        $sql .= "WHERE r.year='" . db_escape($db, $year) . "' ";
    }

    // When a country is set, filter by specific country
    if (isset($country) and !empty($country)) {
        if (substr($sql, -2) == "' ") {
            $sql .= "AND c.country ='" . db_escape($db, $country) . "' ";
        } else {
            $sql .= "WHERE c.country ='" . db_escape($db, $country) . "' ";
        }
    }

    // When a search title is provided, look for related races
    if (isset($title) and !empty($title)) {
        if (substr($sql, -2) == "' ") {
            $sql .= "AND r.name like '" . db_escape($db, $title) . "%' ";
        } else {
            $sql .= "WHERE r.name like '" . db_escape($db, $title) . "%' ";
        }
    }

    $sql .= "ORDER BY country ASC ";
    $sql .= "LIMIT " . $result_limit;


    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

$year = "";
if (isset($_GET['year'])) {
    $year = $_GET['year'];
}

$country = "";
if (isset($_GET['country'])) {
    $country = $_GET['country'];
}

$title = "";
if (isset($_GET['title'])) {
    $title = $_GET['title'];
}


$result_limit = 3;
if (isset($_GET['result_limit'])) {
    $result_limit = $_GET['result_limit'];
}

$country_set = finddd($year, $country, $title, $result_limit);
$result_array = array();

while ($country = mysqli_fetch_assoc($country_set)) {
    array_push($result_array, $country);
}

echo json_encode($result_array);
mysqli_free_result($country_set);
