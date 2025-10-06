<!-- ADD BOOK -->
<?php 
include_once('header.php');
include('core/database.php');


?>

<body> 
    <div class="addBookModal">
        <div id="addBookFormContainer" class="form-container">
            <div class="form-topbar">
                <a href="books.php">
                    <svg width="64px" height="64px" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" fill="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <defs> <style>.cls-1{fill:none;stroke:#ffffff;stroke-linecap:round;stroke-linejoin:round;stroke-width:20px;}</style> </defs> <g data-name="Layer 2" id="Layer_2"> <g data-name="E421, Back, buttons, multimedia, play, stop" id="E421_Back_buttons_multimedia_play_stop"> <circle class="cls-1" cx="256" cy="256" r="246"></circle> <line class="cls-1" x1="352.26" x2="170.43" y1="256" y2="256"></line> <polyline class="cls-1" points="223.91 202.52 170.44 256 223.91 309.48"></polyline> </g> </g> </g></svg>
                </a>
                <h3>Add Book</h3>
            </div>
            <div class="form-body">
                <div class="uploadPreview">
                    <div class="uploadPreview">
                        <h3>Upload Cover</h3>
                        <label id="bookCoverUploadBtn" for="bookCoverUpload">Select</label>
                        <input type="file" id="bookCoverUpload" style="display:none;">
                        <button id="uploadCoverBtn">Upload</button>
                    </div>
                </div>
                <div class="form-fields">
                    <input type="hidden" name="book_cover" id="bookCoverHidden">
                    <input type="text" name="book_name" placeholder="Book Name" required>
                    <input type="text" name="author" placeholder="Author">
                    <input type="text" name="publisher" placeholder="Publisher">
                    <input type="number" name="year" placeholder="Year">
                    <select name="genre_id" required>
                        <?php 
                            $db = new database();
                            $db->select("genres", "*", null, null, null, null);
                            $genres = $db->get_result();
                            foreach ($genres as $genre) {
                                ?>
                                <option value="<?php echo $genre['genre_id']; ?>"><?php echo $genre['genre_name']; ?></option>
                                <?php
                            }
                        ?>
                    </select>
                    <input type="text" name="book_id" placeholder="ISBN/code" oninput="this.value = this.value.trim() ? this.value : ''"/>

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
</body>

<?php include_once('footer.php'); ?>
<script>
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
            window.location.href = ('books.php');
        }, 
        error : function(data){
            console.log(data);
        }
    })

})

// PREVIEW
$("#bookCoverUpload").on("change", function(){
    const file = this.files[0];
    if(file){
        const reader = new FileReader();
        reader.onload = function(e){
            $(".uploadPreview").css({
                "background-image": `url(${e.target.result})`,
                "background-size": "cover",
                "background-position": "center"
            });
        }
        reader.readAsDataURL(file);
    }
});


$("#uploadCoverBtn").click(function(){
    const file = $("#bookCoverUpload")[0].files[0];
    const ext = file.name.split('.').pop();
    const randomName = Date.now() + "_" + Math.floor(Math.random() * 1000) + "." + ext;

    const formData = new FormData();
    formData.append("book_cover", file);
    formData.append("filename", randomName);
    formData.append("image", "book");

    $.ajax({
        url: "ajax/upload.php",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        dataType: "json",
        success: function(res){
            if(res.status === "success"){
                $("#bookCoverHidden").val(randomName); 
            }
        }
    });
});
</script>

