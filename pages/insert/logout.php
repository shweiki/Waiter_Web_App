<?php
// remove all session variables
session_start();
session_unset();

// destroy the session
session_destroy();
  header('Location: http://'. $_SERVER["SERVER_NAME"] .'/wanter_order_app/login.php');

 ?>
