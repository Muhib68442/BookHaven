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
$db->sql("SELECT *, 
    members.status as member_status, 
    issues.status as issue_status 
    FROM admin_logs 
    JOIN users ON users.id = admin_logs.user_id
    JOIN members ON member.member_id = admin_logs.member_id
    JOIN books ON books.book_id = admin_logs.book_id
    JOIN genres ON genres.genre_id = books.genre_id
    WHERE id = ".$_GET['id']);
$data = $db->get_result();

?>
<body class="landing-body">
    <?php include_once('sidebar.php'); ?>
    <div class="content logDetails">
        <div class="top-bar">
            <h3>Log Details | Log ID : <?php echo $_GET['id']?></h3>
        </div>

        <div class="logDetailsContainer">
            <div class="bookDetails">
                <h3>Book Details</h3>
                <p><b>Book ID :</b> <?php echo $data['book_id']?></p>
                <p><b>Author :</b> <?php echo $data['author']?></p>
                <p><b>Genre :</b> <?php echo $data['genre_name']?></p>
                <a href="bookDetails.php?id=<?php echo $data['book_id']?>">View Details</a>
            </div>

            <div class="memberDetails">
                <h3>Member Details</h3>
                <p><b>Member ID :</b> <?php echo $data['member_id']?></p>
                <p><b>Name :</b> <?php echo $data['full_name']?></p>
                <p><b>Phone :</b> <?php echo $data['phone']?></p>
                <p><b>Email :</b> <?php echo $data['email']?></p>
                <p><b>Status :</b> <?php echo $data['member_status']?></p>
                <a href="memberDetails.php?id=<?php echo $data['member_id']?>">View Details</a>
            </div>


        </div>
    </div>
</body>
<?php include_once('footer.php'); ?>
<script>
    
</script>