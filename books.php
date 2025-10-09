<?php include_once('header.php'); 

if(isset($_GET['status'])){

}

if(isset($_GET['genre']))
    $genre_id = $_GET['genre'];

?>

        
<body class="landing-body">
    <?php include_once('sidebar.php'); ?>
    
    <div class="content">
        <!-- CONTENT - BOOKS -->
        <section id="books">
            <!-- TOP BAR -->
            <div class="top-bar">
                <h3>Total Books : <span id="totalBooks"></span></h3>
                <h4 id="genreName"></h4>
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
                        <option value="created_at">Oldest</option>
                        <option value="issued_count">Most Issued</option>
                        <option value="status">Status</option>
                    </select>
                </div>
    
                <label class="switch">
                    <input type="checkbox" >
                    <span class="slider round">
                        <span class="tableBtn">Grid</span>
                        <span class="gridBtn">Table</span>
                    </span>
                </label>
                <?php if($role == "admin") { ?>
                <a href="addbooks.php">Add Books</a>
                <?php } ?>
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
                            <th>Available</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="bookTableBody">
                        <tr>
                            <td colspan="8" style="text-align: center; padding: 30px; font-size: 20px; font-weight: 600; color: #000;">No Books Found</td>
                        </tr>
                    </tbody>
                </table>
            </div>
    
            <!-- GRID -->
            <div class="grid" id="bookGrid">
                <div class="grid-container">
    
                    <!-- <div class="grid-item">
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
                    </div> -->
    
    
                </div>
            </div>
    
            <!-- BOOK DETAILS -->
            

        </section>
        <!-- BOOKS ENDS -->
    </div>

</body>


<?php include_once('footer.php'); ?>


<script>

    // AJAX CALL FOR BOOK DATA 
    $(document).ready(function(){
        
        // CHECK IF FROM GENRE 
        const params = new URLSearchParams(window.location.search);
        if(params.has("genre")){
            let genreValue = params.get("genre");
            $.ajax({
                url : "ajax/get_book.php",
                type : "POST",
                contentType: "application/json",
                dataType : "json",
                data: JSON.stringify({ "show": "genre", "value": genreValue }),
                success : function(data){
                    $("#genreName").text(data.data[0].genre_name);
                    $("#totalBooks").text(data.num_books);                
                    renderData(data);
                },
                error : function(data){
                    console.log(data);
                }
            })
            console.log("Show Genre Data");
        } else {
            // GENERALLY SHOW ALL BOOK DATA 
            $.ajax({
                url : "ajax/get_book.php",
                type : "POST",
                contentType: "application/json",
                dataType : "json",
                data: JSON.stringify({ "show": "all" }),
                success : function(data){
                    renderData(data);
                    $("#totalBooks").text(data.num_books);                
                }
            })
            console.log("Show All Book Data");
        }

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
                    renderData(data);
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
                    renderData(data)
                }
            })
            console.log("Sort By : " + sort_by);
        })

        
        // SWITCH BETWEEN VIEW - TABLE / GRID 
        var display = "grid";
        $("#bookTable").hide();
        $("#bookGrid").show();
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

            window.location.href = "bookDetails.php?id=" + book_id;
        })


        // RENDER DATA 
        function renderData(data){
            
            // TABLE
            $("#bookTableBody").empty();
            let row = "";

            if(data.data.length == 0){
                row += `
                    <tr>
                        <td colspan="8" style="text-align: center; padding: 30px; font-size: 20px; font-weight: 600; color: #000;">No Books Found</td>
                    </tr>
                `
            }
            data.data.forEach((element, index) => {
                row += `
                    <tr >
                        <td> ${index+1}</td>
                        <td class="truncateText">${element.book_name}</td>
                        <td class="truncateText">${element.author} (${element.year})</td>
                        <td style="color : ${element.status != 'Active' ? 'tomato' : ''};">BHB${element.book_id}</td>
                        <td>${element.genre_name}</td>
                        <td>${element.issued_count}/${parseInt(element.stock) + parseInt(element.issued_count)}</td>
                        <td><button class="bookDetailsBtn">Details</button></td>
                    </tr>
                `;
                
            });
            $("#bookTableBody").html(row).hide().fadeIn(200);
            

            // GRID 
            $(".grid-container").empty();
            data.data.forEach(element =>{
                $(".grid-container").append(`
                    <div class="grid-item">
                        <img src="res/uploads/book_cover/${(element.book_cover == null || element.book_cover == "" ? "default.jpg" : element.book_cover)}" alt="Book Cover" >
                        <div class="book-info">
                            <h3 class="truncateText">${element.book_name}</h3>
                            <p>Genre : ${element.genre_name}</p>
                            <p class="truncateText">${element.author}</p>
                            <p>Release Year : ${element.year}</p>
                            <p>ISBN/Code : <span style="color : ${element.status != 'Active' ? 'tomato' : ''};">BHB${element.book_id}</span></p>
                            <p>Available Copies : ${element.stock}</p>
                            <p>Issued : ${element.issued_count} times</p>
                            <p>Status : <span style="color : ${element.status != 'Active' ? 'tomato' : ''};">${element.status}</span></p>
                            <button class="bookDetailsBtn">Details</button>
                        </div>
                    </div>
                `);
            });

            console.log('Data Rendered');
        }



        // TOASTIFY
        // const urlParams = new URLSearchParams(window.location.search);
        if (params.get('status') === '1') {
            Toastify({
                text: "Book added successfully!",
                duration: 5000,
                gravity: "top",
                position: "center",
                stopOnFocus: true

            }).showToast();

        }
        else if(params.get('status') === '3'){
            Toastify({
                text: "Book deleted successfully!",
                duration: 5000,
                gravity: "top",
                position: "center",
                stopOnFocus: true

            }).showToast();
        }
        else if(params.get('error') === 'book_not_found'){
            Toastify({
                text: "Book not found!",
                duration: 5000,
                gravity: "top",
                position: "center",
                backgroundColor: "tomato",
                stopOnFocus: true

            }).showToast();
        }
        history.replaceState(null, "", window.location.pathname);



    }) // END OF DOCUMENT READY
</script>