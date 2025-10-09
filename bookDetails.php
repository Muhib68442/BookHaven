<?php 

include_once('header.php');
include_once('core/database.php');

// GET THE BOOK ISSUED 
$db = new database();
$id = $_GET['id'];
$db->sql("SELECT COUNT(*) as num_issued FROM issues WHERE book_id = $id ;");
$data = $db->get_result();
$num_issued = $data[0]['num_issued'];

$db->sql("SELECT COUNT(*) as num_issued FROM issues WHERE book_id = $id AND status = 'Issued';");
$total_issued = $db->get_result();
$total_issued = $total_issued[0]['num_issued'];
echo "<span id='bookTotalIssued' style='display:none;'>$total_issued</span>"
?>

<body class="landing-body">
    <?php include_once('sidebar.php'); ?>
    <div class="content">
        <div id="bookDetailsContainer">
            <div class="top-barD">
                <a href="books.php">
                    <svg width="64px" height="64px" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" fill="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <defs> <style>.cls-1{fill:none;stroke:#ffffff;stroke-linecap:round;stroke-linejoin:round;stroke-width:20px;}</style> </defs> <g data-name="Layer 2" id="Layer_2"> <g data-name="E421, Back, buttons, multimedia, play, stop" id="E421_Back_buttons_multimedia_play_stop"> <circle class="cls-1" cx="256" cy="256" r="246"></circle> <line class="cls-1" x1="352.26" x2="170.43" y1="256" y2="256"></line> <polyline class="cls-1" points="223.91 202.52 170.44 256 223.91 309.48"></polyline> </g> </g> </g></svg>
                </a>
                <h3>Books / <span class="page-title"></span></h3>
            </div>

            <div class="book-details">
                <img id="bookCover" src="res/uploads/book_cover/default.jpg"  alt="" onerror="this.onerror=null; this.src='res/uploads/book_cover/default.jpg';">
                <div class="book-info">
                    <h3 id="bookName"></h3>
                    <p><b>Author:</b> <span id="bookAuthor"></span></p>
                    <p><b>Publisher:</b> <span id="bookPublisher"></span></p>
                    <p><b>Year:</b> <span id="bookYear"></span></p>
                    <p><b>Arrival:</b> <span id="bookArrival"></span></p>
                    <p><b>Genre:</b> <span id="bookGenre"></span></p>
                    <p><b>ISBN/Code:</b> BHB<span id="bookID"></span></p>
                    <p class="bookStockText"><b>Total Stock:</b> <span id="bookStock"></span> Pcs</p>
                    <p><b>Pending Return:</b> <?php echo $total_issued ?> Pcs</p>
                    <p><b>Total Issued:</b> <span id="bookIssued"><?php echo $num_issued?> Times</span></p>
                    <p><b>Status:</b> <span class="bookStatusText"></span></p>
                    <?php if($role == 'admin') : ?>
                        <button id="toogleBookStatus"></button>
                    <?php endif; ?>
                </div>

                <div class="bookDetailsLocationContainer">
                    <div class="book-location">
                        <h3>Book Location</h3>
                        <p><b>Section:</b> <span id='bookSection'></span></p>
                        <p><b>Shelf:</b> <span id='bookShelf'></span></p>
                        <p><b>Row:</b> <span id='bookRow'></span></p>
                        <p id="disabled">Please keep the book where it is after reading</p>
                    </div>

                    <div class="btns">
                        <?php if($role == 'admin') : ?>
                        <a id="editBookBtn" href="editBook.php?book_id="><button>Edit</button></a>
                        <button id="deleteBookBtn">Delete</button>
                        <?php endif; if($role == 'staff' || $role == 'admin') : ?>
                        <button id="selectBook">Issue</button>
                        <button id="returnBookBtn">Return</button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>


            <?php if($role == 'admin' || $role == 'staff') : ?>
            <div class="book-history"> 
                <h3>Issue History</h3>
               
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
                            <th>#</th>
                            <th>Member Name</th>
                            <th>Member ID</th>
                            <th>Issue Date</th>
                            <th>Return Date</th>
                            <th>Remarks</th>
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
            <?php endif; ?>
        </div>
    </div>
</body>

<?php  include_once('footer.php'); ?>
<script>
    const param = new URLSearchParams(window.location.search);
    const book_id = param.get('id');

    console.log(book_id);
    // GET DATA (DETAILS)
    $.ajax({
        url : "ajax/get_book.php",
        type : "POST",
        contentType: "application/json",
        dataType : "json",
        data: JSON.stringify({ "show": "id", "value": book_id }),
        success : function(data){
            // console.log(data);
            $(".page-title").text(data[0].book_name);
            // $(".book-details").empty();

            let statusTextInverse = (data[0].status != "Active") ? "Active" : "Inactive";
            
            // LOCATION 
            $("#bookSection").text(data[0].genre_name+" Section");
            
            $("#bookShelf").text(data[0].shelf_number);
            $("#bookRow").text(data[0].row_number);

            // BOOK DETAILS 
            $("#bookID").text(data[0].book_id);
            $("#bookName").text(data[0].book_name);
            $("#bookAuthor").text(data[0].author);
            $("#bookPublisher").text(data[0].publisher);
            $("#bookYear").text(data[0].year);
            $("#bookGenre").text(data[0].genre_name);
            $("#bookStock").text(parseInt(data[0].stock) + parseInt($("#bookTotalIssued").text()));
            $("#bookIssued").text(data[0].issued);
            $(".bookStatusText").text(data[0].status);
            $("#toogleBookStatus").text(statusTextInverse);
            $("#bookArrival").text(formatDate(data[0].created_at));
            $("#editBookBtn").attr("href", "editBook.php?book_id="+data[0].book_id);
            data[0].book_cover == null ? $("#bookCover").attr("src", "res/uploads/book_cover/default.jpg") : $("#bookCover").attr("src", "res/uploads/book_cover/"+data[0].book_cover);
            

            // STATUS COLOR
            if(data[0].status != "Active"){
                $(".bookStatusText").css("color", "tomato");
            }else{
                $(".bookStatusText").css("color", "green");
            }

            // STOCK COLOR 
            if(data[0].stock == 0){
                $(".bookStockText").css("color", "tomato").text("Out of Stock (0 Copies)");
            }else if(data[0].stock < 5){
                $(".bookStockText").css("color", "orange").text("Low Stock ("+data[0].stock+" Copies)");
            }
        },
        error : function(data){
            alert(data.responseText);
        }
    })

    // TOOGLE BOOK STATUS
    $(document).on("click","#toogleBookStatus", function(){
        let sure = confirm("Toggle status to "+$(this).text()+" ?");
        if(!sure) return;

        let statusText = $(this).text();
        let book_id = $("#bookID").text();
        // alert(statusText);
        $.ajax({
            url : "ajax/set_book.php", 
            type : "POST",
            contentType: "application/json",
            dataType : "json",
            data: JSON.stringify({ "set": "status", "value": statusText, "book_id" : book_id}),
            success : function(data){
                // console.log(data);
                let statusTextInverse = (statusText == "Active") ? "Inactive" : "Active";
                $("#toogleBookStatus").text(statusTextInverse);
                if(statusText == "Active"){
                    $(".bookStatusText").css("color", "green");
                    $(".bookStatusText").text("Active");
                }else{
                    $(".bookStatusText").css("color", "tomato");
                    $(".bookStatusText").text("Inactive");
                }
                Toastify({
                    text: "Book "+(statusText == "Active" ? "Activated" : "Deactivated")+"ed successfully!",
                    duration: 5000,
                    gravity: "top",
                    position: "center",
                    stopOnFocus: true

                }).showToast();
                // renderData();
            }, 
            error : function(data){
                console.log(data);
            }
        })
    })
    
    // DELETE A BOOK 
    $(document).on("click", "#deleteBookBtn", function(){
        let sure = confirm("Are you sure you want to delete this book?");
        if(sure){
            let book_id = $("#bookID").text();
            $.ajax({
                url : "ajax/set_book.php",
                type : "POST",
                contentType: "application/json",
                dataType : "json",
                data: JSON.stringify({ "set": "delete", "value": book_id }),
                success : function(data){
                    window.location.href = "books.php?status=3";
                    renderData();
                }
            })
        }
    })


    //  GET THE ISSUE DETAILS 
    $.ajax({
        url : 'ajax/issue.php',
        type : 'POST', 
        dataType : 'json',
        contentType : 'application/json',
        data : JSON.stringify({'get':'issueDetailsBook', 'value':book_id}),
        success : function(data){

            if(data.length == 0) return;

            // console.log("fetched : " +data.length);
            $("#issueTableBody").empty();
            data.forEach(element => {
                $("#issueTableBody").append(`
                    <tr>
                        <td>BHI${element.issue_id}</td>
                        <td>${element.full_name} </td>
                        <td>BHM${element.member_id}</td>
                        <td>${formatDate(element.issue_date)}</td>
                        <td>${formatDate(element.return_date)}</td>
                        <td>${element.issue_status}</td>
                        <td><a href="issueDetails.php?id=${element.issue_id}">Details</a></td>
                    </tr>
                `).hide().fadeIn(200);
            })
        }
    })


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


    // BLOCK: LIVE SEARCH FILTER 
    $("#issueSearch").on("input", function(){
        const keyword = $(this).val().toLowerCase();
        $("#issueTableBody tr").each(function(){
            const memberId = $(this).find("td:eq(1)").text().toLowerCase();
            const fullName = $(this).find("td:eq(2)").text().toLowerCase();
            const match = memberId.includes(keyword) || fullName.includes(keyword);
            $(this).toggle(match);
        });
    });



    // SELECT BOOK FOR ISSUE 
    $(document).on("click", "#selectBook", function(){
        if($(".bookStockText").text().trim() == "Out of Stock (0 Copies)") return alert("Out of stock");
        if($(".bookStatusText").text().trim() == "Inactive") return alert("Book is Inactive");
        window.location.href = "issue.php?selectedBook="+book_id;
    })

    // RETURN BOOK BTN 
    $("#returnBookBtn").on("click", function(){
        window.location.href = "return.php?bookID="+book_id;
    })

    if(param.get('status') === '2'){
        Toastify({
            text: "Book updated successfully!",
            duration: 5000,
            gravity: "top",
            position: "center",
            stopOnFocus: true

        }).showToast();
    }


    function formatDate(dateStr){
    const date = new Date(dateStr);
    const options = { day: 'numeric', month: 'short', year: 'numeric' };
    return date.toLocaleDateString('en-GB', options);
}
</script>