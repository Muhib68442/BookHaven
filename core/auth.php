<?php
session_start();
include_once('database.php');

if (isset($_POST['login'])) {
    $email    = trim($_POST['email']);
    $password = $_POST['password'];

    if ($email !== "" && $password !== "") {
        $db = new Database();
        $db->select("users", "*", null, "email = '$email'", null, null);
        $result = $db->get_result();

        if (!empty($result)) {
            $user = $result[0];

            if ($user['status'] === 'Inactive') {
                echo "<script>alert('Account is inactive. Contact to Admin for more details');</script>";
                exit;
            }

            if (password_verify($password, $user['password'])) {
                // Set session
                $_SESSION['user_id']   = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['user_role'] = $user['role'];

                // UPDATE LAST LOGIN
                $db->sql("UPDATE users SET last_login = NOW() WHERE id = '{$user['id']}'");


                header("Location: ../index.php");
                exit;
            } else {
                echo "<script>alert('Invalid email or password. Please try again.');</script>";
            }
        } else {
            echo "<script>alert('Account not found. Register first');</script>";
        }
    } else {
        echo "<script>alert('Please enter email and password.');</script>";
    }
}
?>