<?php
include_once('header.php');
include_once('core/database.php');
?> 
<body>
    <!-- MEMBERS - EDIT -->
    <div class="addMemberModal">
         <div id="addBookFormContainer" class="form-container">
            <div class="form-topbar">
                <a href="memberDetails.php?id=<?php echo $_GET['id']; ?>">
                    <svg id="backBtnAddMemberForm" width="64px" height="64px" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" fill="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <defs> <style>.cls-1{fill:none;stroke:#ffffff;stroke-linecap:round;stroke-linejoin:round;stroke-width:20px;}</style> </defs> <g data-name="Layer 2" id="Layer_2"> <g data-name="E421, Back, buttons, multimedia, play, stop" id="E421_Back_buttons_multimedia_play_stop"> <circle class="cls-1" cx="256" cy="256" r="246"></circle> <line class="cls-1" x1="352.26" x2="170.43" y1="256" y2="256"></line> <polyline class="cls-1" points="223.91 202.52 170.44 256 223.91 309.48"></polyline> </g> </g> </g></svg>
                </a>
                <h3>Edit Member</h3>
            </div>
            <div class="form-body">
                 <div class="uploadPreview">
                     <h3>Upload Image</h3>
                     <label id="bookCoverUploadBtn" for="bookCoverUpload">Select</label>
                     <input type="file" id="bookCoverUpload">
                 </div>
                 <div class="form-fields">
                    <input type="text" name="full_name" placeholder="Full Name" required>
                    <input type="email" name="email" placeholder="Email">
                    <input type="number" name="phone" placeholder="Phone" required>
                    <input type="text" name="address" placeholder="Address" required>
    
                    <select name="status" id="status">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                    
                    <p>Member ID : BHM<span><?php echo $_GET['id']; ?></span></p>
                    <p>Join Date : <span id="memberJoinDate"></span></p>
                     <!-- <p>Renew Date : 29/8/2026</p> -->
                    <button id="updateMemberBtn">Update</button>
                 </div>
            </div>
        </div>
    </div>
</body>
<?php 
include_once('footer.php');
?>

<script>
    // GET DATA FOR THE ID 
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
            $("#addBookFormContainer input[name='full_name']").val(data[0].full_name);
            $("#addBookFormContainer input[name='email']").val(data[0].email);
            $("#addBookFormContainer input[name='phone']").val(data[0].phone);
            $("#addBookFormContainer input[name='address']").val(data[0].address);
            $("#addBookFormContainer select[name='status']").val(data[0].status);
            let joinDate = new Date(data[0].join_date);
            $("#addBookFormContainer #memberJoinDate").text(`${joinDate.toLocaleString('default', { month: 'long' })} ${joinDate.getDate()}, ${joinDate.getFullYear()}`);
        }, 
        error : function(err){
            console.log(err);
        }
    })

    $("#updateMemberBtn").click(function(){
        let sure = confirm("Update Member : "+$("#addBookFormContainer input[name='full_name']").val());
        if(!sure) return;
        let formData = {
            full_name: $("#addBookFormContainer input[name='full_name']").val(),
            email: $("#addBookFormContainer input[name='email']").val(),
            phone: $("#addBookFormContainer input[name='phone']").val(),
            address: $("#addBookFormContainer input[name='address']").val(),
            status: $("#addBookFormContainer select[name='status']").val()
        };
        
        $.ajax({
            url : 'ajax/set_members.php',
            type : 'POST', 
            dataType : 'json', 
            contentType : 'application/json',
            data : JSON.stringify({"set" : "update", "value" : formData, "member_id" : memberID}),
            success : function(data){
                window.location.href = "members.php";
            }, 
            error : function(err){
                console.log(err);
                alert("Failed to update member");
            }
        })
    })
    
</script>