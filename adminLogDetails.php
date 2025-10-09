<?php 
include_once('header.php');
include_once('core/database.php');

if($role != 'admin'){
    header('Location: index.php');
}

if(!isset($_GET['id'])){
    header('Location: adminLog.php');
}

$db = new database();
$db->sql("SELECT * FROM admin_logs WHERE id = '{$_GET['id']}'");
$data = $db->get_result()[0];


// DYNSQL 
$sql = "SELECT admin_logs.*, users.name as admin_name"; 

// COLUMNS
if ($data['member_id'] != null) {
    $sql .= ", members.status AS member_status, members.full_name, members.phone, members.email, members.status as member_status";
}
if ($data['book_id'] != null) {
    $sql .= ", books.book_name, books.author, books.row_number, books.shelf_number,  genres.genre_name, books.status as book_status";
}
if ($data['action_type'] == 'issue' || $data['action_type'] == 'return') {
    $sql .= ", issues.status AS issue_status, issues.issue_date, issues.return_date, issues.issued_by, issues.returned_by";
}

$sql .= " FROM admin_logs";

// JOINS 
$sql .= " JOIN users ON users.id = admin_logs.user_id";
if ($data['member_id'] != null) {
    $sql .= " JOIN members ON members.member_id = admin_logs.member_id";
}
if ($data['book_id'] != null) {
    $sql .= " JOIN books ON books.book_id = admin_logs.book_id";
    $sql .= " JOIN genres ON genres.genre_id = books.genre_id";
}
if ($data['action_type'] == 'issue' || $data['action_type'] == 'return') {
    $sql .= " JOIN issues ON issues.issue_id = admin_logs.target_id";
}

// FINISHING
$sql .= " WHERE admin_logs.id = '{$_GET['id']}'";
// echo $sql;
$db->sql($sql);
$data = $db->get_result()[0];

?>


<body class="landing-body">
    <?php include_once('sidebar.php'); ?>
    <div class="content logDetails">
        <div class="top-bar">
            <h3>Log Details | Log ID : <?php echo $_GET['id']?></h3>
        </div>

        <div class="logDetailsContainer">
            <div class="logDetails">
                <h3>Log Details</h3>
                <p><b>Log ID :</b> <?php echo $data['id']?></p>
                <p><b>Action Type :</b> <?php echo $data['action_type']?></p>
                <p><b>Description :</b> <?php echo $data['description']?></p>
                <p><b>Target ID :</b> <?php echo $data['target_id']?></p>
                <p><b>Timestamp :</b> <?php echo $data['created_at']?></p>
                <p><b>User ID :</b> <?php echo $data['admin_name']?></p>
            </div>

            <?php if($data['book_id'] != null): ?>
            <div class="bookDetails">
                <h3>Book Details</h3>
                <p><b>Book ID :</b> <?php echo $data['book_id']?></p>
                <p><b>Book Name :</b> <?php echo $data['book_name']?></p>
                <p><b>Author :</b> <?php echo $data['author']?></p>
                <p><b>Genre :</b> <?php echo $data['genre_name']?></p>
                <p><b>Location :</b> <?php echo $data['genre_name']?> Section, Shelf <?php echo $data['row_number']?>, Row <?php echo $data['shelf_number']?></p>
                <p><b>Status :</b> Currently <?php echo $data['book_status']?></p>
                <a href="bookDetails.php?id=<?php echo $data['book_id']?>">View Details</a>
            </div>
            <?php endif; ?>

            <?php if($data['member_id'] != null): ?>
            <div class="memberDetails">
                <h3>Member Details</h3>
                <p><b>Member ID :</b> <?php echo $data['member_id']?></p>
                <p><b>Name :</b> <?php echo $data['full_name']?></p>
                <p><b>Phone :</b> <?php echo $data['phone']?></p>
                <p><b>Email :</b> <?php echo $data['email']?></p>
                <p><b>Status :</b> Currently <?php echo $data['member_status']?></p>
                <a href="memberDetails.php?id=<?php echo $data['member_id']?>">View Details</a>
            </div>
            <?php endif; ?>

            <?php if($data['action_type'] == 'issue' || $data['action_type'] == 'return'): ?>
            <div class="issueDetails">
                <?php if($data['action_type'] == 'issue'): ?>
                <h3>Issue Details</h3>
                <p><b>Issued By :</b> <?php echo $data['issued_by']?></p>
                <?php endif; ?>
                <?php if($data['action_type'] == 'return'): ?>
                <h3>Return Details</h3>
                <p><b>Returned By :</b> <?php echo $data['returned_by']?></p>
                <?php endif; ?>
                <p><b>Issue ID :</b> <?php echo $data['target_id']?></p>
                <p><b>Issue Date :</b> <?php echo $data['issue_date']?></p>
                <p><b>Return Date :</b> <?php echo $data['return_date']?></p>
                <p><b>Status :</b> <?php echo $data['issue_status']?></p>
                <a href="issueDetails.php?id=<?php echo $data['target_id']?>">View Details</a>
            </div>
            <?php endif; ?>
        </div>
    </div>
</body>
<?php include_once('footer.php'); ?>
<script>
    
</script>