<?php

header("Content-Type: application/json");
include_once('../core/database.php');

$raw_data = json_decode(file_get_contents("php://input"), true);

$op = $raw_data['set'];
if($op == "add"){
    $form_data = $raw_data['value'];
    if(is_null($form_data['book_id'])){
        unset($form_data['book_id']);
    }
    $db = new database();
    $db->insert("books", $form_data);
    $bookID = $db->get_last_id();
    $db->log("add_book", "book", $bookID, $bookID, null);
    echo json_encode(array("status" => "success", "message" => "Book added successfully"));
}else if($op == "delete"){
    $id = $raw_data['value'];
    $db = new database();
    
    if($db->delete("books", "book_id = '$id'")){
        $db->log("delete_book", "book", $id, $id, null);
        echo json_encode(array("status" => "success", "message" => "Book deleted successfully"));
    }
    else{
        echo json_encode(array("status" => "error", "message" => "Book could not be deleted"));
    }
}else if($op == 'status'){
    $status = $raw_data['value'];
    $book_id = $raw_data['book_id'];

    $status == "Active" ? $text = "activated" : $text = "deactivated";
    
    $db = new database();
    $db->update("books", array("status" => $status), "book_id = '$book_id'");
    $db->log($text.'_book','book', $book_id, $book_id, null);
    echo json_encode(array("status" => "success", "message" => "Book status updated successfully"));
}else if($op == 'edit'){
    $data = $raw_data['value'];
    $book_id = $raw_data['book_id'];
    $db = new database();
    $db->update("books", $data, "book_id = '$book_id'");
    $db->log("update_book", "book", $book_id, $book_id, null);
    echo json_encode(array("status" => "success", "message" => "Book updated successfully"));
}
?>