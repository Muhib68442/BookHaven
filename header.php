<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$role    = isset($_SESSION['user_role']) ? $_SESSION['user_role'] : null;
$auth_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookHaven</title>
    <link rel="shortcut icon" href="res/logo/favicon.png" type="image/x-icon">

    <!-- CSS -->
    <link rel="stylesheet" href="res/css/main.css">

    <!-- TOASTIFY -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

</head>