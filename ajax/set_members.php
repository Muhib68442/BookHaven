<?php
header("Content-Type: application/json");
include_once('../core/database.php');

$raw_data = json_decode(file_get_contents("php://input"), true);
if($raw_data['set'] == 'add'){
    $form_data = $raw_data['value'];
    $db = new database();
    $db->insert("members", $form_data);
    echo json_encode(array("status" => "success", "message" => "Member added successfully"));
}
else if($raw_data['set'] == 'delete'){
    $id = $raw_data['value'];
    $db = new database();
    
    if($db->delete("members", "member_id = '$id'")){
        echo json_encode(array("status" => "success", "message" => "Member deleted successfully"));
    }
    else{
        echo json_encode(array("status" => "error", "message" => "Member could not be deleted"));
    }
}else if($raw_data['set'] == 'status'){
    $status = $raw_data['value'];
    $member_id = $raw_data['member_id'];
    $db = new database();
    if($db->update("members", array("status" => $status), "member_id = '$member_id'")){
        echo json_encode(array("status" => "success", "message" => "Member status updated successfully"));
    }
    else{
        echo json_encode(array("status" => "error", "message" => "Member status could not be updated"));
    }
}else if($raw_data['set'] == 'update'){
    $form_data = $raw_data['value'];
    $member_id = $raw_data['member_id'];
    $db = new database();
    if($db->update("members", $form_data, "member_id = '$member_id'")){
        echo json_encode(array("status" => "success", "message" => "Member updated successfully"));
    }
    else{
        echo json_encode(array("status" => "error", "message" => "Member could not be updated"));
    }
}

?>