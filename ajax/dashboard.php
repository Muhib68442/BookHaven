<?php 

include_once('../core/database.php');
header('Content-Type: application/json');

$raw_data =  json_decode(file_get_contents("php://input"), true);

if($raw_data['set'] == 'count'){

    $db = new database();
   $stats = [];

    // Total Members
    $db->sql("SELECT COUNT(*) as member_count FROM members");
    $stats['members'] = $db->get_result()[0]['member_count'];

    // Total Books
    $db->sql("SELECT COUNT(*) as book_count FROM books");
    $stats['books'] = $db->get_result()[0]['book_count'];

    // Total Issued
    $db->sql("SELECT COUNT(*) as issue_count FROM issues ");
    $stats['issued'] = $db->get_result()[0]['issue_count'];

    // Total Returned
    $db->sql("SELECT COUNT(*) as return_count FROM issues WHERE status = 'Returned'");
    $stats['returned'] = $db->get_result()[0]['return_count'];

    // Final Output
    echo json_encode($stats);
}
else if($raw_data['set'] == 'quick_issued'){
    $db = new database();
    $db->sql("SELECT * FROM issues 
    JOIN members ON issues.member_id = members.member_id
    JOIN books ON issues.book_id = books.book_id
    WHERE issues.status = 'Issued'
    ORDER BY issues.created_at DESC
    LIMIT 5
    ");
    $result = $db->get_result();
    echo json_encode($result);
}
else if($raw_data['set'] == 'quick_returned'){
    $db = new database();
    $db->sql("SELECT * FROM issues 
    JOIN members ON issues.member_id = members.member_id
    JOIN books ON issues.book_id = books.book_id
    WHERE issues.status = 'Returned'
    ORDER BY issues.created_at DESC
    LIMIT 5");
    $result = $db->get_result();
    echo json_encode($result);
}else if($raw_data['set'] == 'quick_topissued'){
    $db = new database();
    $db->sql(" SELECT issues.book_id, books.book_name, books.author, genres.genre_name, COUNT(*) AS issue_count
    FROM issues
    JOIN books ON issues.book_id = books.book_id
    JOIN genres ON books.genre_id = genres.genre_id
    GROUP BY issues.book_id
    ORDER BY issue_count DESC
    LIMIT 5;
    ");
    $result = $db->get_result();
    echo json_encode($result);
}else if($raw_data['set'] == 'quick_topmember'){
    $db = new database();
    $db->sql("
        SELECT issues.member_id, members.full_name, COUNT(*) AS issue_count
        FROM issues 
        JOIN members ON issues.member_id = members.member_id
        GROUP BY issues.member_id
        ORDER BY issue_count DESC
        LIMIT 5
    ");
    $result = $db->get_result();
    echo json_encode($result);

}
else if($raw_data['set'] == 'quick_topstaff'){
    $db = new database();
    $db->sql("
    SELECT u.name, l.user_id, COUNT(*) AS issue_count
    FROM admin_logs l
    JOIN users u ON l.user_id = u.id
    WHERE l.action_type = 'issue' OR l.action_type = 'return'
    GROUP BY l.user_id
    ORDER BY issue_count DESC
    ");
    $result = $db->get_result();
    echo json_encode($result);
}
else if($raw_data['set'] == 'quick_newarrival'){
    $db = new database();
    $db->sql("SELECT * FROM books JOIN genres ON genres.genre_id = books.genre_id ORDER BY books.created_at DESC LIMIT 5");
    $result = $db->get_result();
    echo json_encode($result);
}
else if($raw_data['set'] == 'quick_search'){
    $term = $raw_data['search'];
    $db = new database();
    $db->sql("
        SELECT * FROM books JOIN genres ON genres.genre_id = books.genre_id WHERE book_name LIKE '%$term%'
    ");
    $result = $db->get_result();
    echo json_encode($result);
}

?>