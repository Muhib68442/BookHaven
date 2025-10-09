<?php 


header('Content-Type: application/json');

include('../core/database.php');

$raw_data = json_decode(file_get_contents("php://input"), true);

if($raw_data['get'] == "searchBook"){
    $term = $raw_data['value'];
    $db = new database();
    $db->sql("SELECT * FROM books 
          JOIN genres ON genres.genre_id = books.genre_id
          WHERE (book_name LIKE '%$term%' 
                 OR book_id LIKE '%$term%' 
                 OR author LIKE '%$term%') 
            AND stock > 0 
            AND status = 'Active'");

    $result = $db->get_result();
    echo json_encode(array("data" => $result));

}else if($raw_data['get'] == "searchMember"){
    $term = $raw_data['value'];
    $db = new database();
    $db->sql("SELECT * FROM members 
          WHERE (full_name LIKE '%$term%' 
                OR member_id LIKE '%$term%'
                OR email LIKE '%$term%'
                OR phone LIKE '%$term%')
            AND status = 'Active'");
    $result = $db->get_result();
    echo json_encode(array("data" => $result));


}else if($raw_data['get'] == "new_issue"){
    $bookID = $raw_data['book_id'];
    $memberID = $raw_data['member_id'];
    $issueDate = date('Y-m-d');
    $returnDate = date('Y-m-d', strtotime('+6 month'));
    $status = "Issued";
    $issuedBy = $raw_data['issued_by'];
    $db = new database();
    $db->insert("issues", array("book_id" => $bookID, "member_id" => $memberID, "issued_by" => $issuedBy, "issue_date" => $issueDate, "return_date" => $returnDate, "status" => $status));
    $issueID = $db->get_last_id();

    // decrement stock
    $db->sql("UPDATE books SET stock = stock - 1 WHERE book_id = '$bookID'");

    // log
    $db->log('issue','book', $issueID, $bookID, $memberID);

    echo json_encode(array("status" => "success", "message" => "Book issued successfully"));
}else if($raw_data['get'] == "allIssues"){
    $db = new database();
    $db->sql("SELECT *, issues.status as issue_status FROM issues
        JOIN books ON issues.book_id = books.book_id
        JOIN members ON issues.member_id = members.member_id
        ORDER BY issues.issue_id DESC");
    $result = $db->get_result();
    if(!$result){
        echo json_encode(array("error" => "Query failed")); // ERROR BLOCK
    }
    echo json_encode(array("data" => $result, 'num_issues' => count($result)));
}else if($raw_data['get'] == 'searchIssue'){
    $term = $raw_data['value'];
    $db = new database();
    $db->sql("SELECT *, issues.status as issue_status FROM issues
        JOIN books ON issues.book_id = books.book_id
        JOIN members ON issues.member_id = members.member_id
        JOIN genres ON genres.genre_id = books.genre_id
        WHERE (
        issues.book_id LIKE '%$term%' OR 
        issues.member_id LIKE '%$term%' OR 
        issues.issue_id LIKE '%$term%' OR 
        issues.issued_by LIKE '%$term%' OR 
        issues.returned_by LIKE '%$term%' OR 
        issues.status LIKE '%$term%' OR
        issues.issue_date LIKE '%$term%' OR 
        issues.return_date LIKE '%$term%' OR
        book_name LIKE '%$term%' OR 
        full_name LIKE '%$term%' OR 
        email LIKE '%$term%' OR 
        phone LIKE '%$term%')");
    $result = $db->get_result();
    echo json_encode(array("data" => $result));
}
else if($raw_data['get'] == "issueDetails"){
    $id = $raw_data['value'];
    $db = new database();
    $db->sql("SELECT *, issues.status as issue_status FROM issues
        JOIN books ON issues.book_id = books.book_id
        JOIN members ON issues.member_id = members.member_id
        JOIN genres ON genres.genre_id = books.genre_id
        WHERE issues.issue_id = '$id'");
    $result = $db->get_result();
    echo json_encode($result);
}

// BOOK and MEMBER PAGE ISSUE TABLE 

else if($raw_data['get'] == 'issueDetailsBook'){
    $id = $raw_data['value'];
    $db = new database();
    $db->sql("SELECT *, issues.status as issue_status FROM issues
        JOIN books ON issues.book_id = books.book_id
        JOIN members ON issues.member_id = members.member_id
        JOIN genres ON genres.genre_id = books.genre_id
        WHERE issues.book_id = '$id'");
    $result = $db->get_result();
    echo json_encode($result);
}
else if($raw_data['get'] == 'issueDetailsMember'){
    $id = $raw_data['value'];
    $db = new database();
    $db->sql("SELECT *, issues.status as issue_status FROM issues
        JOIN books ON issues.book_id = books.book_id
        JOIN members ON issues.member_id = members.member_id
        JOIN genres ON genres.genre_id = books.genre_id
        WHERE issues.member_id = '$id'");
    $result = $db->get_result();
    echo json_encode($result);
}
// FILTER 

?>