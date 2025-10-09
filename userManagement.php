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
    <div class="content">
        <div class="currentlyLoggedIn">
            <h1>Currently Logged In as</h1>
            <h3><?php echo $_SESSION['user_name']; ?> [<?php echo ucfirst($_SESSION['user_role']); ?>] (UID : <?php echo $_SESSION['user_id']; ?>)</h3>
        </div>
        <div class="userMgmtContainer">
            <div>
                <h1>User Management</h1>
                <?php if($role == 'admin') : ?>
                <a href="#" id="addUserBtn">Add User</a>
                <?php endif; ?>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>UID</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Last Login</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody id="userTableBody">
                    <!-- <tr>
                        <td>1</td>
                        <td>John Doe</td>
                        <td>gXb0p@example.com</td>
                        <td>6:00PM, 7/10/2025</td>
                        <td>Admin</td>
                        <td>
                            <button id="editBtn">Edit</button>
                        </td>
                    </tr> -->
                </tbody>
            </table>
        </div>
    </div>
</body>



<!-- ADD USER MODAL -->
<div id="addContainer">
    <div class="addBookModal">
        <div id="addBookFormContainer" class="form-container">
            <div class="form-topbar">
                <a onclick="$('#addContainer').fadeOut(200);">
                    <svg width="64px" height="64px" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" fill="#ffffff">
                        <circle class="cls-1" cx="256" cy="256" r="246"></circle>
                        <line class="cls-1" x1="352.26" x2="170.43" y1="256" y2="256"></line>
                        <polyline class="cls-1" points="223.91 202.52 170.44 256 223.91 309.48"></polyline>
                    </svg>
                </a>
                <h3>Add User</h3>
            </div>
            <div class="form-body">
                <form action="ajax/userMgmtRaw.php" method="post" class="form-fields" id="addFormFields">
                    
                        <input type="text" name="name" placeholder="Full Name" required>
                        <input type="email" name="email" placeholder="Email" required>
                        <input type="text" name="phone" placeholder="Phone">
                        <br>
                        <input type="password" name="password" placeholder="Password" required>
                        <input type="password" name="confirm_password" placeholder="Confirm Password" required>
                        <br>
                        <select name="role" required>
                            <option value="admin">Admin</option>   
                            <option value="staff">Staff</option>
                            <option value="kiosk">Kiosk</option>
                        </select>
                        <button type="submit" name="addUser" id="insertUserBtn">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include_once('footer.php'); ?>

<script>

// ADD USER MODAL
$("#addUserBtn").click(function(){
    console.log("Add User Button Clicked");
    $("#addContainer").fadeToggle(200);
})



// SHOW ALL USERS
$.ajax({
    url : 'ajax/userMgmt.php',
    type : 'post', 
    dataType : 'json', 
    contentType : 'application/json',
    data : JSON.stringify({'set' : 'showAllUsers'}),
    success : function(data){
        data.forEach(element => {
            $("#userTableBody").append(`
                <tr>
                    <td>${element.id}</td>
                    <td>${element.name}</td>
                    <td>${element.email}</td>
                    <td>${element.phone}</td>
                    <td>${(element.last_login == null ? 'New User' : element.last_login)}</td>
                    <td>${ucfirst(element.role)}</td>
                    <td style="${element.status == 'Inactive' ? 'color : tomato' : ''}" >${element.status}</td>
                    <td>
                        <button id="detailsBtn">Details</button>
                    </td>
                </tr>
            `)
        })
    }
})


// DETAILS BTN
$(document).on('click', '#detailsBtn', function(){
    let id = $(this).closest('tr').find('td').eq(0).text().trim();
    window.location.href = "userDetails.php?id=" + id;
});

function ucfirst(str) {
    return str.charAt(0).toUpperCase() + str.slice(1);
}

</script>