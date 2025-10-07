<?php 
include_once('header.php');
include_once('core/database.php'); 
?>

<body class="landing-body">
    <?php include_once('sidebar.php'); ?>
    <div class="content issue-details-content" >
        <div class="top-bar">
            <a href="issue.php">
                <svg id="backBtnAddMemberForm" width="64px" height="64px" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" fill="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <defs> <style>.cls-1{fill:none;stroke:#ffffff;stroke-linecap:round;stroke-linejoin:round;stroke-width:20px;}</style> </defs> <g data-name="Layer 2" id="Layer_2"> <g data-name="E421, Back, buttons, multimedia, play, stop" id="E421_Back_buttons_multimedia_play_stop"> <circle class="cls-1" cx="256" cy="256" r="246"></circle> <line class="cls-1" x1="352.26" x2="170.43" y1="256" y2="256"></line> <polyline class="cls-1" points="223.91 202.52 170.44 256 223.91 309.48"></polyline> </g> </g> </g></svg>
                Issue Details
            </a>
            <p>Issue ID : BHI<span class="issueID"></span></p>
        </div>

        <div class="issue-details-container">
            <div class="issue-info">
                <h3>Issue Information</h3>
                <p>Issue ID : BHI<span class="issueID"></span></p>
                <p>Issue Date : <span class="issueDate"></span></p>
                <p>Return Date : <span class="returnDate"></span></p>
                <p>Issued By : <span class="issuedBy"></span></p>
                <p>Returned By : <span class="returnedBy"></span></p>
                <p>Current Status : <span class="status"></span></p>
                <br>
                <a id="returnBookBtn">Return Book</a>

            </div>
            <div class="book-info">
                <img src="res/uploads/book_cover/default.jpg" class="bookCover" onerror="this.onerror=null; this.src='res/uploads/book_cover/default.jpg';" alt="default">
                <h3>Book Information</h3>
                <p>Book Name : <span class="bookName"></span></p>
                <p>Author : <span class="bookAuthor"></span></p>
                <p>Genre : <span class="bookGenre"></span></p>
                <p>ISBN/Code : BHB<span class="bookID"></span> </p>
                <a id="bookDetailsLink">Book Details</a>
            </div>
            <div class="member-info">
                <img src="res/uploads/members/default2.png" alt="">
                <h3>Member Information</h3>
                <p>Name : <span class="memberName"></span></p>
                <p>Member ID : BHM<span class="memberID"></span></p>
                <p>Phone : <span class="memberPhone"></span></p>
                <p>Email : <span class="memberEmail"></span></p>
                <a id="memberDetailsLink">Member Details</a>
            </div>
        </div>
    </div>
</body>

<?php include_once('footer.php'); ?>
<script>

const param = new URLSearchParams(window.location.search);
const issueID = param.get('id');
$(".issueID").text(issueID);

// GET DATA 
$.ajax({
    url : 'ajax/issue.php',
    type : 'POST',
    contentType : 'application/json',
    dataType : 'json', 
    data : JSON.stringify({'get':'issueDetails', 'value':issueID}),
    success : function(data){
        console.log(data[0]);
        $(".issueDate").text(formatDate(data[0].issue_date));
        $(".returnDate").text(formatDate(data[0].return_date));
        $(".issuedBy").text(data[0].issued_by);
        $(".returnedBy").text(data[0].returned_by);
        $(".status").text(data[0].issue_status);
        $(".bookName").text(data[0].book_name);
        $(".bookCover").attr('src','res/uploads/book_cover/'+data[0].book_cover);
        $(".bookAuthor").text(data[0].author);
        $(".bookGenre").text(data[0].genre_name);
        $(".bookID").text(data[0].book_id);
        $(".memberName").text(data[0].full_name);
        $(".memberID").text(data[0].member_id);
        $(".memberPhone").text(data[0].phone);
        $(".memberEmail").text(data[0].email);

        $("#memberDetailsLink").attr("href", "memberDetails.php?id="+data[0].member_id);
        $("#bookDetailsLink").attr("href", "bookDetails.php?id="+data[0].book_id);

        // IF BOOK IS ALREADY RETURNED 
        if(data[0].issue_status == "Returned"){
            $("#returnBookBtn").hide();
        }



    },
    error : function(err){
        console.log(err);
    }
})

// RETURN BOOK 
$("#returnBookBtn").click(function(){
    let sure = confirm("Return Book : "+$(".bookName").text());
    if(!sure) return;
    let returnedBy = "<?php echo $_SESSION['user_name']?>";
    $.ajax({
        url : "ajax/return.php",
        method : "POST",
        dataType : "json",
        contentType : 'application/json',
        data : JSON.stringify({"get" : "returnBook", "issueID" : issueID, "returnedBy" : returnedBy, "bookID" : $(".bookID").text()}),
        success : function(data){
            console.log(data);
            Toastify({
                text: "Book returned successfully!",
                duration: 3000,
                gravity: "top",
                position: "center",
                stopOnFocus: true
            }).showToast();
            $("#returnBookBtn").slideUp(200);
            $(".returnedBy").text(returnedBy);

            // window.location.href = "issueDetails.php?id="+issueID;
        },
        error : function(err){
            console.log(err);
        }
    })
})



function formatDate(dateStr){
    const date = new Date(dateStr);
    const options = { day: 'numeric', month: 'short', year: 'numeric' };
    return date.toLocaleDateString('en-GB', options);
}



</script>