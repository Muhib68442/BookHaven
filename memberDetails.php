<?php 
include_once('header.php');
include_once('core/database.php');

if(!isset($_GET['id'])) {
    header('Location: members.php');
    exit();
}

// AUTH
// $allowed_roles = array('admin', 'staff', 'member');
// if (!in_array($_SESSION['role'], $allowed_roles)) {
//     header("Location: ../login.php");
//     exit;
// }



?>

<body class="landing-body">
    <?php include 'sidebar.php'; ?>
    <div class="content">
        <!-- MEMBERS - DETAILS -->
        <div id="memberDetailsContainer">
            <div class="top-barM">
                <a href="members.php">
                    <svg id="backBtnMemberDetails" width="64px" height="64px" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" fill="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <defs> <style>.cls-1{fill:none;stroke:#ffffff;stroke-linecap:round;stroke-linejoin:round;stroke-width:20px;}</style> </defs> <g data-name="Layer 2" id="Layer_2"> <g data-name="E421, Back, buttons, multimedia, play, stop" id="E421_Back_buttons_multimedia_play_stop"> <circle class="cls-1" cx="256" cy="256" r="246"></circle> <line class="cls-1" x1="352.26" x2="170.43" y1="256" y2="256"></line> <polyline class="cls-1" points="223.91 202.52 170.44 256 223.91 309.48"></polyline> </g> </g> </g></svg>
                </a>
                <h3>Member Information</h3>
            </div>
            <div class="member-info-container">
                <div>
                    <img src="res/uploads/members/default2.png" alt="member">
                    
                    <div class="member-info">
                        <p>Name: <span id="memberName"></span></p>
                        <p>Phone: <span id="memberPhone"></span></p>
                        <p>E-mail: <span id="memberEmail"></span></p>
                        <p>Address: <span id="memberAddress"></span></p>
                    </div>
                </div>
    
                <div class="member-mgmt">
                    <div>
                        <button id="editMemberBtn">Edit</button>
                        <button id="toogleMemberStatus">Inactive</button>
                        <button id="deleteMemberBtn">Delete</button>
                    </div>
                    <p>Member ID : <span id="memberID">BHM</span></p>
                    <p>Join Date : <span id="memberJoinDate"></span></p>
                    <p>Status : <span id="memberStatus"></span></p>
                    <!-- <p>Pending Return : <span>n</span></p> -->
                </div>
            </div>
            <div class="member-issue-table">
                <div class="bar">
                    <div class="search">
                        <svg width="64px" height="64px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15.7955 15.8111L21 21M18 10.5C18 14.6421 14.6421 18 10.5 18C6.35786 18 3 14.6421 3 10.5C3 6.35786 6.35786 3 10.5 3C14.6421 3 18 6.35786 18 10.5Z" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                        <input id="issueSearch" type="text" placeholder="Search Here">
                    </div>
    
                    <div>
                        <button id="filterReset">Show All</button>
                        <button id="filterIssue">Issued Only</button>
                        <button id="filterReturn">Returned Only</button>
                    </div>
                </div>
    
                <div class="member-details-table">
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Book Name</th>
                                <th>ISBN/Code</th>
                                <th>Genre</th>
                                <th>Issue Date</th>
                                <th>Return Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="issueTableBody">
                            <tr>
                                <td colspan="8" style="text-align: center; padding: 30px; font-size: 20px; font-weight: 600; color: #000;">No Issue Found</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
<?php include_once('footer.php'); ?>
<script>

    // GET THE URL | GET DATA 
    let params = new URLSearchParams(window.location.search);
    let memberID = params.get("id");
    $.ajax({
        url : 'ajax/get_members.php',
        type : 'POST', 
        dataType : 'json', 
        contentType : 'application/json',
        data : JSON.stringify({"show" : "details", "value" : memberID}),
        success : function(data){
            console.log(data[0]);
            $("#memberName").text(data[0].full_name);
            $("#memberPhone").text(data[0].phone);
            $("#memberEmail").text(data[0].email);
            $("#memberAddress").text(data[0].address);
            $("#memberID").text("BHM"+data[0].member_id);
            let joinDate = new Date(data[0].join_date);
            $("#memberJoinDate").text(`${joinDate.toLocaleString('default', { month: 'long' })} ${joinDate.getDate()}, ${joinDate.getFullYear().toString().substr()}`);

            if(data[0].status == "Active"){
                $("#memberStatus").text("Active");
                $("#toogleMemberStatus").text("Inactive");
            }else{
                $("#memberStatus").text("Inactive").css("color", "tomato");
                $("#memberID").css("color", "tomato");
                $("#toogleMemberStatus").text("Active");
            }
        }, 
        error : function(err){
            console.log(err);
        }
    })

    // DELETE MEMBER
    $("#deleteMemberBtn").click(function(){
        let sure = confirm("Delete Member : "+$("#memberName").text());
        if(!sure) return;
        $.ajax({
            url : 'ajax/set_members.php',
            type : 'POST', 
            dataType : 'json', 
            contentType : 'application/json',
            data : JSON.stringify({"set" : "delete", "value" : memberID}),
            success : function(data){
                window.location.href = "members.php";
            }, 
            error : function(err){
                console.log(err);
            }
        })
    })

    // TOGGLE STATUS
    $("#toogleMemberStatus").click(function(){
        let sure = confirm("Toggle status to "+$(this).text()+" ?");
        if(!sure) return;

        let statusText = $(this).text();
        // alert(statusText);
        $.ajax({
            url : "ajax/set_members.php", 
            type : "POST",
            contentType: "application/json",
            dataType : "json",
            data: JSON.stringify({ "set": "status", "value": statusText, "member_id" : memberID}),
            success : function(data){
                console.log(data);
                let statusTextInverse = (statusText == "Active") ? "Inactive" : "Active";
                $("#toogleMemberStatus").text(statusTextInverse);
                if(statusText == "Active"){
                    $("#memberStatus").text("Active");
                    $("#memberStatus").css("color", "green");
                    $("#memberID").css("color", "green");
                }else{
                    $("#memberStatus").text("Inactive");
                    $("#memberStatus").css("color", "tomato");
                    $("#memberID").css("color", "tomato");
                }
            }, 
            error : function(err){
                console.log(err);
                alert("Failed to toggle status");
            }
        })
    })

    // EDIT 
    $("#editMemberBtn").click(function(){
        window.location.href = "editMember.php?id="+memberID;
    })


    // GET THE ISSUE DETAILS 
    $.ajax({
        url : 'ajax/issue.php',
        type : 'POST',
        contentType : 'application/json',
        dataType : 'json', 
        data : JSON.stringify({'get':'issueDetailsMember', 'value':memberID}),
        success : function(data){
            // console.log(data);
            if(data.length == 0) return;
            $("#issueTableBody").empty();
            let i = 1;
            data.forEach(issue => {
                $("#issueTableBody").append(`
                    <tr>
                        <td>${i++}</td>
                        <td>${issue.book_name}</td>
                        <td>BHB${issue.book_id}</td>
                        <td>${issue.genre_name}</td>
                        <td>${formatDate(issue.issue_date)}</td>
                        <td>${formatDate(issue.return_date)}</td>
                        <td>${issue.issue_status}</td>
                        <td><a href="issueDetails.php?id=${issue.issue_id}">Details</a></td>
                    </tr>
                `).hide().fadeIn(200);
            })
            
        }, 
        error : function(err){
            console.log(err);
        }
    })


    // BLOCK: FILTER "Issued"
    $("#filterIssue").on("click", function(){
        $("#issueTableBody tr").each(function(){
            $(this).toggle($(this).find("td:eq(6)").text().trim() === "Issued");
        });
    });

    // BLOCK: FILTER "Returned"
    $("#filterReturn").on("click", function(){
        $("#issueTableBody tr").each(function(){
            $(this).toggle($(this).find("td:eq(6)").text().trim() === "Returned");
        });
    });

    // BLOCK: RESET FILTER
    $("#filterReset").on("click", function(){
        $("#issueTableBody tr").show();
    });


    // BLOCK: LIVE SEARCH FILTER (NO TRANSITION)
    $("#issueSearch").on("input", function(){
        const keyword = $(this).val().toLowerCase();
        $("#issueTableBody tr").each(function(){
            const memberId = $(this).find("td:eq(1)").text().toLowerCase();
            const fullName = $(this).find("td:eq(2)").text().toLowerCase();
            const match = memberId.includes(keyword) || fullName.includes(keyword);
            $(this).toggle(match);
        });
    });

function formatDate(dateStr){
    const date = new Date(dateStr);
    const options = { day: 'numeric', month: 'short', year: 'numeric' };
    return date.toLocaleDateString('en-GB', options);
}
</script>