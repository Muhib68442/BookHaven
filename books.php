<?php include_once('header.php'); ?>
        
<body class="landing-body">
    <?php include_once('sidebar.php'); ?>
    
    <div class="content">
        <!-- CONTENT - BOOKS -->
        <section id="books">
            <!-- TOP BAR -->
            <div class="top-bar">
                <h3>Total Books : <span>1557</span></h3>
                
                <div class="search">
                    <svg width="64px" height="64px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15.7955 15.8111L21 21M18 10.5C18 14.6421 14.6421 18 10.5 18C6.35786 18 3 14.6421 3 10.5C3 6.35786 6.35786 3 10.5 3C14.6421 3 18 6.35786 18 10.5Z" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                    <input type="text" placeholder="Search Here">
                </div>

                <div class="sort-table">
                    <svg width="64px" height="64px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M13 12H21M13 8H21M13 16H21M6 7V17M6 17L3 14M6 17L9 14" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                    <select name="sort" id="sortBookData">
                        <option value="default">Default</option>
                        <option value="book_name">Book Name</option>
                        <option value="author">Author</option>
                        <option value="year">Year</option>
                        <option value="mostIssued">Most Issued</option>
                        <option value="book_id">ISBN/Code</option>
                        <option value="genre_id">Genre</option>
                        <option value="stock">Stock</option>
                        <option value="status">Status</option>
                    </select>
                </div>
    
                <label class="switch">
                    <input type="checkbox" checked>
                    <span class="slider round">
                        <span class="tableBtn">Grid</span>
                        <span class="gridBtn">Table</span>
                    </span>
                </label>
    
                <button id="addBookBtn">Add Book</button>
            </div>
    
            <!-- TABLE -->
            <div class="table" id="bookTable">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Book Name</th>
                            <th>Author</th>
                            <th>ISBN/Code</th>
                            <th>Genre</th>
                            <th>Stock</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="bookTableBody">
                        <tr>
                            <td>1</td>
                            <td class="truncateText">Snowflakes and seven motherfuckers</td>
                            <td class="truncateText">Md. Muhibbur Rahman</td>
                            <td>BHB01511</td>
                            <td>Romantic</td>
                            <td>3/5</td>
                            <td><button class="bookDetailsBtn">Details</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
    
            <!-- GRID -->
            <div class="grid" id="bookGrid">
                <div class="grid-container">
    
                    <div class="grid-item">
                        <img src="res/uploads/book_cover/1.jpg" alt="Book Cover">
                        <div class="book-info">
                            <h3 class="truncateText">The Story of a lonely boy</h3>
                            <p>Fantasy</p>
                            <p class="truncateText">Author : Korina Villanueva</p>
                            <p>Release Year : 2017</p>
                            <p>Total Copies : 3</p>
                            <p>Issued : 17 times</p>
                            <p>Status : Active</p>
                            <button class="bookDetailsBtn">Details</button>
                        </div>
                    </div>
    
    
                </div>
            </div>
            
            <!-- ADD BOOK MODAL -->
            <div class="addBookModal">
                 <div id="addBookFormContainer" class="form-container">
                    <div class="form-topbar">
                        <svg id="backBtnAddBookForm" width="64px" height="64px" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" fill="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <defs> <style>.cls-1{fill:none;stroke:#ffffff;stroke-linecap:round;stroke-linejoin:round;stroke-width:20px;}</style> </defs> <g data-name="Layer 2" id="Layer_2"> <g data-name="E421, Back, buttons, multimedia, play, stop" id="E421_Back_buttons_multimedia_play_stop"> <circle class="cls-1" cx="256" cy="256" r="246"></circle> <line class="cls-1" x1="352.26" x2="170.43" y1="256" y2="256"></line> <polyline class="cls-1" points="223.91 202.52 170.44 256 223.91 309.48"></polyline> </g> </g> </g></svg>
                        <h3>Add Book</h3>
                    </div>
                    <div class="form-body">
                         <div class="uploadPreview">
                             <h3>Upload Cover</h3>
                             <label id="bookCoverUploadBtn" for="bookCoverUpload">Select</label>
                             <input type="file" id="bookCoverUpload">
     
                         </div>
                         <div class="form-fields">
                             <input type="text" name="book_name" placeholder="Book Name" required>
                             <input type="text" name="author" placeholder="Author">
                             <input type="text" name="publisher" placeholder="Publisher">
                             <input type="number" name="year" placeholder="Year">
                             <select name="genre_id" required>
                                 <option value="1">Romance</option>
                                 <option value="2">Fantasy</option>
                                 <option value="3">Horror</option>
                                 <option value="4">Mystery</option>
                                 <option value="5">Historical</option>
                                 <option value="0">Other</option>
                             </select>
                             <input type="text" name="book_id" placeholder="ISBN/Code">
                             <input type="number" name="stock" placeholder="Stock" required>
                             <!-- <input type="number" placeholder="Price"> -->
                             <select name="status" id="">
                                 <option value="Active">Active</option>
                                 <option value="Inactive">Inactive</option>
                             </select>
                             <button id="insertBookBtn">Add</button>
                         </div>
                    </div>
     
                 </div>
            </div>
    
            <!-- BOOK DETAILS -->
            <div id="bookDetailsContainer">
                <div class="top-barD">
                    <svg id="backBtnBookDetails" width="64px" height="64px" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" fill="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <defs> <style>.cls-1{fill:none;stroke:#ffffff;stroke-linecap:round;stroke-linejoin:round;stroke-width:20px;}</style> </defs> <g data-name="Layer 2" id="Layer_2"> <g data-name="E421, Back, buttons, multimedia, play, stop" id="E421_Back_buttons_multimedia_play_stop"> <circle class="cls-1" cx="256" cy="256" r="246"></circle> <line class="cls-1" x1="352.26" x2="170.43" y1="256" y2="256"></line> <polyline class="cls-1" points="223.91 202.52 170.44 256 223.91 309.48"></polyline> </g> </g> </g></svg>
                    <h3>Books / The Story Of A Lonely Boy</h3>
                </div>
    
                <div class="book-details">
                    <img src="res/uploads/book_cover/1.jpg" alt="The Story Of A Lonely Boy">
                    <div class="book-info">
                        <!-- <h3>Book Details</h3> -->
                        <!-- <h3>The Story Of A Lonely Boy</h3>
                        <p><b>Author:</b> John Doe</p>
                        <p><b>Genre:</b> Romance</p>
                        <p><b>Year:</b> 2017</p>
                        <p><b>Publisher:</b> AKZ Prints</p>
                        <p><b>ISBN/Code:</b> BHB54641</p>
                        <p><b>Total Copies:</b> 5</p>
                        <p><b>Issued:</b> 3</p>
                        <p><b>Available:</b> 2</p>
                        <p><b>Total Issued:</b> 7 Times</p> -->
                        
                        <!-- <button>Issue History</button> -->
                        <div>
                            <button>Remove</button>
                            <button>Edit</button>
                            <button>Inactive</button>
                            <div style="margin-top: 10px;">
                                <button>Issue</button>
                                <button>Return</button>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="book-history">
                    <h3>Issue History</h3>
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Member Name</th>
                                <th>Member ID</th>
                                <th>Issue Date</th>
                                <th>Return Date</th>
                                <th>Remarks</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>John Doe</td>
                                <td>123456</td>
                                <td>2022-01-01</td>
                                <td>2022-01-15</td>
                                <td>Returned</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>John Doe</td>
                                <td>123456</td>
                                <td>2022-01-01</td>
                                <td>2022-01-15</td>
                                <td>Returned</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
        <!-- BOOKS ENDS -->
    </div>

</body>


<?php include_once('footer.php'); ?>
<script>

    // AJAX CALL FOR BOOK DATA 
    $(document).ready(function(){

        // GENERALLY SHOW ALL BOOK DATA 
        $.ajax({
            url : "ajax/get_book.php",
            type : "POST",
            contentType: "application/json",
            dataType : "json",
            data: JSON.stringify({ "show": "all" }),
            success : function(data){

                // APPEND DATA FOR TABLE
                data.forEach(element => {
                    // create row first
                    let row = $(`
                        <tr>
                            <td>1</td>
                            <td class="truncateText">${element.book_name}</td>
                            <td class="truncateText">${element.author}</td>
                            <td>BHB${element.book_id}</td>
                            <td>${element.genre}</td>
                            <td>3/${element.stock}</td>
                            <td><button class="bookDetailsBtn">Details</button></td>
                        </tr>
                    `);

                    // now check status
                    if (element.status == "Inactive") { 
                        row.find("td").css("color", "red");
                    }

                    // append row
                    $("#bookTableBody").append(row);
                });


                // APPEND DATA FOR GRID
                data.forEach(element =>{
                    $(".grid-container").append(`
                        <div class="grid-item">
                            <img src="res/uploads/book_cover/1.jpg" alt="Book Cover">
                            <div class="book-info">
                                <h3 class="truncateText">${element.book_name}</h3>
                                <p>${element.genre_id}</p>
                                <p class="truncateText">${element.author}</p>
                                <p>Release Year : ${element.year}</p>
                                <p>ISBN/Code : BHB${element.book_id}</p>
                                <p>Total Copies : ${element.stock}</p>
                                <p>Issued : ${element.issued} times</p>
                                <p>Status : ${element.status}</p>
                                <button class="bookDetailsBtn">Details</button>
                            </div>
                        </div>
                    `);
                })

            }
        })

        // SEARCHBAR  
        $(".search input").keyup(function(){
            var search_keyword = $(this).val();
            $.ajax({
                url : "ajax/get_book.php",
                type : "POST",
                contentType: "application/json",
                dataType : "json",
                data: JSON.stringify({ "show": "search", "value": search_keyword }),
                success : function(data){

                    // APPEND DATA FOR TABLE
                    $("#bookTableBody").empty();
                    data.forEach(element => {

                        let tableHTML = `
                            <tr style="display: none;">
                                <td>1</td>
                                <td class="truncateText">${element.book_name}</td>
                                <td class="truncateText">${element.author}</td>
                                <td>BHB${element.book_id}</td>
                                <td>${element.genre}</td>
                                <td>3/${element.stock}</td>
                                <td><button class="bookDetailsBtn">Details</button></td>
                            </tr>
                        `;

                        let $row = $(tableHTML);
                        $("#bookTableBody").append($row);
                        $row.fadeIn(200); 

                    });

                    // APPEND DATA FOR GRID
                    $(".grid-container").empty();
                    data.forEach(element =>{

                        let gridHTML = `
                            <div class="grid-item" style="display: none;">
                                <img src="res/uploads/book_cover/1.jpg" alt="Book Cover">
                                <div class="book-info">
                                    <h3 class="truncateText">${element.book_name}</h3>
                                    <p>${element.genre_id}</p>
                                    <p class="truncateText">${element.author}</p>
                                    <p>Release Year : ${element.year}</p>
                                    <p>ISBN/Code : BHB${element.book_id}</p>
                                    <p>Total Copies : ${element.stock}</p>
                                    <p>Issued : ${element.issued} times</p>
                                    <p>Status : ${element.status}</p>
                                    <button class="bookDetailsBtn">Details</button>
                                </div>
                            </div>
                        `;
                        


                        let $row = $(gridHTML);
                        $(".grid-container").append($row);
                        $row.fadeIn(200); 
                    })

                }

            })
        })

        // SORT BOOK DATA 
        $("#sortBookData").change(function(){
            var sort_by = $(this).val();
            $.ajax({
                
                url : "ajax/get_book.php",
                type : "POST", 
                contentType : "application/json",
                dataType : "json",
                data : JSON.stringify({"show" : "sort", "value" : sort_by}),
                success : function(data){
                    
                    console.log(data);

                    // APPEND DATA FOR TABLE
                    $("#bookTableBody").empty();
                    data.forEach(element => {
                        $("#bookTableBody").append(`
                            <tr>
                                <td>1</td>
                                <td class="truncateText">${element.book_name}</td>
                                <td class="truncateText">${element.author}</td>
                                <td>BHB${element.book_id}</td>
                                <td>${element.genre}</td>
                                <td>3/${element.stock}</td>
                                <td><button class="bookDetailsBtn">Details</button></td>
                            </tr>
                        `);
                    });

                    // APPEND DATA FOR GRID
                    $(".grid-container").empty();
                    data.forEach(element =>{
                        $(".grid-container").append(`
                            <div class="grid-item">
                                <img src="res/uploads/book_cover/1.jpg" alt="Book Cover">
                                <div class="book-info">
                                    <h3 class="truncateText">${element.book_name}</h3>
                                    <p>${element.genre_id}</p>
                                    <p class="truncateText">${element.author}</p>
                                    <p>Release Year : ${element.year}</p>
                                    <p>ISBN/Code : BHB${element.book_id}</p>
                                    <p>Total Copies : ${element.stock}</p>
                                    <p>Issued : ${element.issued} times</p>
                                    <p>Status : ${element.status}</p>
                                    <button class="bookDetailsBtn">Details</button>
                                </div>
                            </div>
                        `);
                    })
                }
            })
            console.log("Sort By : " + sort_by);
        })

        // SWITCH BETWEEN VIEW - TABLE / GRID 
        var display = "table";
        $("#bookTable").show();
        $("#bookGrid").hide();
        $(".switch input").on("change", function() {
            if($(this).is(":checked")) {
                display = "table";
                console.log("Table View Selected");
                $("#bookTable").show();
                $("#bookGrid").hide();
            } else {
                display = "grid";
                console.log("Grid View Selected");
                $("#bookTable").hide();
                $("#bookGrid").show();
            }
        });

        // BOOK DETAILS PAGE 
        $(document).on("click", ".bookDetailsBtn", function(){
            // GET THE ID OF THE ROW 

            var row = "" , book_id = "";
            if(display == "table"){
                console.log("Table View");
                $row = $(this).closest("tr");
                book_id = $row.find("td").eq(3).text();    
                book_id = book_id.replace("BHB", "");
            }else if(display == "grid"){
                console.log("Grid View");
                $row = $(this).closest(".grid-item");
                book_id= $row.find("p").eq(3).text();
                book_id = book_id.replace("ISBN/Code : BHB", "").trim();
            }

            // alert(book_id);
            // AJAX CALL FOR BOOK DATA 
            $.ajax({
                url : "ajax/get_book.php",
                type : "POST",
                contentType: "application/json",
                dataType : "json",
                data: JSON.stringify({ "show": "id", "value": book_id }),
                success : function(data){
                    $(".book-details").empty();
                    console.log(data);
    
                    let statusTextInverse = (data[0].status != "Active") ? "Active" : "Inactive";
                    $(".book-details").append(`
                        <img src="res/uploads/book_cover/2.jpg" alt="The Story Of A Lonely Boy">
                        <div class="book-info">
                            <h3>${data[0].book_name}</h3>
                            <p><b>Author:</b> ${data[0].author}</p>
                            <p><b>Publisher:</b> ${data[0].publisher}</p>
                            <p><b>Year:</b> ${data[0].year}</p>
                            <p><b>Genre:</b> ${data[0].genre}</p>
                            <p><b>ISBN/Code:</b> BHB<span id="deleteBookID">${data[0].book_id}</span></p>
                            <p><b>Stock:</b> ${data[0].stock}</p>
                            <p><b>Issued:</b> ${data[0].issued}</p>
                            <p><b>Status:</b> ${data[0].status}</p>
                            <div>
                                <button id="deleteBookBtn">Delete</button>
                                <button>Edit</button>
                                <button id="toogleBookStatus">${statusTextInverse}</button>
                                <div style="margin-top: 10px;">
                                    <button>Issue</button>
                                    <button>Return</button>
                                </div>
                            </div>
                        </div>
                    `);
                }
            })
       
        })

        // TOOGLE BOOK STATUS
        // $(document).on("click","#toogleBookStatus", function(){
        //     let statusText = $(this).text();
        //     $.ajax({
        //         url : "ajax/set_book.php", 
        //         type : "POST",
        //         contentType: "application/json",
        //         dataType : "json",
        //         data: JSON.stringify({ "set": "status", "value": statusText }),
        //         success : function(data){
        //             // console.log(data);
        //             let statusTextInverse = (statusText == "Active") ? "Inactive" : "Active";
        //             $("#toogleBookStatus").text(statusTextInverse);
        //         }
        //     })
        // })
        
        
        
        // DELETE A BOOK 
        $(document).on("click", "#deleteBookBtn", function(){
            let sure = confirm("Are you sure you want to delete this book?");
            if(sure){
                let book_id = $("#deleteBookID").text();
                $.ajax({
                    url : "ajax/set_book.php",
                    type : "POST",
                    contentType: "application/json",
                    dataType : "json",
                    data: JSON.stringify({ "set": "delete", "value": book_id }),
                    success : function(data){
                        if(data.status == "success"){
                            confirm(data.message);
                            location.reload();
                        }
                    },
                    error : function(data){
                        console.log(data);
                    }
                })
            }
        })
    

        // ADD BOOK 
        $("#insertBookBtn").click(function(e){
            e.preventDefault();

            // COLLECT DATA 
            let form_data = {};
            $(".form-fields")
            .find("input, select")
            .each(function () {
                let name = $(this).attr("name");
                let value = $(this).val();
                if (name) {
                form_data[name] = value;
                }
            });

            console.log(form_data);

            // AJAX SEND
            $.ajax({
                url : "ajax/set_book.php",
                type : "POST", 
                contentType: "application/json",
                dataType : "json",
                data: JSON.stringify({ "set": "add", "value": form_data }),
                success : function(data){
                    if(data.status == "success"){
                        alert(data.message);
                        setTimeout(function(){ location.reload(); }, 5000);
                    }
                }, 
                error : function(data){
                    console.log(data);
                }
            })

        })
        



    }) // END OF DOCUMENT READY
</script>