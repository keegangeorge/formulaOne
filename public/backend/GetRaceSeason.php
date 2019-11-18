<?php 
require_once '../..//private/initialize.php'; 

$season_set = find_all_seasons();
$result_array = array();

while ($seasons = mysqli_fetch_assoc($season_set)) { 
    array_push($result_array, $seasons);

}
echo json_encode($result_array);
mysqli_free_result($season_set);

?>
