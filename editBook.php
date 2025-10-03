<?php 
include_once('core/database.php');
include_once('header.php');



if (isset($_GET['book_id'])) {
    $book_id = $_GET['book_id'];
    $db = new database();
    $db->select("books", "*", null, "book_id = '$book_id'", null, null);
    $result = $db->get_result();
    $book = $result[0];

}else{
    header("Location: books.php");
}


?>
<body> 
    <div class="addBookModal">
        <div id="addBookFormContainer" class="form-container">
            <div class="form-topbar">
                <a href="books.php">
                    <svg width="64px" height="64px" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" fill="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <defs> <style>.cls-1{fill:none;stroke:#ffffff;stroke-linecap:round;stroke-linejoin:round;stroke-width:20px;}</style> </defs> <g data-name="Layer 2" id="Layer_2"> <g data-name="E421, Back, buttons, multimedia, play, stop" id="E421_Back_buttons_multimedia_play_stop"> <circle class="cls-1" cx="256" cy="256" r="246"></circle> <line class="cls-1" x1="352.26" x2="170.43" y1="256" y2="256"></line> <polyline class="cls-1" points="223.91 202.52 170.44 256 223.91 309.48"></polyline> </g> </g> </g></svg>
                </a>
                <h3>Edit Book | <?php echo $book['book_name']; ?> [BHB<?php echo $book['book_id']; ?>]</h3>
            </div>
            <div class="form-body">
                <div class="uploadPreview">
                    <h3>Upload Cover</h3>
                    <label id="bookCoverUploadBtn" for="bookCoverUpload">Select</label>
                    <input type="file" id="bookCoverUpload">

                </div>
                <div class="form-fields">
                    
                    <div>
                        <label for="book_name">Book Name</label>
                        <input type="text" name="book_name" value="<?php echo $book['book_name']; ?>" placeholder="Book Name" required>
                    </div>
                    
                    <div>
                        <label for="author">Author</label>
                        <input type="text" name="author" value="<?php echo $book['author']; ?>" placeholder="Author">
                    </div>
                    
                    <div>
                        <label for="publisher">Publisher</label>
                        <input type="text" name="publisher" value="<?php echo $book['publisher']; ?>" placeholder="Publisher">
                    </div>
                    
                    <div>
                        <label for="year">Year</label>
                        <input type="number" name="year" value="<?php echo $book['year']; ?>" placeholder="Year">
                    </div>
                    
                    <div>
                        <label for="genre_id">Genre</label>
                        <select name="genre_id" required>
                            <?php 
                            $db->select("genres", "*", null, null, null, null);
                            $genres = $db->get_result();
                            $selected_genre = $book['genre_id'];
                            foreach ($genres as $genre) {
                                ?>
                                <option <?php if($genre['genre_id'] == $selected_genre){ echo "selected"; } ?> value="<?php echo $genre['genre_id']; ?>"><?php echo $genre['genre_name']; ?></option>
                                <?php
                            } 
                            ?>
                        </select>
                    </div>

                    
                    <div>
                        <label for="stock">Stock</label>
                        <div>
                            <button class="decrement">-</button>
                            <input style="width: 100px;" type="number" name="stock" value="<?php echo $book['stock']; ?>" placeholder="Stock" required>
                            <button class="increment">+</button>
                        </div>
                    </div>
                    
                    <div>
                        <label for="status">Status</label>
                        <select name="status" style="width: 200px;">
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>
                    </div>

                    <button id="updateBookBtn">Update</button>
                </div>
            </div>
        </div>
    </div>
</body>
<?php include_once('footer.php'); ?>
<script>
    // Stock Buttons 
    $(".increment").click(function(){
        var stock = parseInt($("input[name='stock']").val());
        stock++;
        $("input[name='stock']").val(stock);
    });
    $(".decrement").click(function(){
        var stock = parseInt($("input[name='stock']").val());
        if(stock > 0){
            stock--;
            $("input[name='stock']").val(stock);
        }
    });

    // EDIT DATA 
    $("#updateBookBtn").click(function(e){
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
        $.ajax({
            url : "ajax/set_book.php",
            type : "POST", 
            contentType: "application/json",
            dataType : "json",
            data: JSON.stringify({ "set": "edit", "value": form_data, "book_id": "<?php echo $book['book_id']; ?>" }),
            success : function(data){
                window.location.href = "books.php?status="+data.status;
            },
            error : function(data){
                console.log(data);
            }
        })
        console.log("Data Updated")
    })
</script>