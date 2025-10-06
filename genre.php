<?php include_once('header.php'); ?>

<body class="landing-body">
    <?php include_once('sidebar.php'); ?>

    <div class="content">
        <!-- CONTENT - GENRE -->
        <section id="genre">
            <div class="top-bar">
                <h3>Genre (17)</h3>
            </div>
            <div class="genre-container">
                <div class="genre-mgmt">
                    <div class="add-genre">
                        <h3>Add Genre</h3>
                        <div>
                            <input type="text" placeholder="Genre Name" id="genre_name">
                            <button id="addGenre">+</button>
                        </div>
                    </div>

                    <div class="edit-genre">
                        <div>
                            <h3>Edit Genre</h3>
                            <button id="deleteGenre">-</button>
                        </div>

                        <div>
                            <select name="select_genre" id="select_genre">
                                <!-- DYNAMICALLY APPENDING ALL GENRE -->
                                <option value="null">Select Genre</option>
                            </select>

                            <input type="text" placeholder="Genre Name" id="genreNewName">
                            
                            <button id="editGenre">></button>
                        </div>
                    </div>
                </div>

                <div class="genre-grid">
                    <!-- <a class="grid-item">
                        <img src="res/uploads/genre_cover/adult.jpg" alt="adult">
                        <h3>Adult</h3>
                        <p>69 Books</p>
                    </a> -->

                    <!-- <div class="grid-item">
                        <img src="res/uploads/genre_cover/comedy.jpg" alt="comedy">
                        <h3>Comedy</h3>
                        <p>420 Books</p>
                    </div>

                    <div class="grid-item">
                        <img src="res/uploads/genre_cover/fantasy.jpg" alt="fantasy">
                        <h3>Fantasy</h3>
                        <p>120 Books</p>
                    </div>

                    <div class="grid-item">
                        <img src="res/uploads/genre_cover/horror.jpg" alt="horror">
                        <h3>Horror</h3>
                        <p>666 Books</p>
                    </div>

                    <div class="grid-item">
                        <img src="res/uploads/genre_cover/novel.jpg" alt="novel">
                        <h3>Novel</h3>
                        <p>574 Books</p>
                    </div>

                    <div class="grid-item">
                        <img src="res/uploads/genre_cover/romantic.jpg" alt="romantic">
                        <h3>Romantic</h3>
                        <p>120 Books</p>
                    </div>

                    <div class="grid-item">
                        <img src="res/uploads/genre_cover/education.jpg" alt="education">
                        <h3>Education</h3>
                        <p>459 Books</p>
                    </div>

                    <div class="grid-item">
                        <img src="res/uploads/genre_cover/research.jpg" alt="research">
                        <h3>Research</h3>
                        <p>371 Books</p>
                    </div> -->

                </div>
            </div>
        </section> <!-- GENRE ENDS -->
    </div>
</body>
<?php include_once('footer.php'); ?>

<script>
    // GET ALL GENRE 
    $.ajax({
        url : "ajax/genre.php",
        method : "POST",
        dataType : "json",
        contentType : "application/json",
        data : JSON.stringify({"op" : "all"}),
        success : function(data){
            console.log(data);
            renderGenre(data);
        },
        error : function(err){
            console.log(err)
        }
    })


    function renderGenre(data){
        
        data.forEach(element => {

            // RENDER IN EDIT GENRE SELECT 
            $("#select_genre").append(`<option value="${element.genre_id}">${element.genre_name}</option>`)
            
            
            // RENDER IN PAGE
            let card = "";
            card+= 
            `<a href="books.php?genre=${element.genre_id}" class="grid-item">
                <img src="res/uploads/genre_cover/${element.genre_name.toLowerCase()}.jpg" onerror="this.src='res/uploads/genre_cover/default.png';" alt="${element.genre_name}">
                <h3>${element.genre_name}</h3>
                <p>${element.book_count} Books</p>
            </a>`
                
            $("#genre .genre-grid").append(card);
        })
    }


    // ADD GENRE
    $("#addGenre").click(function(){
        let genre_name = $("#genre_name").val();
        if(genre_name == "") return alert("Please enter genre name");
        let sure = confirm("Add Genre : "+genre_name);
        if(!sure) return;
        

        $.ajax({
            url : "ajax/genre.php",
            method : "POST",
            dataType : "json",
            contentType : "application/json",
            data : JSON.stringify({"op" : "add", "value" : genre_name}),
            success : function(data){
                console.log(data.success);
                location.reload();
            },
            error : function(err){
                console.log(err)
            }
        })
    });

    // DELETE GENRE 
    $("#deleteGenre").click(function(){
        let genre_id = $("#select_genre").val();
        let sure = confirm("Delete Genre : "+$("#select_genre option:selected").text());
        if(!sure) return;

        $.ajax({
            url : "ajax/genre.php",
            method : "POST",
            dataType : "json",
            contentType : "application/json",
            data : JSON.stringify({"op" : "delete", "value" : genre_id}),
            success : function(data){
                console.log(data.success);
                location.reload();
            },
            error : function(err){
                console.log(err)
            }
        })
    });

    // RENAME GENRE
    $("#editGenre").click(function(){
        let old_name = $("#select_genre option:selected").text();
        let new_name = $("#genreNewName").val();
        
        if(new_name == "") return alert("Please enter genre name");
        if(old_name == new_name) return alert("Please enter different genre name");
        if(old_name == "Select Genre") return alert("Please select genre to rename");
        let sure = confirm("Rename Genre : "+old_name+" to "+new_name);
        if(!sure) return;

        $.ajax({
            url : "ajax/genre.php",
            method : "POST",
            dataType : "json",
            contentType : "application/json",
            data : JSON.stringify({"op" : "rename", "old_name" : old_name, "new_name" : new_name}),
            success : function(data){
                console.log(data.success);
                location.reload();
            },
            error : function(err){
                console.log(err)
            }
        })
    });

</script>