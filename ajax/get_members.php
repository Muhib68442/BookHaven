<?php 

header("Content-Type: application/json");

include('../core/database.php');

$database = new database();

$raw_data = json_decode(file_get_contents("php://input"), true);

if($raw_data['show'] == "all"){
    $database->select("members", "*", null, null, null, null);
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
    $database->select("members", "*", null, null, "$term ASC", null);
    $result = $database->get_result();
    echo json_encode(array("data" => $result));
}else if($raw_data['show'] == "details"){
    $id = $raw_data['value'];
    $database->select("members", "*", null, "member_id = '$id'", null, null);
    $result = $database->get_result();
    echo json_encode($result);
}