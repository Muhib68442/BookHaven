<?php 
include_once('../core/database.php');


// ADD USER 
if(isset($_POST['addUser'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $role = $_POST['role'];
    $phone = $_POST['phone'];

    $finalPass = password_hash($password, PASSWORD_DEFAULT);

    if(($password === $confirm_password) && $name!=="" && $email!=="" && $password!=="" && $role!=="") {
        $db = new Database();
        $db->sql("INSERT INTO users(name, email, password, role, phone) VALUES('$name', '$email', '$finalPass', '$role', '$phone')");
            header("Location: ../userManagement.php");
            exit;
    } else {
        echo "All fields are required.";
    }
}

// UPDATE USER
if (isset($_POST['updateUser'])) {
    $id    = $_POST['id'];
    $name  = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $role  = $_POST['role'];

    $old_password     = $_POST['old_password'];
    $new_password     = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Basic validation
    if ($name !== "" && $email !== "" && $phone !== "" && $role !== "" && !empty($old_password)) {

        $db = new Database();
        $db->select("users", "*", null, "id = '$id'", null, null);
        $result = $db->get_result();

        if (!empty($result)) {
            $user = $result[0];

            // Verify old password
            if (password_verify($old_password, $user['password'])) {

                // If new password fields are filled and match — update all
                if (!empty($new_password) && !empty($confirm_password)) {
                    if ($new_password === $confirm_password) {
                        $finalPass = password_hash($new_password, PASSWORD_DEFAULT);
                        $db->sql("UPDATE users SET name = '$name', email = '$email', password = '$finalPass', role = '$role', phone = '$phone' WHERE id = '$id'");
                    }
                } else {
                    // No password change — update other fields
                    $db->sql("UPDATE users SET name = '$name', email = '$email', role = '$role', phone = '$phone' WHERE id = '$id'");
                }

                header("Location: ../userDetails.php?id=$id");
                exit;
            } else {
                echo "Old password incorrect.";
            }
        } else {
            echo "User not found. ID : " . $id;
        }
    } else {
        echo "All fields including old password are required.";
    }
}
?>