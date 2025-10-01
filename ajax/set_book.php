<?php

header("Content-Type: application/json");
include_once('../core/database.php');

$raw_data = json_decode(file_get_contents("php://input"), true);

$op = $raw_data['set'];
if($op == "add"){
    $form_data = $raw_data['value'];
    $db = new database();
    $db->insert("books", $form_data);
    echo json_encode(array("status" => "success", "message" => "Book added successfully"));
}else if($op == "delete"){
    $id = $raw_data['value'];
    $db = new database();
    
    if($db->delete("books", "book_id = '$id'")){
        echo json_encode(array("status" => "success", "message" => "Book deleted successfully"));
    }
    else{
        echo json_encode(array("status" => "error", "message" => "Book could not be deleted"));
    }
}
?>