<?php

    require_once('db_credentials.php');

    /**
     * Connect to database using db_credentials constants
     */
    function db_connect() {
        $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        confirm_db_connect();
        return $connection;
    }

    /**
     * Disconnect from database by closing the database connection
     */
    function db_disconnect($connection) {
        if (isset($connection)) {
            mysqli_close($connection);
        }
    }

    /**
     * Used for escaping strings passed into database queries
     */
    function db_escape($connection, $string) {
        return mysqli_real_escape_string($connection, $string);
    }

    /**
     * Used to check for any errors connecting to the database.
     * Will display error message appropriately if any present.
     */
    function confirm_db_connect() {
        if (mysqli_connect_errno()) {
            $msg = "Database connection failed: ";
            $msg .= mysqli_connect_error();
            $msg .= " (" . mysqli_connect_errno() . ")";
            exit($msg);
        }
    }

    /**
     * Used to confirm that a result has been set in the database
     */
    function confirm_result_set($result_set) {
        if (!$result_set) {
            exit("Database query failed.");
        }
    }

?>