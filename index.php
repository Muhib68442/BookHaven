<?php 
include_once('header.php'); 
date_default_timezone_set('Asia/Dhaka');
if(session_status() === PHP_SESSION_NONE){
    session_start();
}
if(!isset($_SESSION['user_id']) || !isset($_SESSION['user_name']) || !isset($_SESSION['user_role'])) {
    header('Location: login.php');
}
?>
<body class="landing-body">

    <?php include_once('sidebar.php'); ?>

    <section class="content">
        
        <!-- CONTENT - DASHBOARD -->
        <section id="dashboard"> 

            <div class="info-bar">
                <p>Hello, <span ><?php echo $_SESSION['user_name']?></span></p>
                <p><?php echo date('F j, Y'); ?></p>
                <p><?php echo date('h:i A'); ?></p>
                <button id="logoutBtn">Logout</button>
            </div>

            <!-- DASHBOARD HEADER (CARD SECTION) -->
            <div class="card-section">
                <div class="card">
                    <svg fill="#000000" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>books</title> <path d="M30.156 26.492l-6.211-23.184c-0.327-1.183-1.393-2.037-2.659-2.037-0.252 0-0.495 0.034-0.727 0.097l0.019-0.004-2.897 0.776c-0.325 0.094-0.609 0.236-0.86 0.42l0.008-0.005c-0.49-0.787-1.349-1.303-2.33-1.306h-2.998c-0.789 0.001-1.5 0.337-1.998 0.873l-0.002 0.002c-0.5-0.537-1.211-0.873-2-0.874h-3c-1.518 0.002-2.748 1.232-2.75 2.75v24c0.002 1.518 1.232 2.748 2.75 2.75h3c0.789-0.002 1.5-0.337 1.998-0.873l0.002-0.002c0.5 0.538 1.211 0.873 2 0.875h2.998c1.518-0.002 2.748-1.232 2.75-2.75v-16.848l4.699 17.54c0.327 1.182 1.392 2.035 2.656 2.037h0c0.001 0 0.003 0 0.005 0 0.251 0 0.494-0.034 0.725-0.098l-0.019 0.005 2.898-0.775c1.182-0.326 2.036-1.392 2.036-2.657 0-0.252-0.034-0.497-0.098-0.729l0.005 0.019zM18.415 9.708l5.31-1.423 3.753 14.007-5.311 1.422zM18.068 3.59l2.896-0.776c0.097-0.027 0.209-0.043 0.325-0.043 0.575 0 1.059 0.389 1.204 0.918l0.002 0.009 0.841 3.139-5.311 1.423-0.778-2.905v-1.055c0.153-0.347 0.449-0.607 0.812-0.708l0.009-0.002zM11.5 2.75h2.998c0.69 0.001 1.249 0.56 1.25 1.25v3.249l-5.498 0.001v-3.25c0.001-0.69 0.56-1.249 1.25-1.25h0zM8.75 23.25h-5.5v-14.5l5.5-0.001zM10.25 8.75l5.498-0.001v14.501h-5.498zM4.5 2.75h3c0.69 0.001 1.249 0.56 1.25 1.25v3.249l-5.5 0.001v-3.25c0.001-0.69 0.56-1.249 1.25-1.25h0zM7.5 29.25h-3c-0.69-0.001-1.249-0.56-1.25-1.25v-3.25h5.5v3.25c-0.001 0.69-0.56 1.249-1.25 1.25h-0zM14.498 29.25h-2.998c-0.69-0.001-1.249-0.56-1.25-1.25v-3.25h5.498v3.25c-0.001 0.69-0.56 1.249-1.25 1.25h-0zM28.58 27.826c-0.164 0.285-0.43 0.495-0.747 0.582l-0.009 0.002-2.898 0.775c-0.096 0.026-0.206 0.041-0.319 0.041-0.575 0-1.060-0.387-1.208-0.915l-0.002-0.009-0.841-3.14 5.311-1.422 0.841 3.14c0.027 0.096 0.042 0.207 0.042 0.321 0 0.23-0.063 0.446-0.173 0.63l0.003-0.006z"></path> </g></svg>
                    <p><span id="bookCount">+</span> Books</p>
                </div>
                <div class="card">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M19 15C21.2091 15 23 16.7909 23 19V21H21M16 10.874C17.7252 10.4299 19 8.86383 19 6.99999C19 5.13615 17.7252 3.57005 16 3.12601M13 7C13 9.20914 11.2091 11 9 11C6.79086 11 5 9.20914 5 7C5 4.79086 6.79086 3 9 3C11.2091 3 13 4.79086 13 7ZM5 15H13C15.2091 15 17 16.7909 17 19V21H1V19C1 16.7909 2.79086 15 5 15Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                    <p><span id="memberCount">+</span> Members</p>
                </div>
                <div class="card">
                    <svg width="64px" height="64px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M11 6L21 6.00072M11 12L21 12.0007M11 18L21 18.0007M3 11.9444L4.53846 13.5L8 10M3 5.94444L4.53846 7.5L8 4M4.5 18H4.51M5 18C5 18.2761 4.77614 18.5 4.5 18.5C4.22386 18.5 4 18.2761 4 18C4 17.7239 4.22386 17.5 4.5 17.5C4.77614 17.5 5 17.7239 5 18Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                    <p><span id="issueCount">+</span> Issues</p>
                </div>
                <div class="card">
                    <svg fill="#000000" width="64px" height="64px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>return</title> <path d="M0 21.984q0.032-0.8 0.608-1.376l4-4q0.448-0.48 1.056-0.576t1.12 0.128 0.864 0.736 0.352 1.12v1.984h18.016q0.8 0 1.408-0.576t0.576-1.408v-8q0-0.832-0.576-1.408t-1.408-0.608h-16q-0.736 0-1.248-0.416t-0.64-0.992 0-1.152 0.64-1.024 1.248-0.416h16q2.464 0 4.224 1.76t1.76 4.256v8q0 2.496-1.76 4.224t-4.224 1.76h-18.016v2.016q0 0.64-0.352 1.152t-0.896 0.704-1.12 0.096-1.024-0.544l-4-4q-0.64-0.608-0.608-1.44z"></path> </g></svg>
                    <p><span id="returnCount">+</span> Returns</p>
                </div>
            </div>
    
            <!-- DASHBOARD BODY (TABLE, SEARCH) -->
            <div class="dashboard-body">
                
                <!-- QUICK TABLE -->
                <div class="quick-table">
                    <ul>
                        <li id="quick_table_issued">Issued</li>
                        <li id="quick_table_returned">Returned</li>
                        <li id="quick_table_topissued">Top Issued Book</li>
                        <li id="quick_table_topmember">Top Members</li>
                        <li id="quick_table_topstaff">Top Staff</li>
                        <li id="quick_table_newarrival">New Arrival</li>
                    </ul>
    
                    <table>
                        <thead id="quickTableHead">
                            <tr>
                                <th>#</th>
                                <th>Book Name</th>
                                <!-- <th>Book ID</th> -->
                                <th>Member ID</th>
                                <th>Issue Date</th>
                                <th>Numbers</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        
                        <tbody id="quickTableBody">
                            <tr>
                                
                            </tr>
                            <!-- <tr>
                                <td>2</td>
                                <td class="book-name">Snowflake and seven drawfters</td>
                                
                                <td>BHM87788</td>
                                <td>Issue Date</td>
                                <td>4</td>
                                <td><button>Details</button></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td class="book-name">Let us Fly</td>
                                <td>BHM13322</td>
                                <td>Issue Date</td>
                                <td>2</td>
                                <td><button>Details</button></td>
                            </tr> -->
                        </tbody>
                    </table>
    
                </div>
                
                <!-- QUICK SEARCH -->
                <div class="quick-search">
                    <h3>Quick Search</h3>
                    <div class="Qsearchbar">
                        <div>
                            <svg width="64px" height="64px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15.7955 15.8111L21 21M18 10.5C18 14.6421 14.6421 18 10.5 18C6.35786 18 3 14.6421 3 10.5C3 6.35786 6.35786 3 10.5 3C14.6421 3 18 6.35786 18 10.5Z" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                            <input id="quickSearch" type="text" placeholder="Search Here">
                        </div>
                        <svg width="64px" height="64px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <circle cx="12" cy="12" r="10" stroke="#ffffff" stroke-width="1.5"></circle> <path d="M14.5 9.50002L9.5 14.5M9.49998 9.5L14.5 14.5" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round"></path> </g></svg>
                    </div>
                    <ul class="search-result" id="quickSearchResult">
                        <!-- SEARCH RESULT APPENDS HERE -->
                        <li><a href="#">Search books</a></li>
                    </ul>
                </div>
            </div>
        </section> <!-- DASHBOARD ENDS -->

    <!-- CONTENT ENDS -->
    </section>

</body>
<?php include_once('footer.php'); ?>

<script>
    $("#logoutBtn").click(function(){
        window.location.href = "logout.php";
    })

    // GET DATA 
    $.ajax({
        url : 'ajax/dashboard.php',
        type : 'POST',
        contentType: 'application/json',
        dataType : 'json',
        data : JSON.stringify({"set": "count"}),
        success : function(data){
            console.log(data);
            $("#bookCount").text(data.books);
            $("#memberCount").text(data.members);
            $("#issueCount").text(data.issued);
            $("#returnCount").text(data.returned);

        }
    })


    /////////////////////////// QUICK TABLE SECTION /////////////////////////

    // DEFAULT : ISSUED 
    quickTableDefault();
    function quickTableDefault(){
        $('.selectedBtn').removeClass("selectedBtn");
        $("#quick_table_issued").addClass("selectedBtn");
        $("#quickTableBody").empty();
        $("#quickTableHead").empty();
        $("#quickTableHead").append(`
            <tr>
                <th>Issue ID</th>
                <th>Book Name</th>
                <th>Member Name</th>
                <th>Issued By</th>
                <th>Details</th>
            </tr>
        `);
        $.ajax({
            
            url : 'ajax/dashboard.php',
            type : "POST",
            contentType: 'application/json',
            dataType : 'json',
            data : JSON.stringify({"set" : "quick_issued"}),
            success : function(data){
                console.log(data);
                data.forEach(element => {
                    $("#quickTableBody").append(`
                        <tr>
                            <td>BHI${element.issue_id}</td>
                            <td>${element.book_name}</td>
                            <td>${element.full_name}</td>
                            <td>${element.issued_by}</td>
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


    // ISSUED
    $("#quick_table_issued").click(function(){
        quickTableDefault();
    })

    // RETURNED
    $("#quick_table_returned").click(function(){
        $('.selectedBtn').removeClass("selectedBtn");
        $("#quick_table_returned").addClass("selectedBtn");
        $("#quickTableBody").empty();
        $("#quickTableHead").empty();
        $("#quickTableHead").append(`
            <tr>
                <th>ID</th>
                <th>Book Name</th>
                <th>Member Name</th>
                <th>Returned By</th>
                <th>Details</th>
            </tr>
        `);
        $.ajax({
            url : 'ajax/dashboard.php',
            type : "POST",
            contentType: 'application/json',
            dataType : 'json',
            data : JSON.stringify({"set" : "quick_returned"}),
            success : function(data){
                console.log(data);
                data.forEach(element => {
                    $("#quickTableBody").append(`
                        <tr>
                            <td>BHI${element.issue_id}</td>
                            <td>${element.book_name}</td>
                            <td>${element.full_name}</td>
                            <td>${element.returned_by}</td>
                            <td><a href="issueDetails.php?id=${element.issue_id}">Details</a></td>
                        </tr>
                    `)
                })
            },
            error : function(err){
                console.log(err);
            }
        })
    })

    // TOP ISSUED BOOK
    $("#quick_table_topissued").click(function(){
        $('.selectedBtn').removeClass("selectedBtn");
        $("#quick_table_topissued").addClass("selectedBtn");
        $("#quickTableBody").empty();
        $("#quickTableHead").empty();
        $("#quickTableHead").append(`
            <tr>
                <th>Book Name</th>
                <th>Author</th>
                <th>Genre</th>
                <th>Issue Count</th>
                <th>Details</th>
            </tr>
        `);
        $.ajax({
            url : 'ajax/dashboard.php',
            type : "POST",
            contentType: 'application/json',
            dataType : 'json',
            data : JSON.stringify({"set" : "quick_topissued"}),
            success : function(data){
                console.log(data);
                data.forEach(element => {
                    $("#quickTableBody").append(`
                        <tr>
                            <td>${element.book_name}</td>
                            <td>${element.author}</td>
                            <td>${element.genre_name}</td>
                            <td>${element.issue_count}</td>
                            <td><a href="bookDetails.php?id=${element.book_id}">Details</a></td>
                        </tr>
                    `)
                })
            },
            error : function(err){
                console.log(err);
            }
        })
    })

    // TOP MEMBERS 
    $("#quick_table_topmember").click(function(){
        $('.selectedBtn').removeClass("selectedBtn");
        $("#quick_table_topmember").addClass("selectedBtn");
        $("#quickTableBody").empty();
        $("#quickTableHead").empty();
        $("#quickTableHead").append(`
            <tr>
                <th>Member Name</th>
                <th>Issue Count</th>
                <th>Details</th>
            </tr>
        `);
        $.ajax({
            url : 'ajax/dashboard.php',
            type : "POST",
            contentType: 'application/json',
            dataType : 'json',
            data : JSON.stringify({"set" : "quick_topmember"}),
            success : function(data){
                console.log(data);
                data.forEach(element => {
                    $("#quickTableBody").append(`
                        <tr>
                            <td>${element.full_name}</td>
                            <td>${element.issue_count}</td>
                            <td><a href="memberDetails.php?id=${element.member_id}">Details</a></td>
                        </tr>
                    `)
                })
            },
            error : function(err){
                console.log(err);
            }
        })
    })

    // TOP STAFF
    $("#quick_table_topstaff").click(function(){
        $('.selectedBtn').removeClass("selectedBtn");
        $("#quick_table_topstaff").addClass("selectedBtn");
        $("#quickTableBody").empty();
        $("#quickTableHead").empty();
        $("#quickTableHead").append(`
            <tr>
                <th>Staff Name</th>
                <th>Issue Count</th>
                <th>Details</th>
            </tr>
        `);
        $.ajax({
            url : 'ajax/dashboard.php',
            type : "POST",
            contentType: 'application/json',
            dataType : 'json',
            data : JSON.stringify({"set" : "quick_topstaff"}),
            success : function(data){
                console.log(data);
                data.forEach(element => {
                    $("#quickTableBody").append(`
                        <tr>
                            <td>${element.name}(${element.user_id})</td>
                            <td>${element.issue_count}</td>
                            <td><a href="userDetails.php?id=${element.user_id}">Details</a></td>
                        </tr>
                    `)
                })
            },
            error : function(err){
                console.log(err);
            }
        })
    })

    // NEW ARRIVAL 
    $("#quick_table_newarrival").click(function(){
        $('.selectedBtn').removeClass("selectedBtn");
        $("#quick_table_newarrival").addClass("selectedBtn");
        $("#quickTableBody").empty();
        $("#quickTableHead").empty();
        $("#quickTableHead").append(`
            <tr>
                <th>Book Name</th>
                <th>Author</th>
                <th>Arrival Date</th>
                <th>Details</th>
            </tr>
        `);
        $.ajax({
            url : 'ajax/dashboard.php',
            type : "POST",
            contentType: 'application/json',
            dataType : 'json',
            data : JSON.stringify({"set" : "quick_newarrival"}),
            success : function(data){
                console.log(data);
                data.forEach(element => {
                    $("#quickTableBody").append(`
                        <tr>
                            <td>${element.book_name}</td>
                            <td>${element.author}</td>
                            <td>${new Intl.DateTimeFormat('en-GB', { year: 'numeric', month: 'long', day: '2-digit' }).format(new Date(element.created_at))}</td>
                            <td><a href="bookDetails.php?id=${element.book_id}">Details</a></td>
                        </tr>
                    `)
                })
            },
            error : function(err){
                console.log(err);
            }
        })
    })


    /////////////////////////// QUICK TABLE ENDS /////////////////////////

    $("#quickSearch").keyup(function(){
        var search = $("#quickSearch").val();
        $.ajax({
            url : 'ajax/dashboard.php',
            type : "POST",
            contentType: 'application/json',
            dataType : 'json',
            data : JSON.stringify({"set" : "quick_search", "search" : search}),
            success : function(data){
                console.log(data);
                $("#quickSearchResult").empty();
                data.forEach(element => {
                    $("#quickSearchResult").append(`
                        <li><a href="bookDetails.php?id=${element.book_id}">[${element.book_id}] ${element.book_name} (${element.genre_name})</a></li>
                    `)
                })
            },
            error : function(err){
                console.log(err);
            }
        })
    })
    // #quickSearchResult


    

</script>

