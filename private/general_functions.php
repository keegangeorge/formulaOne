<?php 
    function url_for($script_path) {
        // add the leading '/' if it isn't present
        if ($script_path[0] != '/') {
            $script_path = "/" . $script_path;
        }
        return WWW_ROOT . $script_path;
    }

    /**
     * Shorthand function for urlencode($string);
     */
    function u($string="") {
        return urlencode($string);
    }

    /**
     * Shorthand function for rawurlencode($string);
     */
    function raw_u($string="") {
        return rawurlencode($string);
    }

    /**
     * Shorthand function for htmlspecialchars($string);
     */
    function h($string="") {
        return htmlspecialchars($string);
    }

    function error_404() {
        header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
        exit();
    }
      
    function error_500() {
        header($_SERVER["SERVER_PROTOCOL"] . " 500 Internal Server Error");
        exit();
    }
      
    /**
     * Function to redirect page
     */
    function redirect_to($location) {
        header("Location: " . $location);
        exit;
    }
    
    function is_post_request() {
        return $_SERVER['REQUEST_METHOD'] == 'POST';
    }
    
    function is_get_request() {
        return $_SERVER['REQUEST_METHOD'] == 'GET';
    }
    
    function display_errors($errors=array()) {
        $output = '';
        if(!empty($errors)) {
            $output .= "<div class=\"alert alert-danger errors mt-3\">";
            $output .= "<i class=\"fas fa-bullhorn mr-3\"></i>";
            $output .= "<strong>Please fix the following errors:</strong>";
            $output .= "<ul class=\"mt-2\">";
            foreach($errors as $error) {
            $output .= "<li>" . h($error) . "</li>";
            }
            $output .= "</ul>";
            $output .= "</div>";
        }
        return $output;
    }
      

?>