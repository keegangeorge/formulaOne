<?php 
require_once '../..//private/initialize.php'; 

function find_by_year($year) {
    global $db;

    $sql = "SELECT DISTINCT country FROM circuits INNER JOIN races on races.circuitId = circuits.circuitId ";
    $sql .= "WHERE races.year='" . db_escape($db, $year) . "' ";
    $sql .= "ORDER by country ASC";

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

$year = $_GET['year'];
$country_set = find_by_year($year);
$result_array = array();

while ($country = mysqli_fetch_assoc($country_set)) { 
    array_push($result_array, $country);

}

echo json_encode($result_array);
mysqli_free_result($country_set);

?>
