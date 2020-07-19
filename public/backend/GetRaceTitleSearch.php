<?php 
require_once '../..//private/initialize.php'; 

function find_by_title($title) {
    global $db;

    $sql = "SELECT DISTINCT name FROM races ";
    $sql .= "WHERE name LIKE '" . db_escape($db, $title) . "%' ";

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

$title = $_GET['title'];
$title_set = find_by_title($title);
$result_array = array();

while ($title = mysqli_fetch_assoc($title_set)) { 
    array_push($result_array, $title);

}

echo json_encode($result_array);
mysqli_free_result($title_set);

?>
