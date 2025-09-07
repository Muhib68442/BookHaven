$(document).ready(function(){
    // jQuery Starts..............................................................



    function hideAll(){
        $("#dashboard").hide();
        $("#books").hide();
        $("#genre").hide();
        $("#members").hide();
        $("#issue").hide();
        $("#return").hide();
    }


    function selectedOption(option){
        $(".selected").removeClass("selected");
        switch (option) {
            case "dashboard":
                $("#dashboardBtn").addClass("selected");
                break;

            case "books":
                $("#booksBtn").addClass("selected");
                break;

            case "genre":
                $("#genreBtn").addClass("selected");
                break;

            case "members":
                $("#membersBtn").addClass("selected");
                break;

            case "issue":
                $("#issueBtn").addClass("selected");
                break;

            case "return":
                $("#returnBtn").addClass("selected");
                break;
            
            default:
                break;
        }
    }

    function showSection(section){
        hideAll();
        selectedOption(section);
        $("#"+section).show();
    }


    // BUTTON MANAGEMENT 

    // INITIAL : DASHBOARD
    hideAll();
    $("#dashboard").show();
    selectedOption(1);

    $("#dashboardBtn").click(function(){
        showSection("dashboard");
    })

    $("#booksBtn").click(function(){
        showSection("books");
    })

    $("#genreBtn").click(function(){
        showSection("genre");
    })

    $("#membersBtn").click(function(){
        showSection("members");
    })

    $("#issueBtn").click(function(){
        showSection("issue");
    })

    $("#returnBtn").click(function(){
        showSection("return");
    })


    






    // BOOKS -> ADD BOOK BUTTON 
    $("#addBookBtn").click(function(){
        $(".top-bar, #bookTable, #bookGrid, #bookDetailsContainer").slideUp(200);
        $(".addBookModal").slideDown(200);
    })
    $("#backBtnAddBookForm").click(function(){
        $(".addBookModal").slideUp(200);
        $(".top-bar, #bookTable").slideDown(200);
    })
    // BOOKS -> DETAILS
    // $(".bookDetailsBtn").click(function(){
    //     $(".top-bar, #bookTable, #bookGrid, #addBookFormContainer").slideUp(200);
    //     $("#bookDetailsContainer").slideDown(200);
    // })
    $(document).on("click", ".bookDetailsBtn", function(){
        $(".top-bar, #bookTable, #bookGrid, .addBookModal").slideUp(200);
        $("#bookDetailsContainer").slideDown(200);
    })
    $("#backBtnBookDetails").click(function(){
        $("#bookDetailsContainer").slideUp(200);
        $(".top-bar, #bookTable").slideDown(200);
    })

    // MEMBERS BUTTONS 
    $("#memberDetailsBtn").click(function(){
        $(".top-bar, .member-table").slideUp(200);
        $("#memberDetailsContainer").slideDown(200);
    })

    $("#backBtnMemberDetails").click(function(){
        $("#memberDetailsContainer").slideUp(200);
        $(".top-bar, .member-table").slideDown(200);
    })

    $("#addMemberBtn").click(function(){
        $(".top-bar, .member-table, #memberDetailsContainer").slideUp(200);
        $(".addMemberModal").slideDown(200);
    })
    $("#backBtnAddMemberForm").click(function(){
        $(".addMemberModal").slideUp(200);
        $(".top-bar, .member-table").slideDown(200);
    })






    // REFRESH BUTTON 
    $("#refreshBtn").click(function(){
        location.reload();
    })










    // demo loop
    for(let i=0; i<30; i++){
        $("#books .table tbody").append(`
            <tr>
                <td>${i+1}</td>
                <td class="truncateText">Snowflakes and seven motherfuckers</td>
                <td class="truncateText">Md. Muhibbur Rahman</td>
                <td>BHB01511</td>
                <td>Romantic</td>
                <td>3/5</td>
                <td><button class="editBtn">Details</button></td>
            </tr>
        `)
    }
    for(let i=0; i<30; i++){
        $("#bookGrid .grid-container").append(`
            <div class="grid-item">
                        <img src="res/uploads/book_cover/1.jpg" alt="Book Cover">
                        <div class="book-info">
                            <h3 class="truncateText">Snowflakes and seven motherfuckers</h3>
                            <p class="truncateText">Md. Muhibbur Rahman</p>
                            <p>BHB01511</p>
                            <p>Romantic</p>
                            <p>3/5</p>
                            <button class="editBtn">Details</button>
                        </div>
                    </div>
        `)
    }

    for (let i=0; i<30; i++){
        $("#members .member-table tbody").append(`
            <tr>
                <td>${i+1}</td>
                <td>John Doe</td>
                <td>BHM12548${i+1}</td>
                <td>2022-01-01</td>
                <td>${Math.floor(Math.random()*6) + 1}</td>
                <td>${Math.floor(Math.random()*10000000000) + 10000000001}</td>
                <td>Active</td>
                <td><button>Details</button></td>
            </tr>
        `)
    }
            


    // TABLE - GRID VIEW TOGGLE SWITCH 
    $("#bookTable").show();
    $("#bookGrid").hide();
    $(".switch input").on("change", function() {
        if($(this).is(":checked")) {
            console.log("Table View Selected");
            $("#bookTable").show();
            $("#bookGrid").hide();
        } else {
            console.log("Grid View Selected");
            $("#bookTable").hide();
            $("#bookGrid").show();
        }
    });







    // ISSUE BOOK MANAGEMENT
    var bookID = "";
    var memberID = "";

    $("#selectBookBtn").addClass("selectedBtn");
    $(document).on("click", "#selectBookForIssue", function(){
        // COLLECT THE BOOK DATA 
        var $row = $(this).closest("tr");
        bookID = $row.find("td:eq(1)").text();

        // GO TO NEXT SECTION - SELECT MEMBER

        // BUTTON HIGHLIGHTING AND TABLE CHANGING 
        $(".issue-book-table").slideUp(200);
        $(".issue-member-table").slideDown(200);
        $("#selectBookBtn").removeClass("selectedBtn");
        $("#selectMemberBtn").addClass("selectedBtn");

    })


    $(document).on("click", "#selectMemberForIssue", function(){
        // COLLECT THE MEMBER DATA 
        var $row = $(this).closest("tr");
        memberID = $row.find("td:eq(1)").text();

        // GO TO NEXT SECTION - ISSUE SUMMARY

        // BUTTON HIGHLIGHTING AND TABLE CHANGING 
        $(".issue-member-table").slideUp(200);
        $(".issue-summary").slideDown(200);
        $("#selectMemberBtn").removeClass("selectedBtn");
        $("#selectSummaryBtn").addClass("selectedBtn");
    })

    // SELECT BOOK : 
    $("#selectBookBtn").click(function(){
        $(".issue-member-table").slideUp(200);
        $(".issue-summary").slideUp(200);

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

        $(".issue-summary").slideDown(200);

        $("#selectBookBtn").removeClass("selectedBtn");
        $("#selectMemberBtn").removeClass("selectedBtn");
        $("#selectSummaryBtn").addClass("selectedBtn");
    })





























































})  // jQuery Ends .................................................................