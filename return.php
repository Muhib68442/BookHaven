<?php include_once('header.php'); ?>

<body class="landing-body">
    <?php include_once('sidebar.php'); ?>

    <div class="content">
        <!-- CONTENT - RETURN -->
        <section id="return">
            <div class="return-search-container">
                <div class="bar">
                    <h3>Return Book</h3>
                </div>
                <div class="body">
                    <div>
                        <p>Issue ID</p>
                        <input type="text" id="issueIDSearch" placeholder="BHI-----" required>
                    </div>
                    <div>
                        <p>Member ID</p>
                        <input type="text" id="memberIDSearch" placeholder="BHM-----" required>
                    </div>
                    <div>
                        <p>Book ID</p>
                        <input type="text" id="bookIDSearch" placeholder="BHB-----" required>
                    </div>
                    <button id="returnSearch">Search</button>
                </div>
            </div>

            <div class="return-summary-container">
                <div class="bar">
                    <h3>Return Summary</h3>
                </div>
                <div class="body">
                    <div>
                        <h3>Book Name</h3>
                        <p id="returnBookName"></p>
                    </div>
                    <div>
                        <h3>Author</h3>
                        <p id="returnBookAuthor"></p>
                    </div>
                    <div>
                        <h3>Member Name</h3>
                        <p id="returnMemberName"></p>
                    </div>
                    <div>
                        <h3>Issue Date</h3>
                        <p id="returnIssueDate"></p>
                    </div>
                    <button id="returnBookBtn">Return</button>
                </div>
            </div>
        </section> <!-- RETURN ENDS -->
    </div>
</body>

<?php include_once('footer.php'); ?>

<script>

    // RETURN SEARCH
    var issueID = "";
    var bookID = "";
    $("#returnSearch").click(function(){
        let searchIssue = $("#issueIDSearch").val();
        let searchMember = $("#memberIDSearch").val();
        let searchBook = $("#bookIDSearch").val();
        searchIssue = searchIssue.replace(/^BHI/, '');
        searchMember = searchMember.replace(/^BHM/, '');
        searchBook = searchBook.replace(/^BHB/, '');
        if(searchIssue == "" || searchMember == "" || searchBook == "") return alert("Please fill all details");
        console.log(searchIssue, searchMember, searchBook);

        $.ajax({
            url : "ajax/return.php",
            method : "POST",
            dataType : "json",
            contentType : 'application/json',
            data : JSON.stringify({"get" : "searchReturn", "issue" : searchIssue, "member" : searchMember, "book" : searchBook}),
            success : function(data){
                console.log(data);
                if(data.length == 0) return alert("No Record Found");
                issueID = data[0].issue_id;
                bookID = data[0].book_id;
                $(".return-summary-container").slideDown(200);
                $("#returnBookName").text(data[0].book_name+"("+data[0].book_id+")");
                $("#returnBookAuthor").text(data[0].author);
                $("#returnMemberName").text(data[0].full_name +"("+data[0].member_id+")");
                $("#returnIssueDate").text(data[0].issue_date);
            },
            error : function(err){
                console.log(err);
            }
        })
    })


    // RETURN SET 
    $("#returnBookBtn").click(function(){
        let sure = confirm("Return Book : "+$("#returnBookName").text());
        if(!sure) return;
        $.ajax({
            url : "ajax/return.php",
            method : "POST",
            dataType : "json",
            contentType : 'application/json',
            data : JSON.stringify({"get" : "returnBook", "issueID" : issueID, "bookID" : bookID}),
            success : function(data){
                console.log(data);
                alert(data.message);
                window.location.href = "return.php";
            },
            error : function(err){
                console.log(err);
            }
        })
    })
</script>