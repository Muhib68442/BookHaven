<?php 
include_once('header.php');
include_once('core/database.php');

if($role != 'admin'){
    header('Location: index.php');
}

date_default_timezone_set('Asia/Dhaka');
?>
<body class="landing-body">
    <?php include_once('sidebar.php'); ?>
    <div class="content admin-container" >
        <div class="top-bar">
            <h3>Admin Log</h3>
            <p> <?php echo date('h:i A'); ?> | <?php echo date('d/m/Y') ?></p>
            <div class="search">
                <svg width="64px" height="64px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15.7955 15.8111L21 21M18 10.5C18 14.6421 14.6421 18 10.5 18C6.35786 18 3 14.6421 3 10.5C3 6.35786 6.35786 3 10.5 3C14.6421 3 18 6.35786 18 10.5Z" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                <input type="text" placeholder="Search Here">
            </div>

            <div class="sort-table">
                <svg width="64px" height="64px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M13 12H21M13 8H21M13 16H21M6 7V17M6 17L3 14M6 17L9 14" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                <select name="sort" id="sortBookData">
                    <option value="default">Default</option>
                    
                </select>
            </div>

            <a id="refreshLog">Refresh</a>
        </div>

        <div class="log-table">
            <ul id="logList">
                
            </ul>
        </div>
    </div>
</body>
<?php include_once('footer.php'); ?>
<script>
    // GET DATA 
    function fetchData(){
        $.ajax({
            url : "ajax/userMgmt.php",
            type : "POST",
            contentType: "application/json",
            dataType : "json",
            data: JSON.stringify({ "set": "adminLog" }),
            success : function(data){
                console.log(data);
                $("#logList").empty();
                data.forEach(element => {
                    const createdAt = new Date(element.created_at);
                    const time = createdAt.toLocaleTimeString('en-GB');
                    const date = createdAt.toLocaleDateString('en-GB');
                    const timestamp = `${time} - ${date.slice(0, 6)}${date.slice(8, 10)}`;

                    let logText = `>>  (${element.admin_log_id}) ${timestamp} | `;

                    if (element.user_id != null) {
                        logText += `${element.name} (${element.user_id}) => `;
                    }

                    let color = '';

                    // log keys : 
                    // deactivated_member
                    // activated_member
                    // add_member
                    // delete_member
                    // edit_member
                    // issue 
                    // return


                    switch (element.action_type) {
                        case "add_member":
                            logText += `Added Member (${element.member_id})`;
                            color = 'green';
                            break;
                        case "edit_member":
                            logText += `Edited Member (${element.member_id}`;
                            break;
                        case "delete_member":
                            logText += `Deleted Member (${element.member_id})`;
                            color = 'tomato';
                            break;
                        case "activated_member":
                            logText += `Activated Member (${element.member_id})`;
                            color = 'green';
                            break;
                        case "deactivated_member":
                            logText += `Deactivated Member (${element.member_id})`;
                            color = 'tomato';
                            break;
                        case "issue":
                            logText += `Issued (${element.target_id}) Book (${element.book_id}) to Member (${element.member_id})`;
                            break;
                        case "return":
                            logText += `Returned (${element.target_id}) Book (${element.book_id}) from Member (${element.member_id})`;
                            break;
                    }

                    $("#logList").append(`<li style="color:${color}"><a class="logDetailsBtn" href="adminLogDetails.php?id=${element.admin_log_id}">${logText}</a> </li>`).hide().slideDown(200);
                });
                // let log_text = element.created_at +" | "+ element.name+"("+element.user_id+")"+" "+element.action_type+"ed ("+element.target_id+") "+"Book ("+element.book_id+") to "+"Member ("+element.member_id+")";
            },
            error : function(err){
                console.log(err);
            }
        })
    }
    fetchData();

    $("#refreshLog").click(function(){
        fetchData();
    })
</script>