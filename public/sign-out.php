<?php require_once('../private/initialize.php');

unset($_SESSION['username']);

redirect_to(url_for('index.php'))


?>