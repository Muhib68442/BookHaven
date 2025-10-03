<?php 

header("Content-Type: application/json");
include_once('../core/database.php');

$raw_data = json_decode(file_get_contents("php://input"), true);
$op = $raw_data['op'];

if($op == "all"){
    $db = new database();
    $db->sql("SELECT genres.genre_id, genres.genre_name, COUNT(books.genre_id) as book_count 
    FROM genres 
    LEFT JOIN books ON genres.genre_id = books.genre_id 
    GROUP BY genres.genre_id, genres.genre_name 
    ORDER BY genres.genre_name ASC");
    $result = $db->get_result();
    echo json_encode($result);
}else if($op == "add"){
    $form_data = $raw_data['value'];
    $db = new database();
    $db->sql("INSERT INTO genres(genre_name) VALUES('$form_data')");
    echo json_encode(array("status" => "success", "message" => "Genre added successfully"));
}else if($op == "delete"){
    $id = $raw_data['value'];
    $db = new database();
    
    if($db->delete("genres", "genre_id = '$id'")){
        echo json_encode(array("status" => "success", "message" => "Genre deleted successfully"));
    }
    else{
        echo json_encode(array("status" => "error", "message" => "Genre could not be deleted"));
    }
}else if($op == "rename"){
    $old_name = $raw_data['old_name'];
    $new_name = $raw_data['new_name'];
    $db = new database();
    $db->sql("UPDATE genres SET genre_name = '$new_name' WHERE genre_name = '$old_name'");
    echo json_encode(array("status" => "success", "message" => "Genre renamed successfully"));
}


?>