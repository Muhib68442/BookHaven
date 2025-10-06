$(document).ready(function(){
    // jQuery Starts..............................................................


    var url = window.location.href;
    var page = url.split("/").pop();
    
    switch(page){
        case "dashboard.php":
            $("#dashboardBtn").addClass("selected");
            break;
        case "books.php":
            $("#booksBtn").addClass("selected");
            break;
        case "genre.php":
            $("#genreBtn").addClass("selected");
            break;
        case "members.php":
            $("#membersBtn").addClass("selected");
            break;
        case "issue.php":
            $("#issueBtn").addClass("selected");
            break;
        case "return.php":
            $("#returnBtn").addClass("selected");
            break;
        case "userManagement.php" : 
            $("#usermgmtBtn").addClass("selected");
            break;

        default:
            break;

        }
        console.log(page);




    // $(document).on("click", ".bookDetailsBtn", function(){
    //     $(".top-bar, #bookTable, #bookGrid, .addBookModal").slideUp(200);
    //     $("#bookDetailsContainer").slideDown(200);
    // })

    $("#backBtnBookDetails").click(function(){
        let view = $(".switch input").is(":checked") ? "#bookTable" : "#bookGrid";
        console.log("View : " + view);
        $("#bookDetailsContainer").slideUp(200);
        $(".top-bar, "+view).slideDown(200);
    })




    // REFRESH BUTTON 
    $("#refreshBtn").click(function(){
        location.reload();
    })






    // ISSUE BOOK MANAGEMENT

    // SELECT BOOK : 
    $("#selectBookBtn").click(function(){
        $(".issue-member-table").slideUp(200);
        $(".issue-summary").slideUp(200);
        $("#allIssues").slideUp(200);

        $(".issue-book-table").slideDown(200);

        $("#selectBookBtn").addClass("selectedBtn");
        $("#selectMemberBtn").removeClass("selectedBtn");
        $("#selectSummaryBtn").removeClass("selectedBtn");
    })

    // SELECT MEMBER : 
    $("#selectMemberBtn").click(function(){
        $(".issue-book-table").slideUp(200);
        $(".issue-summary").slideUp(200);

        $(".issue-member-table").slideDown(200);

        $("#selectBookBtn").removeClass("selectedBtn");
        $("#selectMemberBtn").addClass("selectedBtn");
        $("#selectSummaryBtn").removeClass("selectedBtn");
    })

    // SELECT SUMMARY : 
    $("#selectSummaryBtn").click(function(){
        $(".issue-book-table").slideUp(200);
        $(".issue-member-table").slideUp(200);

        $(".issue-summary").slideDown(200).css({"display":"flex"});

        $("#selectBookBtn").removeClass("selectedBtn");
        $("#selectMemberBtn").removeClass("selectedBtn");
        $("#selectSummaryBtn").addClass("selectedBtn");
    })





function formatDate(dateStr){
    const date = new Date(dateStr);
    const options = { day: 'numeric', month: 'short', year: 'numeric' };
    return date.toLocaleDateString('en-GB', options);
}


})  // jQuery Ends .................................................................