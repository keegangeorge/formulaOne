<?php

// USER AUTHENTICATION RELATED FUNCTIONS //

/**
 * Function for validating members registering an account
 */
function validate_member($member)
{

    // First Name Validation
    if (is_blank($member['first_name'])) {
        $errors[] = "First name cannot be blank.";
    } elseif (!has_length($member['first_name'], array('min' => 2, 'max' => 255))) {
        $errors[] = "First name must be between 2 and 255 characters.";
    }

    // Last Name Validation
    if (is_blank($member['last_name'])) {
        $errors[] = "Last name cannot be blank.";
    } elseif (!has_length($member['first_name'], array('min' => 2, 'max' => 255))) {
        $errors[] = "Last name must be between 2 and 255 characters.";
    }

    // Email Validation
    if (is_blank($member['email'])) {
        $errors[] = "Email cannot be blank.";
    } elseif (!has_length($member['email'], array('max' => 255))) {
        $errors[] = "Email must be less than 255 characters.";
    } elseif (!has_valid_email_format($member['email'])) {
        $errors[] = "Email must be a valid format.";
    }

    // Username Validation
    if (is_blank($member['username'])) {
        $errors[] = "Username cannot be blank";
    } elseif (!has_length($member['username'], array('min' => 8, 'max' => 255))) {
        $errors[] = "Username must be between 8 and 255 characters.";
    } elseif (!has_unique_username($member['username'], $member['id'] ?? 0)) {
        $errors[] = "Username not allowed. Try another.";
    }

    // Password Validation
    if (is_blank($member['password'])) {
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

    // Confirm password validation
    if (is_blank($member['confirm_password'])) {
        $errors[] = "Confirm password cannot be blank.";
    } elseif ($member['password'] !== $member['confirm_password']) {
        $errors[] = "Password and confirm password must match.";
    }

    return $errors;
}

/**
 * Function for inserting members into the database.
 */
function insert_member($member)
{
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

/**
 * Function for updating members in database
 */
function update_member($member)
{
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

/**
 * Function for updating certain user information
 */
function update_user_information($account, $username)
{
    global $db;

    $sql = "UPDATE members ";
    $sql .= "SET first_name='" . db_escape($db, $account['first_name']) . "', ";
    $sql .= "last_name='" . db_escape($db, $account['last_name']) . "', ";
    $sql .= "email='" . db_escape($db, $account['email']) . "' ";
    $sql .= "WHERE username='" . db_escape($db, $username) . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
}

/**
 * Function for finding member information by
 * the username of the member
 */
function find_member_by_username($username)
{
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

/**
 * Function for finding out account information
 * based on the username provided
 */
function find_account_info($username)
{
    global $db;

    $sql = "SELECT * FROM members ";
    $sql .= "WHERE username='" . db_escape($db, $username) . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $account = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return ($account);
}






// FORMULA ONE RELATED QUERY FUNCTIONS //
/**
 * Function for finding selected year of race
 */
function find_all_seasons()
{
    global $db;

    $sql = "SELECT DISTINCT year FROM races ";
    $sql .= "ORDER BY year DESC";

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

/**
 * Function for fetching all countries
 * in ascending order
 */
function find_all_countries()
{
    global $db;

    $sql = "SELECT DISTINCT circuitId, country FROM circuits ";
    $sql .= "ORDER BY country ASC";

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

/**
 * Function for finding races by the year indicated
 */
function find_race_by_year($year)
{
    global $db;

    $sql = "SELECT * FROM races ";
    $sql .= "WHERE year='" . db_escape($db, $year) . "' ";

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

/**
 * Function for finding races by the circuitId
 */
function find_race_by_circuitId($circuitId)
{
    global $db;

    $sql = "SELECT * FROM circuits ";
    $sql .= "WHERE circuitId='" . db_escape($db, $circuitId) . "'";

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

/**
 * Function for finding races by raceId
 */
function find_race_by_raceId($raceId)
{
    global $db;

    $sql = "SELECT * FROM races ";
    $sql .= "WHERE raceId='" . db_escape($db, $raceId) . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $race = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return ($race);
}




/**
 * Function for finding circuit related information
 * based on the circuitId provided
 */
function find_circuit($circuitId)
{
    global $db;

    $sql = "SELECT * FROM circuits ";
    $sql .= "WHERE circuitId='" . db_escape($db, $circuitId) . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $circuit = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return ($circuit);
}

/**
 * Function for findind the results of a race
 * based on the provided raceId
 */
function find_results_by_raceId($raceId)
{
    global $db;

    $sql = "SELECT * FROM results ";
    $sql .= "WHERE raceId='" . db_escape($db, $raceId) . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $race_results = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return ($race_results);
}

/**
 * Function for finding specific results of a 
 * race based on the raceId and the driverId
 */
function find_specific_results_by_raceId($raceId, $driverId)
{
    global $db;

    $sql = "SELECT * FROM results ";
    $sql .= "WHERE raceId='" . db_escape($db, $raceId) . "' ";
    $sql .= "AND driverId='" . db_escape($db, $driverId) . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return ($result);
}

/**
 * Function for querying all constructor related
 * information based on the constructorId
 */
function find_constructors($constructorId)
{
    global $db;

    $sql = "SELECT * FROM constructors ";
    $sql .= "WHERE constructorId='" . db_escape($db, $constructorId) . "' ";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return ($result);
}

/**
 * Function for finding driver standing based on
 * the raceId that was provided
 */
function find_driver_standings_by_raceId($raceId)
{
    global $db;

    $sql = "SELECT * FROM driverstandings ";
    $sql .= "WHERE raceId='" . db_escape($db, $raceId) . "' ";
    $sql .= "ORDER BY position";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

/**
 * Function for finding driver related information
 * based on the driverId provided
 */
function find_drivers_by_driverId($driverId)
{
    global $db;

    $sql = "SELECT * FROM drivers ";
    $sql .= "WHERE driverId='" . db_escape($db, $driverId) . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return ($result);
}

/**
 * Function for fetching qualifying race 
 * information based on the raceId provided
 */
function find_qualifying_by_raceId($raceId)
{
    global $db;

    $sql = "SELECT * FROM qualifying ";
    $sql .= "WHERE raceId='" . db_escape($db, $raceId) . "' ";
    $sql .= "ORDER BY position ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return ($result);
}

/**
 * Function for fetching the three latest races
 * based on the current date
 */
function find_latest_races()
{
    global $db;

    // Get the current date and time
    $current_date = date('Y-m-d', time());
    date_default_timezone_set('Canada/Pacific');

    $sql = "SELECT * FROM races ";
    $sql .= "WHERE date >= '" . db_escape($db, $current_date) . "' ";
    $sql .= "LIMIT 3";

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return ($result);
}





// COMMENT RELATED QUERY FUNCTIONS //

/**
 * Function for finding the total number of 
 * comments made by a user
 */
function find_comment_count($username)
{
    global $db;

    $sql = "SELECT COUNT(*) FROM comments ";
    $sql .= "WHERE username='" . db_escape($db, $username) . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $count = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return ($count);
}

/**
 * Function for finding the latest comment made by a user
 */
function find_latest_comment($username)
{
    global $db;

    $sql = "SELECT MAX(date) FROM comments ";
    $sql .= "WHERE username='" . db_escape($db, $username) . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $date = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return ($date);
}

/**
 * Function for validating a comment sent to
 * ensure that it is not blank
 */
function validate_comment($message)
{
    $errors = [];

    if (is_blank($message)) {
        $errors[] = "Message cannot be blank.";
    }

    return $errors;
}

/**
 * Function for inserting a new comment
 * into the database based on the comment's
 * message and raceId
 */
function insert_comment($message, $raceId)
{
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

/**
 * Function for fetching a user's comments based
 * on their username
 */
function find_comments_by_username($username)
{
    global $db;

    $sql = "SELECT * FROM comments ";
    $sql .= "WHERE username='" . db_escape($db, $username) . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return ($result);
}

/**
 * Function for finding comments based on the
 * raceId that was provided
 */
function find_comments_by_raceId($raceId)
{
    global $db;

    $sql = "SELECT * FROM comments ";
    $sql .= "WHERE raceId='" . db_escape($db, $raceId) . "' ";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return ($result);
}


// FAVOURITES RELATED FUNCTIONS //
function find_favourite_information($raceId)
{
    global $db;

    $sql = "SELECT * FROM race_favourites ";
    $sql .= "WHERE raceId='" . db_escape($db, $raceId) . "' ";
    $sql .= "AND username='" . db_escape($db, $_SESSION['username']) . "' ";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return ($result);
}

/**
 * Function for finding races by raceId limited by top 3
 */
function find_race_by_raceId_with_limit($raceId)
{
    global $db;

    $sql = "SELECT * FROM races ";
    $sql .= "WHERE raceId='" . db_escape($db, $raceId) . "' ";
    $sql .= "LIMIT 3";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return ($result);
}

function find_favourite_information_by_user()
{
    global $db;

    $sql = "SELECT * FROM race_favourites ";
    $sql .= "WHERE username='" . db_escape($db, $_SESSION['username']) . "' ";
    $sql .= "LIMIT 3";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function find_favourite_information_by_user_no_limit()
{
    global $db;

    $sql = "SELECT * FROM race_favourites ";
    $sql .= "WHERE username='" . db_escape($db, $_SESSION['username']) . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function find_favs()
{
    global $db;

    $sql = "SELECT * FROM race_favourites ";
    $sql .= "WHERE username='" . db_escape($db, $_SESSION['username']) . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $favs = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return ($favs);
}
