<?php

header("Content-Type: application/json");
include_once('../core/database.php');

$raw_data = json_decode(file_get_contents("php://input"), true);

// SHOW ALL DATA 
if($raw_data['show'] == "all"){
    $db = new Database();
    $db->select("books");
    $result = $db->get_result();
    echo json_encode($result);
}else if($raw_data['show'] == "search"){
    $search_keyword = $raw_data['value'];
    $db = new database();
    // $db->select("books", "*", null, "title LIKE '%$search_keyword%' OR author LIKE '%$search_keyword%' OR publisher LIKE '%$search_keyword%' OR isbn LIKE '%$search_keyword%' ", null, null);
    $db->sql("SELECT * FROM books WHERE book_name LIKE '%$search_keyword%' OR author LIKE '%$search_keyword%' OR publisher LIKE '%$search_keyword%' OR book_id LIKE '%$search_keyword%' ");
    $result = $db->get_result();
    echo json_encode($result);
}else if($raw_data['show']=="id"){
    $id = $raw_data['value'];
    $db = new database();
    $db->sql("SELECT * FROM books WHERE book_id = '$id' ");;
    $result = $db->get_result();
    echo json_encode($result);
}else if($raw_data['show'] = "sort"){
    $sort_by = $raw_data['value'];
    $db = new database();
    $db->sql("SELECT * FROM books ORDER BY $sort_by ASC");
    $result = $db->get_result();
    echo json_encode($result);
}



?>