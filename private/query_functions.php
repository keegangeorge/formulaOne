<?php

// USER AUTHENTICATION FUNCTIONS //
// Include query functions in this file.
function validate_admin($admin) {

    if (is_blank($admin['first_name'])) {
        $errors[] = "First name cannot be blank.";
    } elseif (!has_length($admin['first_name'], array('min' => 2, 'max' => 255))) {
        $errors[] = "First name must be between 2 and 255 characters.";
    }

    if (is_blank($admin['last_name'])) {
        $errors[] = "Last name cannot be blank.";
    } elseif (!has_length($admin['first_name'], array('min' => 2, 'max' => 255))) {
        $errors[] = "Last name must be between 2 and 255 characters.";
    }

    if (is_blank($admin['email'])) {
        $errors[] = "Email cannot be blank.";
    } elseif (!has_length($admin['email'], array('max' => 255))) {
        $errors[] = "Email must be less than 255 characters.";
    } elseif (!has_valid_email_format($admin['email'])) {
        $errors[] = "Email must be a valid format.";
    }

    if (is_blank($admin['username'])) {
        $errors[] = "Username cannot be blank";
    } elseif (!has_length($admin['username'], array('min' => 8, 'max' => 255))) {
        $errors[] = "Username must be between 8 and 255 characters.";
    } elseif (!has_unique_username($admin['username'], $admin['id'] ?? 0)) {
        $errors[] = "Username not allowed. Try another.";
    }

    if(is_blank($admin['password'])) {
        $errors[] = "Password cannot be blank.";
      } elseif (!has_length($admin['password'], array('min' => 12))) {
        $errors[] = "Password must contain 12 or more characters";
      } elseif (!preg_match('/[A-Z]/', $admin['password'])) {
        $errors[] = "Password must contain at least 1 uppercase letter";
      } elseif (!preg_match('/[a-z]/', $admin['password'])) {
        $errors[] = "Password must contain at least 1 lowercase letter";
      } elseif (!preg_match('/[0-9]/', $admin['password'])) {
        $errors[] = "Password must contain at least 1 number";
      } elseif (!preg_match('/[^A-Za-z0-9\s]/', $admin['password'])) {
        $errors[] = "Password must contain at least 1 symbol";
      }
  
      if(is_blank($admin['confirm_password'])) {
        $errors[] = "Confirm password cannot be blank.";
      } elseif ($admin['password'] !== $admin['confirm_password']) {
        $errors[] = "Password and confirm password must match.";
      }
  
      return $errors;
}
  
function insert_admin($admin) {
    global $db;

    $errors = validate_admin($admin);
    if (!empty($errors)) {
        return $errors; 
    }

    $hashed_password = password_hash($admin['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO admins ";
    $sql .= "(first_name, last_name, email, username, hashed_password) ";
    $sql .= "VALUES (";
    $sql .= "'" . db_escape($db, $admin['first_name']) . "',";
    $sql .= "'" . db_escape($db, $admin['last_name']) . "',";
    $sql .= "'" . db_escape($db, $admin['email']) . "',";
    $sql .= "'" . db_escape($db, $admin['username']) . "',";
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

function update_admin($admin) {
    global $db;

    $errors = validate_admin($admin);
    if (!empty($errors)) {
        return $errors;
    }

    $hashed_password = password_hash($admin['password'], PASSWORD_BCRYPT);

    $sql = "UPDATE admins SET ";
    $sql .= "first_name='" . db_escape($db, $admin['first_name']) . "', ";
    $sql .= "last_name='" . db_escape($db, $admin['last_name']) . "', ";
    $sql .= "last_name='" . db_escape($db, $admin['last_name']) . "', ";
    $sql .= "email='" . db_escape($db, $admin['email']) . "', ";
    $sql .= "hashed_password='" . db_escape($db, $hashed_password) . "', ";
    $sql .= "username='" . db_escape($db, $admin['username']) . "', ";
    $sql .= "WHERE id='" . db_escape($db, $admin['id']) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);
}

function find_admin_by_username($username) {
    global $db;

    $sql = "SELECT * FROM admins ";
    $sql .= "WHERE username='" . db_escape($db, $username) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $admin = mysqli_fetch_assoc($result); // find first
    mysqli_free_result($result);
    return $admin; // returns the associative array
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

    $sql = "SELECT DISTINCT country FROM circuits ";
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

