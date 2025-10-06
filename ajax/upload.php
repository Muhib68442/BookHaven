<?php
if ($_POST['image'] == 'book') {
    $file = $_FILES['book_cover'];
    $filename = $_POST['filename'];
    $target = "../res/uploads/book_cover/" . $filename;

    if(move_uploaded_file($file['tmp_name'], $target)){
        echo json_encode(["status" => "success", "filename" => $filename]);
    } else {
        echo json_encode(["status" => "error"]);
    }
}
?>