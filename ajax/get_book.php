<?php

header("Content-Type: application/json");
include_once('../core/database.php');

$raw_data = json_decode(file_get_contents("php://input"), true);

// SHOW ALL DATA 
if($raw_data['show'] == "all"){
    $db = new Database();
    $db->sql("SELECT 
  books.*, 
  genres.genre_name, 
  COUNT(issues.issue_id) AS issued_count
FROM books
JOIN genres ON genres.genre_id = books.genre_id
LEFT JOIN issues ON issues.book_id = books.book_id AND issues.status = 'Issued'
GROUP BY books.book_id
ORDER BY books.created_at DESC");
    // $db->select("books", "*", "JOIN genres ON genres.genre_id = books.genre_id");
    $result = $db->get_result();
    $num_books = count($result);
    echo json_encode(array("data" => $result, "num_books" => $num_books));
}
// SEARCH
else if($raw_data['show'] == "search"){
    $search_keyword = $raw_data['value'];
    $db = new database();
    // $db->select("books", "*", null, "title LIKE '%$search_keyword%' OR author LIKE '%$search_keyword%' OR publisher LIKE '%$search_keyword%' OR isbn LIKE '%$search_keyword%' ", null, null);
    $db->sql("
    SELECT 
        books.*, 
        genres.genre_name, 
        COUNT(issues.issue_id) AS issued_count
    FROM books
    JOIN genres ON genres.genre_id = books.genre_id
    LEFT JOIN issues ON issues.book_id = books.book_id AND issues.status = 'Issued'
    WHERE 
        book_name LIKE '%$search_keyword%' OR 
        author LIKE '%$search_keyword%' OR 
        publisher LIKE '%$search_keyword%' OR 
        books.book_id LIKE '%$search_keyword%'
    GROUP BY books.book_id
    ");    
// $db->sql("SELECT * FROM books JOIN genres ON genres.genre_id = books.genre_id WHERE book_name LIKE '%$search_keyword%' OR author LIKE '%$search_keyword%' OR publisher LIKE '%$search_keyword%' OR book_id LIKE '%$search_keyword%' ");
    $result = $db->get_result();
    echo json_encode(array("data" => $result));
}
// SHOW BY ID (DETAILS)
else if($raw_data['show']=="id"){
    $id = $raw_data['value'];
    $db = new database();
    $db->sql("SELECT * FROM books JOIN genres ON genres.genre_id = books.genre_id WHERE book_id = $id ");
    $result = $db->get_result();
    echo json_encode($result);
}
// SORT
else if($raw_data['show'] == "sort"){
    $sort_by = $raw_data['value'];
    $db = new database();
    $order = ($sort_by == "issued_count" || $sort_by == "status") ? "DESC" : "ASC";
    $db->sql("
    SELECT 
        books.*, 
        genres.genre_name, 
        COUNT(issues.issue_id) AS issued_count
    FROM books
    JOIN genres ON genres.genre_id = books.genre_id
    LEFT JOIN issues ON issues.book_id = books.book_id AND issues.status = 'Issued'
    GROUP BY books.book_id
    ORDER BY $sort_by $order
    ");    
// $db->sql("SELECT * FROM books JOIN genres ON genres.genre_id = books.genre_id ORDER BY $sort_by ASC");
    $result = $db->get_result();
    echo json_encode(array("data" => $result));
}
// GENRE 
else if($raw_data['show'] == "genre"){
    $genre_id = $raw_data['value'];
    $db = new database();
    $db->sql("
  SELECT 
    books.*, 
    genres.genre_name, 
    COUNT(issues.issue_id) AS issued_count
  FROM books
  JOIN genres ON genres.genre_id = books.genre_id
  LEFT JOIN issues ON issues.book_id = books.book_id AND issues.status = 'Issued'
  WHERE books.genre_id = $genre_id
  GROUP BY books.book_id
  ORDER BY books.created_at DESC
");
    // $db->sql("SELECT * FROM books JOIN genres ON genres.genre_id = books.genre_id WHERE books.genre_id = $genre_id ");
    $result = $db->get_result();
    $num_books = count($result);
    echo json_encode(array("data" => $result, "num_books" => $num_books));
}

?>