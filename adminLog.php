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
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M15.8 15.8L21 21M18 10.5C18 14.6 14.6 18 10.5 18C6.4 18 3 14.6 3 10.5C3 6.4 6.4 3 10.5 3C14.6 3 18 6.4 18 10.5Z" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                <input type="text" id="searchInput" placeholder="Search Here">
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
                    // update_member
                    // issue 
                    // return
                    // add_book
                    // update_book
                    // delete_book
                    // activated_book
                    // deactivated_book


                    switch (element.action_type) {
                        // MEMBER 
                        case "add_member":
                            logText += `Added Member (${element.member_id})`;
                            color = 'green';
                            break;
                        case "update_member":
                            logText += `Edited Member (${element.member_id})`;
                            color = '#96218cff';
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
                        // BOOK
                        case "add_book":
                            logText += `Added Book (${element.book_id})`;
                            color = 'green';
                            break;
                        case "update_book":
                            logText += `Edited Book (${element.book_id})`;
                            color = '#96218cff';
                            break;
                        case "delete_book":
                            logText += `Deleted Book (${element.book_id})`;
                            color = 'tomato';
                            break;
                        case "activated_book":
                            logText += `Activated Book (${element.book_id})`;
                            color = 'green';
                            break;
                        case "deactivated_book":
                            logText += `Deactivated Book (${element.book_id})`;
                            color = 'tomato';
                            break;
                        // ISSUE / RETURN
                        case "issue":
                            logText += `Issued (${element.target_id}) Book (${element.book_id}) to Member (${element.member_id})`;
                            color = '#0070e7ff';
                            break;
                        case "return":
                            logText += `Returned (${element.target_id}) Book (${element.book_id}) from Member (${element.member_id})`;
                            color = '#ff9800';
                            break;
                    }

                    $("#logList").append(`<li><a class="logDetailsBtn" style="color:${color} !important" href="adminLogDetails.php?id=${element.admin_log_id}">${logText}</a> </li>`).hide().slideDown(200);
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


    ///////////// DOM SEARCH AND SORT  //////////////////////////
const logs = [
  { id: 1, type: "Issue", color: "green", text: "Issued book to member" },
  { id: 2, type: "Return", color: "blue", text: "Returned book from member" },
  { id: 3, type: "Add Member", color: "orange", text: "New member added" },
  { id: 4, type: "Edit Member", color: "purple", text: "Member info updated" },
  { id: 5, type: "Delete Member", color: "red", text: "Member deleted" },
];

// Inject logs into DOM
logs.forEach((log, index) => {
  const $li = $(`
    <li data-type="${log.type.toLowerCase()}">
      <a class="logDetailsBtn" style="color:${log.color} !important" href="adminLogDetails.php?id=${log.id}">
        ${log.text}
      </a>
    </li>
  `);

  $("#logList").append($li).hide().fadeIn(200);
});

// Search filter
$("#searchInput").on("input", function () {
  const keyword = $(this).val().toLowerCase();
  $("#logList li").each(function () {
    const text = $(this).text().toLowerCase();
    $(this).toggle(text.includes(keyword));
  });
});


</script>