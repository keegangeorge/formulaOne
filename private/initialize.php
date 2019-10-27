<?php
    ob_start(); // Turns on output buffering

    /*
     * Constants for file paths
     * __FILE__ returns the current path to this file
     * dirname() returns the path to the parent directory
     * 
    */

    define("PRIVATE_PATH", dirname(__FILE__));
    define("PROJECT_PATH", dirname(PRIVATE_PATH));
    define("PUBLIC_PATH", PROJECT_PATH . '/public');
    define("SHARED_PATH", PRIVATE_PATH . '/shared');
  
    // Constant for Root URL
    // Dynamically finds everything in URL up to "/public"
    $public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
    $doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
    define("WWW_ROOT", $doc_root);

    // Requires
    // require_once('functions.php');
    // require_once('database.php');
    // require_once('query_functions.php');
    // require_once('validation_functions.php');

    // Connects to Database
    $db = db_connect();
    
    // Initializes Array for Housing Errors
    $errors = [];




?>