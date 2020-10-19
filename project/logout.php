<?php
session_start();
// remove all session variables
session_unset();
// destroy the session
session_destroy();
?>
<?php require_once(__DIR__ . "/partials/nav.php"); ?>
<?php
echo "You're logged out. if you would like to login again, hit the login button above! <br>";
//echo "<pre>" . var_export($_SESSION, true) . "</pre>";
?>
