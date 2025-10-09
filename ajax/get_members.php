<?php 

if(session_status() === PHP_SESSION_NONE){
    session_start();
}
header("Content-Type: application/json");

include('../core/database.php');

$database = new database();

$raw_data = json_decode(file_get_contents("php://input"), true);

if($raw_data['show'] == "all"){
    $database->sql("SELECT 
  members.*, 
  COUNT(issues.issue_id) AS total_issues
FROM members
LEFT JOIN issues ON issues.member_id = members.member_id
GROUP BY members.member_id;");
    // $database->select("members", "*", null, null, null, null);
    $result = $database->get_result();
    echo json_encode(array("data" => $result, "num_members" => count($result)));
}else if($raw_data['show'] == "search"){
    $term = $raw_data['value'];
    $database->select("members", "*", null, "full_name LIKE '%$term%' OR email LIKE '%$term%' OR phone LIKE '%$term%' OR member_id LIKE '%$term%' ", null, null);
    $result = $database->get_result();
    echo json_encode(array("data" => $result));
}
else if($raw_data['show'] == "sort"){
    $term = $raw_data['value'];
    $order = ($term == "total_issues" || $term == "status") ? "DESC" : "ASC";
    $database->sql("SELECT 
  members.*, 
  COUNT(issues.issue_id) AS total_issues
FROM members
LEFT JOIN issues ON issues.member_id = members.member_id
GROUP BY members.member_id
ORDER BY $term $order;");

    // $database->select("members", "*", null, null, "$term $order", null);
    $result = $database->get_result();
    echo json_encode(array("data" => $result));
}else if($raw_data['show'] == "details"){
    $id = $raw_data['value'];
    $database->select("members", "*", null, "member_id = '$id'", null, null);
    $result = $database->get_result();
    echo json_encode($result);
}

// echo $_SESSION['user_name'];
// echo $_SESSION['user_id'];

?>