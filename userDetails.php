<?php 
include_once('header.php');
include_once('core/database.php');

if($role == 'kiosk'){
    header("Location: index.php");
    exit;
}
?>
<body class="landing-body">
    <?php include_once('sidebar.php'); ?>
    <div class="content userDetailsContentContainer">
        <div class="top-bar">
            <a href="userManagement.php">
                <svg width="64px" height="64px" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" fill="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <defs> <style>.cls-1{fill:none;stroke:#ffffff;stroke-linecap:round;stroke-linejoin:round;stroke-width:20px;}</style> </defs> <g data-name="Layer 2" id="Layer_2"> <g data-name="E421, Back, buttons, multimedia, play, stop" id="E421_Back_buttons_multimedia_play_stop"> <circle class="cls-1" cx="256" cy="256" r="246"></circle> <line class="cls-1" x1="352.26" x2="170.43" y1="256" y2="256"></line> <polyline class="cls-1" points="223.91 202.52 170.44 256 223.91 309.48"></polyline> </g> </g> </g></svg>
            </a>
            <h3>User Details | <span id="userName"></span></h3>
        </div>

        <div class="userDetailsContainer">

            <p>User ID : <span id="userID"></span></p>
            <p>Full Name : <span id="userFullName"></span></p>
            <p>Email : <span id="userEmail"></span></p>
            <p>Phone : <span id="userPhone"></span></p>
            <br>
            <p>Join Date : <span id="userJoinDate"></span></p>
            <p>Last Login : <span id="userLastLogin"></span></p>
            <br>
            <p>Status : <span id="userStatus"></span></p>
            <p>Role : <span id="userRole"></span></p>
            <br>
            <?php if ($role == 'admin') : ?>
            <button id="editBtn">Edit</button>
            <button id="statusToggleBtn"></button>
            <button id="deleteBtn">Delete</button>
            <?php endif; ?>

        </div>
        <div class="userDetailsIssuedContainer">
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
            <table>
                <thead>
                    <tr>
                        <th>Issue ID</th>
                        <th>Book (ID)</th>
                        <th>Member (ID)</th>
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
    </div>
</body>




<!-- EDIT USER MODAL -->
<div id="editContainer">
    <div class="addBookModal">
        <div id="addBookFormContainer" class="form-container">
            <div class="form-topbar">
                <div>
                    <a onclick="$('#editContainer').fadeOut(200);">
                        <!-- Back Icon -->
                        <svg width="64px" height="64px" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" fill="#ffffff">
                            <circle class="cls-1" cx="256" cy="256" r="246"></circle>
                            <line class="cls-1" x1="352.26" x2="170.43" y1="256" y2="256"></line>
                            <polyline class="cls-1" points="223.91 202.52 170.44 256 223.91 309.48"></polyline>
                        </svg>
                    </a>
                    <h3>Edit User</h3>
                </div>
            </div>
            <div class="form-body">
                <form action="ajax/userMgmtRaw.php" method="post" class="form-fields" id="editFormFields">
                    <input type="hidden" name="id">
                    <div>
                        <label for="name">Full Name</label>
                        <input type="text" name="name" placeholder="Full Name">
                    </div>

                    <div>
                        <label for="email">Email</label>
                        <input type="email" name="email" placeholder="Email">
                    </div>

                    <div>
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" placeholder="Phone">
                    </div>

                    <div>
                        <label for="role">Role</label>
                        <select name="role" style="width: 200px;">
                            <option value="admin">Admin</option>
                            <option value="staff">Staff</option>
                            <option value="kiosk">Kiosk</option>
                        </select>
                    </div>
                    <div>
                        <label for="old_password">Current Password</label>
                        <input type="password" name="old_password" placeholder="Password" required>
                    </div>
                    
                    <br>
                    <h3>Change Password</h3>

                    <div>
                        <label for="password">Password</label>
                        <input type="password" name="new_password" placeholder="New Password">
                    </div>

                    <div>
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" name="confirm_password" placeholder="Confirm Password" >
                    </div>

                    <button id="updateUser" name="updateUser">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>



<?php include_once('footer.php'); ?>
<script>
    const param = new URLSearchParams(window.location.search);
    const userID = param.get('id');
    let userName = "";
    // GET THE DATA 
    $.ajax({
        url : 'ajax/userMgmt.php',
        type : 'post', 
        dataType : 'json', 
        contentType : 'application/json',
        data : JSON.stringify({'set' : 'showUserDetails', 'id' : userID}),
        success : function(data){
            console.log(data[0]);
            $("#userName").text(data[0].name);
            $("#userID").text(data[0].id);
            $("#userFullName").text(data[0].name);
            $("#userEmail").text(data[0].email);
            $("#userPhone").text(data[0].phone);
            $("#userJoinDate").text(formatDate(data[0].created_at));
            $("#userLastLogin").text(formatDate(data[0].last_login));
            $("#userStatus").text(data[0].status);
            userName = data[0].name;
            data[0].status == "Active" ? $("#userStatus").css("color", "") : $("#userStatus").css("color", "tomato");
            $("#userRole").text(ucfirst(data[0].role));

            $("#statusToggleBtn").text(data[0].status == "Active" ? "Deactivate" : "Activate");
            loadUserIssues();
        }
    })




// TOGGLE STATUS
$(document).on('click', '#statusToggleBtn', function(){

    let sure = confirm("Toggle User Status to "+$(this).text()+" ?");
    if(!sure) return;
    $.ajax({
        url : 'ajax/userMgmt.php',
        type : 'post', 
        dataType : 'json', 
        contentType : 'application/json',
        data : JSON.stringify({'set' : 'toggleUserStatus', 'id' : userID}),
        success : function(data){
            location.reload();
            console.log(data);
        }
    })
})


// DELETE USER 
$(document).on('click', '#deleteBtn', function(){
    let sure = confirm("Delete User");
    if(!sure) return;
    $.ajax({
        url : 'ajax/userMgmt.php',
        type : 'post', 
        dataType : 'json', 
        contentType : 'application/json',
        data : JSON.stringify({'set' : 'deleteUser', 'id' : userID}),
        success : function(data){
            location.reload();
            console.log(data);
        }
    })
})


// EDIT USER MODAL
$(document).on("click", "#editBtn", function(){
    console.log("Edit Button Clicked");
    $("#editContainer").fadeToggle(200);

    // GET DATA 
    $('input[name="id"]').val($("#userID").text());
    $('input[name="name"]').val($("#userName").text());
    $('input[name="email"]').val($("#userEmail").text());
    $('input[name="phone"]').val($("#userPhone").text());
    $('select[name="role"]').val($("#userRole").text().toLowerCase());
})


// GET THE ISSUE/RETURN DATA 
function loadUserIssues(){

    // CHECK IF ADMIN, PREVENT HIM TO SUICIDE
    let loggedIn = "<?php echo $_SESSION['user_role']; ?>";
    let currentUser = $("#userRole").text();

    if(ucfirst(loggedIn) == ucfirst(currentUser)){
        $("#statusToggleBtn").hide();
        $("#deleteBtn").hide();
    }

    $.ajax({
        url : 'ajax/userMgmt.php',
        type : 'post', 
        dataType : 'json', 
        contentType : 'application/json',
        data : JSON.stringify({'set' : 'getUserIssues', 'user_name' : userName}),
        success : function(data){
            console.log(data);
            $("#issueTableBody").empty();
            data.forEach(element => {
                $("#issueTableBody").append(`
                    <tr>
                        <td>${element.issue_id}</td>
                        <td>${element.book_name} (${element.book_id})</td>
                        <td>${element.full_name} (${element.member_id})</td>
                        <td>${element.issue_date}</td>
                        <td>${element.return_date}</td>
                        <td>${element.action_type}</td>
                        <td><a href="issueDetails.php?id=${element.issue_id}">Details</a></td>
                    </tr>
                `)
            })
        },
        error : function(err){
            console.log(err);
        }
    })
}


    // BLOCK: FILTER "Issued"
    $("#filterIssue").on("click", function(){
        $("#issueTableBody tr").each(function(){
            $(this).toggle($(this).find("td:eq(5)").text().trim() === "Issued");
        });
    });

    // BLOCK: FILTER "Returned"
    $("#filterReturn").on("click", function(){
        $("#issueTableBody tr").each(function(){
            $(this).toggle($(this).find("td:eq(5)").text().trim() === "Returned");
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
            const memberId = $(this).find("td:eq(2)").text().toLowerCase();
            const fullName = $(this).find("td:eq(1)").text().toLowerCase();
            const match = memberId.includes(keyword) || fullName.includes(keyword);
            $(this).toggle(match);
        });
    });



function ucfirst(str) {
    return str.charAt(0).toUpperCase() + str.slice(1);
}
function formatDate(dateStr){
    const date = new Date(dateStr);
    const timeOptions = { hour: 'numeric', minute: 'numeric', second: 'numeric', hour12: true };
    const dateOptions = { day: 'numeric', month: 'short', year: 'numeric' };
    return `${date.toLocaleTimeString('en-GB', timeOptions)} - ${date.toLocaleDateString('en-GB', dateOptions)}`;
}
</script>