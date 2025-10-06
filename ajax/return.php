<?php 

header('Content-Type: application/json');
include_once('../core/database.php');

$raw_data = json_decode(file_get_contents("php://input"), true);

if($raw_data['get'] == "searchReturn"){
    $issueID = $raw_data['issue'];
    $memberID = $raw_data['member'];
    $bookID = $raw_data['book'];

    $db = new database();
    $db->sql("SELECT * FROM issues 
    JOIN members ON issues.member_id = members.member_id
    JOIN books ON issues.book_id = books.book_id
    WHERE issue_id = '$issueID' AND issues.member_id = '$memberID' AND issues.book_id = '$bookID' AND issues.status = 'Issued'");
    $result = $db->get_result();
    echo json_encode($result);
}else if($raw_data['get'] == "returnBook"){
    $issueID = $raw_data['issueID'];
    $bookID = $raw_data['bookID'];
    $db = new database();
    $db->update("issues", array("status" => "Returned", "return_date" => date('Y-m-d')), "issue_id = '$issueID'");

    // increment stock
    $db->sql("UPDATE books SET stock = stock + 1 WHERE book_id = '$bookID'");
    
    
    echo json_encode(array("status" => "success", "message" => "Book returned successfully"));
    if(!$db->get_result()){
        echo json_encode(array("message" => "Query failed", )); 
    }
}

?>