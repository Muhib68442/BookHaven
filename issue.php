<?php include_once('header.php'); ?>
<?php include_once('core/database.php'); ?>

<body class="landing-body">
    <?php include_once('sidebar.php'); ?>
    
    <div class="content">
        
        <!-- CONTENT - ISSUS -->
        <section id="issue">
            <div class="top-bar">
                <h3>Issue Book</h3>
                <p>Total Issued Books : <span id="totalIssueCount">147</span></p>
            </div>
    
            <!-- ISSUE PROCESS CONTAINER -->
            <div class="issue-container">
                <div class="btn-bar">
                    <div>
                        <button id="selectBookBtn">Select Book</button>
                        <button id="selectMemberBtn">Select Member</button>
                        <button id="selectSummaryBtn">Summary</button>
                    </div>
                    <button id="allIssuesBtn">View All Issues</button>
                </div>

                
                <div class="dynamic-table">
                    <div class="issue-book-table">
                        <div class="searchbar">
                            <svg width="64px" height="64px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15.7955 15.8111L21 21M18 10.5C18 14.6421 14.6421 18 10.5 18C6.35786 18 3 14.6421 3 10.5C3 6.35786 6.35786 3 10.5 3C14.6421 3 18 6.35786 18 10.5Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                            <input id="issueBookSearch" type="text" placeholder="Search">
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <th>Book Name</th>
                                    <th>ISBN/Code</th>
                                    <th>Genre</th>
                                    <th>Author</th>
                                    <th>Stock</th>
                                    <th>Select</th>
                                </tr>
                            </thead>
                            <tbody id="issueBookTableBody">
                                <tr>
                                    <td colspan="6" style="text-align: center; padding: 30px; font-size: 20px; font-weight: 600; color: #000;">Search and select a book</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                   
                    <div class="issue-member-table">
                        <div class="searchbar">
                            <svg width="64px" height="64px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15.7955 15.8111L21 21M18 10.5C18 14.6421 14.6421 18 10.5 18C6.35786 18 3 14.6421 3 10.5C3 6.35786 6.35786 3 10.5 3C14.6421 3 18 6.35786 18 10.5Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                            <input id="issueMemberSearch" type="text" placeholder="Search">
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <th>Member Name</th>
                                    <th>Member ID</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <!-- <th>Status</th> -->
                                    <th>Select</th>
                                </tr>
                            </thead>
                            <tbody id="issueMemberTableBody">
                                <tr>
                                    <td colspan="6" style="text-align: center; padding: 30px; font-size: 20px; font-weight: 600; color: #000;">Search and select a Member</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    
                    <div class="issue-summary">
                        <div>
                            <h3>Book Info</h3>
                            <p id="summaryBookName"></p>
                            <p>by <span id="summaryBookAuthor"></span></p>
                            <p>Genre : <span id="summaryBookGenre"></span></p>
                            <p>ISBN/Code : BHB<span id="summaryBookID"></span> </p>
                        </div>
                        
                        <div>
                            <h3>Member Info</h3>
                            <p>Name : <span id="summaryMemberName"></span></p>
                            <p>Member ID : BHM<span id="summaryMemberID"></span></p>
                            <p>Phone : <span id="summaryMemberPhone"></span></p>
                            <p>Email : <span id="summaryMemberEmail"></span></p>
                        </div>
                        
                        <div>
                            <h3>Issue Info</h3>
                            <?php $db = new database();
                                $db->sql("SELECT issue_id FROM issues ORDER BY issue_id DESC LIMIT 1");
                                $result = $db->get_result();
                                $lastIssueID = isset($result[0]['issue_id']) ? $result[0]['issue_id'] : 0;
                                $newIssueID = $lastIssueID + 1;
                            ?>
                            <p>Issue ID : BHI<?php echo $newIssueID; ?></p>
                            <p>Issue Date : <?php echo date('d/m/Y'); ?></p>
                            <p>Return Date : <?php echo date('d/m/Y', strtotime('+6 month')); ?></p>
                            <button id="issueBook">Issue</button>
                        </div>
                        
                    </div>
                </div>
            </div>

            <!-- VIEW ALL ISSUE CONTAINER -->
            <div class="issue-containe" id="allIssues">
                <div class="searchbar">
                    <svg width="64px" height="64px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15.7955 15.8111L21 21M18 10.5C18 14.6421 14.6421 18 10.5 18C6.35786 18 3 14.6421 3 10.5C3 6.35786 6.35786 3 10.5 3C14.6421 3 18 6.35786 18 10.5Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                    <input id="allIssueSearch" type="text" placeholder="Search">
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Issue ID</th>
                            <th>Member Name (ID)</th>
                            <th>Book Name (ID)</th>
                            <th>Issue Date</th>
                            <th>Return Date</th>
                            <th>Status</th>
                            <th>Details</th>
                        </tr>
                    </thead>
                    <tbody id="issueTableBody">
                        <tr>
                            <td colspan="8" style="text-align: center; padding: 30px; font-size: 20px; font-weight: 600; color: #000;">No Issue Found</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section> <!-- ISSUS ENDS -->
    </div>
    
</body>
    

<?php include_once('footer.php'); ?>


<script>

    // BOOK SEARCH 
    $("#issueBookSearch").on("input", function(){
        let search = $(this).val();
        $.ajax({
            url : "ajax/issue.php",
            type : "POST", 
            contentType: "application/json",
            dataType : "json",
            data : JSON.stringify({"get" : "searchBook", "value" : search}),
            success : function(data){
                // APPEND TO bookTable
                $("#issueBookTableBody").empty();
                $.each(data.data, function(index, value){
                    if(value.status == "Inactive") return;
                    
                    $("#issueBookTableBody").append(`
                        <tr>
                            <td>${value.book_name}</td>
                            <td>BHB${value.book_id}</td>
                            <td>${value.genre_name}</td>
                            <td>${value.author}</td>
                            <td>${value.stock}</td>
                            <td><button id="selectBook">Select</button></td>
                        </tr>
                    `).hide().fadeIn(200);
                })

            },
            error : function(err){
                console.log(err);
            }
        });
    })

    // MEMBER SEARCH 
    $("#issueMemberSearch").on("input", function(){
        let search = $(this).val();
        if($(".selectedBtn").text() != "Select Member") return;
        $.ajax({
            url : "ajax/issue.php",
            type : "POST",
            contentType: "application/json",
            dataType : "json",
            data : JSON.stringify({"get" : "searchMember", "value" : search}),
            success : function(data){
                // APPEND TO memberTable
                $("#issueMemberTableBody").empty();
                $.each(data.data, function(index, value){
                    if(value.status == "Inactive") return;
                    $("#issueMemberTableBody").append(`
                        <tr>
                            <td>${value.full_name}</td>
                            <td>BHM${value.member_id}</td>
                            <td>${value.phone}</td>
                            <td>${value.email}</td>
                            
                            <td><button id="selectMember">Select</button></td>
                        </tr>
                    `).hide().fadeIn(200);
                })
            },
            error : function(err){
                console.log(err);
            }
        });
    })




    // SELECT BOOK BUTTON 
    var selectedBook = null;
    var selectedMember = null;

    function scan(){
        // alert(selectedBook);
        // if my books is selected, then show memebr list 
        if(selectedBook != null){
            $(".issue-book-table").slideUp(200);
            $(".issue-member-table").slideDown(200);
            $(".selectedBtn").removeClass("selectedBtn");
            $("#selectMemberBtn").addClass("selectedBtn");
        }
        if(selectedMember != null){
            $(".issue-member-table").slideUp(200);
            $(".issue-summary").slideDown(200).css("display", "flex");
            $(".selectedBtn").removeClass("selectedBtn");
            $("#selectSummaryBtn").addClass("selectedBtn");
        }
        if(selectedBook != null && selectedMember != null){
            summary();
            // console.log("Summary Triggered");
        }
    }

    const param = new URLSearchParams(window.location.search);
    const selectedBookforIssue = param.get('selectedBook');

    if(selectedBookforIssue != null){
        selectedBook = selectedBookforIssue;

        scan();

        $("#selectBookBtn").removeClass("selectedBtn");
        $("#selectMemberBtn").addClass("selectedBtn");
        $("#selectBookBtn").hide();
    }







    //////////////////////////////////////////////////////////////////////////////
    // SELECT BOOK
    $(document).on("click", "#selectBook", function(){
        let bookID = $(this).closest("tr").find("td").eq(1).text().replace("BHB", "");
        console.log("Selected Book ID : "+bookID);
        selectedBook = bookID;
        scan();
        $(".searchbar input").val("");
    })

    // SELECT MEMBER
    $(document).on("click", "#selectMember", function(){
        let memberID = $(this).closest("tr").find("td").eq(1).text().replace("BHM", "");
        console.log("Selected Member ID : "+memberID);
        selectedMember = memberID;
        scan(); 
        $(".searchbar input").val("");
    })

    // GET THE SUMMARY 
    function summary(){
        // GET THE SELECTED BOOK INFO 
        $.ajax({
            url : "ajax/get_book.php",
            type : "POST", 
            contentType: "application/json",
            dataType : "json",
            data : JSON.stringify({"show" : "id", "value" : selectedBook}),
            success : function(data){
                console.log(data);
                $("#summaryBookName").text(data[0].book_name);
                $("#summaryBookAuthor").text(data[0].author);
                $("#summaryBookGenre").text(data[0].genre_name);
                $("#summaryBookID").text(data[0].book_id);
                // $("#summaryStatus").text(data[0].status);
            },
            error : function(err){
                console.log(err);
            }
        })

        // GET THE SELECTED MEMBER INFO 
        $.ajax({
            url : "ajax/get_members.php",
            type : "POST", 
            contentType: "application/json",
            dataType : "json",
            data : JSON.stringify({"show" : "details", "value" : selectedMember}),
            success : function(data){
                console.log(data);
                $("#summaryMemberName").text(data[0].full_name);
                $("#summaryMemberID").text(data[0].member_id);
                $("#summaryMemberPhone").text(data[0].phone);
                $("#summaryMemberEmail").text(data[0].email);
                // $("#summaryMemberStatus").text(data[0].status);
            },
            error : function(err){
                console.log(err);
            }
        })
    }
    // summary();

    // ISSUE THE BOOK 
    $("#issueBook").click(function(){
        let sure = confirm("Issue Book : "+$("#summaryBookName").text()+" to "+$("#summaryMemberName").text());
        if(!sure) return;
        let issuedBy = "<?php echo $_SESSION['user_name']; ?>";
        $.ajax({
            url : "ajax/issue.php",
            type : "POST",
            contentType: "application/json",
            dataType : "json",
            data : JSON.stringify({
                "get" : "new_issue",
                "book_id" : selectedBook, 
                "member_id" : selectedMember,
                "issued_by" : issuedBy
            }),
            success : function(data){
                if(data.status){
                    alert(data.message);
                    location.reload();  
                }
            },
            error : function(err){
                console.log(err);
            }
        })
    })
    //////////////////////////////////////////////////////////////////////////////
    
    
    
    
    
    
    
    
    
    
    
    //////////////////////////////////////////////////////////////////////////////
    // SEE ALL ISSUES 
    $("#allIssuesBtn").click(function(){
        $(".dynamic-table, #allIssues").slideToggle(200);
        if($("#allIssues").is(":visible")){
            getAllIssue();
            $('.selectedBtn').removeClass("selectedBtn");
            $(this).addClass("selectedBtn");
        }else{
            $(this).removeClass("selectedBtn");
        }
    })

    // GET ALL ISSUE 
    function getAllIssue(){
        $.ajax({
            url : 'ajax/issue.php',
            type : 'POST',
            contentType : 'application/json',
            dataType : 'json', 
            data : JSON.stringify({'get':'allIssues'}),
            success : function(data){
                console.log(data);
                $("#issueTableBody").empty();
                $.each(data.data, function(index, value){
                    $("#issueTableBody").append(`
                        <tr>
                            <td>BHI${value.issue_id}</td>
                            <td>${value.full_name} (BHM${value.member_id})</td>
                            <td>${value.book_name} (BHB${value.book_id})</td>
                            <td>${value.issue_date}</td>
                            <td>${value.return_date}</td>
                            <td>${value.issue_status}</td>
                            <td><button id="selectIssue">Details</button></td>
                        </tr>
                    `).hide().fadeIn(200);
                })
                $("#totalIssueCount").text(data.num_issues);
            },
            error : function(err){
                console.log(err);
            }
        })
    }

    // SEARCH ISSUE 
    $("#allIssueSearch").on("input", function(){
        let search = $(this).val();
        // console.log(search);
        $.ajax({
            url : "ajax/issue.php",
            type : "POST", 
            contentType: "application/json",
            dataType : "json",
            data : JSON.stringify({"get" : "searchIssue", "value" : search}),
            success : function(data){
                // APPEND TO issueTable
                $("#issueTableBody").empty();
                $.each(data.data, function(index, value){
                    $("#issueTableBody").append(`
                        <tr>
                            <td>BHI${value.issue_id}</td>
                            <td>${value.full_name} (BHM${value.member_id})</td>
                            <td>${value.book_name} (BHB${value.book_id})</td>
                            <td>${value.issue_date}</td>
                            <td>${value.return_date}</td>
                            <td>${value.issue_status}</td>
                            <td><button id="selectIssue">Details</button></td>
                        </tr>
                    `).hide().fadeIn(200);
                })
                // $("#totalIssueCount").text(data.num_issues);
            },
            error : function(err){
                alert(err.responseText);
            }
        })
    })

    // SEND ISSUE ID TO ISSUE DETAILS
    $(document).on('click', '#selectIssue', function(){
        let issueID = $(this).closest("tr").find("td").eq(0).text().replace("BHI", "");
        console.log("Selected Issue ID : "+issueID);
        window.location.href = "issueDetails.php?id="+issueID;
    })
    //////////////////////////////////////////////////////////////////////////////


    // IF SELECTED FROM OTHER 

    

</script>