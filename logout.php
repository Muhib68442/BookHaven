<?php
session_start();

include_once('core/database.php');

// Update last login time before logout
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
    $db = new Database();
    $db->sql("UPDATE users SET last_login = NOW() WHERE id = '$userId'");
}

// Destroy session
session_unset();
session_destroy();

header("Location: login.php");
exit;
?>