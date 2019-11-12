<?php

// USER AUTHENTICATION FUNCTIONS //
// Include query functions in this file.
function validate_member($member) {

    if (is_blank($member['first_name'])) {
        $errors[] = "First name cannot be blank.";
    } elseif (!has_length($member['first_name'], array('min' => 2, 'max' => 255))) {
        $errors[] = "First name must be between 2 and 255 characters.";
    }

    if (is_blank($member['last_name'])) {
        $errors[] = "Last name cannot be blank.";
    } elseif (!has_length($member['first_name'], array('min' => 2, 'max' => 255))) {
        $errors[] = "Last name must be between 2 and 255 characters.";
    }

    if (is_blank($member['email'])) {
        $errors[] = "Email cannot be blank.";
    } elseif (!has_length($member['email'], array('max' => 255))) {
        $errors[] = "Email must be less than 255 characters.";
    } elseif (!has_valid_email_format($member['email'])) {
        $errors[] = "Email must be a valid format.";
    }

    if (is_blank($member['username'])) {
        $errors[] = "Username cannot be blank";
    } elseif (!has_length($member['username'], array('min' => 8, 'max' => 255))) {
        $errors[] = "Username must be between 8 and 255 characters.";
    } elseif (!has_unique_username($member['username'], $member['id'] ?? 0)) {
        $errors[] = "Username not allowed. Try another.";
    }

    if(is_blank($member['password'])) {
        $errors[] = "Password cannot be blank.";
      } elseif (!has_length($member['password'], array('min' => 12))) {
        $errors[] = "Password must contain 12 or more characters";
      } elseif (!preg_match('/[A-Z]/', $member['password'])) {
        $errors[] = "Password must contain at least 1 uppercase letter";
      } elseif (!preg_match('/[a-z]/', $member['password'])) {
        $errors[] = "Password must contain at least 1 lowercase letter";
      } elseif (!preg_match('/[0-9]/', $member['password'])) {
        $errors[] = "Password must contain at least 1 number";
      } elseif (!preg_match('/[^A-Za-z0-9\s]/', $member['password'])) {
        $errors[] = "Password must contain at least 1 symbol";
      }
  
      if(is_blank($member['confirm_password'])) {
        $errors[] = "Confirm password cannot be blank.";
      } elseif ($member['password'] !== $member['confirm_password']) {
        $errors[] = "Password and confirm password must match.";
      }
  
      return $errors;
}
  
function insert_member($member) {
    global $db;

    $errors = validate_member($member);
    if (!empty($errors)) {
        return $errors; 
    }

    $hashed_password = password_hash($member['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO members ";
    $sql .= "(first_name, last_name, email, username, hashed_password) ";
    $sql .= "VALUES (";
    $sql .= "'" . db_escape($db, $member['first_name']) . "',";
    $sql .= "'" . db_escape($db, $member['last_name']) . "',";
    $sql .= "'" . db_escape($db, $member['email']) . "',";
    $sql .= "'" . db_escape($db, $member['username']) . "',";
    $sql .= "'" . db_escape($db, $hashed_password) . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);

    // For INSERT statements, $result is true/false
    if ($result) {
        return true;
    } else {
        // When INSERT fails
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function update_member($member) {
    global $db;

    $errors = validate_member($member);
    if (!empty($errors)) {
        return $errors;
    }

    $hashed_password = password_hash($member['password'], PASSWORD_BCRYPT);

    $sql = "UPDATE members SET ";
    $sql .= "first_name='" . db_escape($db, $member['first_name']) . "', ";
    $sql .= "last_name='" . db_escape($db, $member['last_name']) . "', ";
    $sql .= "last_name='" . db_escape($db, $member['last_name']) . "', ";
    $sql .= "email='" . db_escape($db, $member['email']) . "', ";
    $sql .= "hashed_password='" . db_escape($db, $hashed_password) . "', ";
    $sql .= "username='" . db_escape($db, $member['username']) . "', ";
    $sql .= "WHERE id='" . db_escape($db, $member['id']) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);
}

function find_member_by_username($username) {
    global $db;

    $sql = "SELECT * FROM members ";
    $sql .= "WHERE username='" . db_escape($db, $username) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $member = mysqli_fetch_assoc($result); // find first
    mysqli_free_result($result);
    return $member; // returns the associative array
}

// FORMULA ONE RELATED QUERY FUNCTIONS //
function find_all_seasons() {
    global $db;

    $sql = "SELECT DISTINCT year FROM races ";
    $sql .= "ORDER BY year DESC";
    
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}


function find_all_countries() {
    global $db;

    $sql = "SELECT DISTINCT circuitId, country FROM circuits ";
    $sql .= "ORDER BY country ASC";
    
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function find_race_by_year($year) {
    global $db;

    
    $sql = "SELECT * FROM races ";
    // $sql .= "INNER JOIN circuits ";
    $sql .= "WHERE year='" . db_escape($db, $year) . "' ";
    

    
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    // $race = mysqli_fetch_assoc($result);
    // mysqli_free_result($result);
    // return $race;
    return $result;
    
}

function find_race_by_circuitId($circuitId) {
    global $db;

    $sql = "SELECT * FROM circuits ";
    $sql .= "WHERE circuitId='" . db_escape($db, $circuitId) . "'";

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function find_race_by_raceId($raceId) {
    global $db;

    $sql = "SELECT * FROM races ";
    $sql .= "WHERE raceId='" . db_escape($db, $raceId) . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $race = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return($race);
}

function find_comment_count($username) {
    global $db;

    $sql = "SELECT COUNT(*) FROM comments ";
    $sql .= "WHERE username='" . db_escape($db, $username) . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $count = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return($count);
}

function find_latest_comment($username) {
    global $db;

    $sql = "SELECT MAX(date) FROM comments ";
    $sql .= "WHERE username='" . db_escape($db, $username) . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $date = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return($date);
}

function update_user_information($account, $username) {
    global $db;

    $sql = "UPDATE members ";
    $sql .= "SET first_name='" . db_escape($db, $account['first_name']) . "', ";
    $sql .= "last_name='" . db_escape($db, $account['last_name']) . "', ";
    $sql .= "email='" . db_escape($db, $account['email']) . "' ";
    $sql .= "WHERE username='" . db_escape($db, $username) . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);

}


function find_circuit($circuitId) {
    global $db;

    $sql = "SELECT * FROM circuits ";
    $sql .= "WHERE circuitId='" . db_escape($db, $circuitId) . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $circuit = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return($circuit);
}

function find_results_by_raceId($raceId) {
    global $db;

    $sql = "SELECT * FROM results ";
    $sql .= "WHERE raceId='" . db_escape($db, $raceId) . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $race_results = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return($race_results);
}

function find_specific_results_by_raceId($raceId, $driverId) {
    global $db;

    $sql = "SELECT * FROM results ";
    $sql .= "WHERE raceId='" . db_escape($db, $raceId) . "' ";
    $sql .= "AND driverId='" . db_escape($db, $driverId) . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return($result);
}

function find_constructors($constructorId) {
    global $db;

    $sql = "SELECT * FROM constructors ";
    $sql .= "WHERE constructorId='" . db_escape($db, $constructorId) . "' ";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return($result);
}

function find_driver_standings_by_raceId($raceId) {
    global $db;

    $sql = "SELECT * FROM driverstandings ";
    $sql .= "WHERE raceId='" . db_escape($db, $raceId) . "' ";
    $sql .= "ORDER BY position";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    // $driver_standings = mysqli_fetch_assoc($result);
    // mysqli_free_result($result);
    // return($driver_standings);
    return $result;
}

function find_drivers_by_driverId($driverId) {
    global $db;

    $sql = "SELECT * FROM drivers ";
    $sql .= "WHERE driverId='" . db_escape($db, $driverId) . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    // $drivers = mysqli_fetch_assoc($result);
    // mysqli_free_result($result);
    // return($drivers);
    return($result);
}

function find_qualifying_by_raceId($raceId) {
    global $db;

    $sql = "SELECT * FROM qualifying ";
    $sql .= "WHERE raceId='" . db_escape($db, $raceId) . "' ";
    $sql .= "ORDER BY position ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return($result);
}

function validate_comment($message) {
    $errors = [];

    if (is_blank($message)) {
        $errors[] = "Message cannot be blank.";
    }

    return $errors;
}

function insert_comment($message, $raceId) {
    global $db;

    $errors = validate_comment($message);

    if (!empty($errors)) {
        return $errors;
    }

    date_default_timezone_set('Canada/Pacific');

    $sql = "INSERT INTO comments ";
    $sql .= "(username, date, message, raceId) ";
    $sql .= "VALUES (";
    $sql .= "'" . db_escape($db, $_SESSION['username']) . "', ";
    $sql .= "'" . db_escape($db, date('Y-m-d H:i:s')) . "', ";
    $sql .= "'" . db_escape($db, $message) . "', ";
    $sql .= "'" . db_escape($db, $raceId) . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);

    if ($result) {
        return true;
    } else {
        // inserrt failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function find_comments_by_username($username) {
    global $db;

    $sql = "SELECT * FROM comments ";
    $sql .= "WHERE username='" . db_escape($db, $username) . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return($result);
    
}

function find_comments_by_raceId($raceId) {
    global $db;

    $sql = "SELECT * FROM comments ";
    $sql .= "WHERE raceId='" . db_escape($db, $raceId) . "' ";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return($result);
}

function find_latest_races() {
    global $db;

    $current_date = date('Y-m-d', time());
    date_default_timezone_set('Canada/Pacific');

    $sql = "SELECT * FROM races ";
    $sql .= "WHERE date >= '" . db_escape($db, $current_date) . "' ";
    $sql .= "LIMIT 3";
    
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return($result);
}

function find_account_info($username) {
    global $db;

    $sql = "SELECT * FROM members ";
    $sql .= "WHERE username='" . db_escape($db, $username) . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $account = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return($account);


}