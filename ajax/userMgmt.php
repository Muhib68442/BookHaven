<?php 


header('Content-Type: application/json');

include_once('../core/database.php');


$raw_data =  json_decode(file_get_contents("php://input"), true);

if($raw_data['set'] == "showAllUsers"){
    $db = new Database();
    $db->select("users", "*", null, null, null, null);
    echo json_encode($db->get_result());
}
else if($raw_data['set'] == "showUserDetails"){
    $id = $raw_data['id'];
    $db = new Database();
    $db->select("users", "*", null, "id = '$id'", null, null);
    echo json_encode($db->get_result());
}
else if($raw_data['set'] == 'toggleUserStatus'){
    $id = $raw_data['id'];
    $db = new database();
    $db->sql("UPDATE users SET status = (CASE WHEN status = 'Active' THEN 'Inactive' ELSE 'Active' END) WHERE id = '$id'");
    echo json_encode(array("status" => "success", "message" => "Status updated successfully"));
}else if($raw_data['set'] == 'deleteUser'){
    $id = $raw_data['id'];
    $db = new database();
    $db->sql('DELETE FROM users WHERE id = '.$id);
    echo json_encode(array("status" => "success", "message" => "User deleted successfully"));
}else if ($raw_data['set'] == 'getUserIssues') {
    $userName = $raw_data['user_name'];
    $db = new database();

    $db->select(
        "issues",
        "*, issues.status as issue_status",
        "JOIN books ON issues.book_id = books.book_id JOIN members ON issues.member_id = members.member_id",
        "issued_by = '$userName' OR returned_by = '$userName'",
        "issue_id DESC",
        null
    );

    $raw = $db->get_result();
    $final = [];

    foreach ($raw as $row) {
        if ($row['issued_by'] === $userName) {
            $issuedRow = $row;
            $issuedRow['action_type'] = 'Issued';
            $final[] = $issuedRow;
        }

        if ($row['returned_by'] === $userName) {
            $returnedRow = $row;
            $returnedRow['action_type'] = 'Returned';
            $final[] = $returnedRow;
        }
    }

    echo json_encode($final);
}

else if($raw_data['set'] == "adminLog"){
    $db = new Database();
    $db->sql("
        SELECT *, admin_logs.id as admin_log_id FROM admin_logs 
        JOIN users ON admin_logs.user_id = users.id
        ORDER BY admin_logs.created_at DESC
        ");
    echo json_encode($db->get_result());
    // JOIN users ON admin_logs.user_id = users.id
    // JOIN books ON admin_logs.book_id = books.book_id
    // JOIN members ON admin_logs.member_id = members.member_id
}