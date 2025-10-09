<?php
include_once('header.php');
include_once('core/database.php');

if($role == 'kiosk'){
    header("Location: members.php");
    exit;
}


?> 

<body>
    <!-- MEMBERS - ADD -->
    <div class="addMemberModal">
         <div id="addBookFormContainer" class="form-container">
            <div class="form-topbar">
                <a href="members.php">
                    <svg id="backBtnAddMemberForm" width="64px" height="64px" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" fill="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <defs> <style>.cls-1{fill:none;stroke:#ffffff;stroke-linecap:round;stroke-linejoin:round;stroke-width:20px;}</style> </defs> <g data-name="Layer 2" id="Layer_2"> <g data-name="E421, Back, buttons, multimedia, play, stop" id="E421_Back_buttons_multimedia_play_stop"> <circle class="cls-1" cx="256" cy="256" r="246"></circle> <line class="cls-1" x1="352.26" x2="170.43" y1="256" y2="256"></line> <polyline class="cls-1" points="223.91 202.52 170.44 256 223.91 309.48"></polyline> </g> </g> </g></svg>
                </a>
                <h3>Add Member</h3>
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
                    <?php
                    $db = new database();
                    $db->sql("SELECT MAX(member_id) AS last_id FROM members");
                    $result = $db->get_result();
                    $lastID = $result[0]['last_id'];
                    $newID = $lastID + 1;
                    ?>
                    <p>Member ID : BHM<span><?php echo $newID; ?></span></p>
                    <p>Join Date : <?php echo date('d/m/Y'); ?></p>
                     <!-- <p>Renew Date : 29/8/2026</p> -->
                    <button id="addMemberBtn">Add</button>
                 </div>
            </div>
        </div>
    </div>
</body>
<?php 
include_once('footer.php');
?>

<script>
    // GET FORM DATA AND SEND
    $("#addMemberBtn").click(function(e){
        e.preventDefault();

        // COLLECT DATA 
        let form_data = {};
        $(".form-fields")
        .find("input, select")
        .each(function () {
            let name = $(this).attr("name");
            let value = $(this).val();
            if (name && value !== "") {
                form_data[name] = value;
            }
        });
        
        console.log(form_data);

        // AJAX SEND
        $.ajax({
            url : "ajax/set_members.php",
            type : "POST", 
            contentType: "application/json",
            dataType : "json",
            data: JSON.stringify({ "set": "add", "value": form_data }),
            success : function(data){
                window.location.href = ('members.php?status=1');
            }, 
            error : function(data){
                console.log(data);
            }
        })
    })
</script>