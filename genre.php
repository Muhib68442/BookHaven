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
                            <input type="text" placeholder="Genre Name">
                            <button>+</button>
                        </div>
                    </div>

                    <div class="edit-genre">
                        <div>
                            <h3>Edit Genre</h3>
                            <button>-</button>
                        </div>

                        <div>
                            <select name="select_genre" id="select_genre">
                                <option value="fantasy">Fantasy</option>
                                <option value="horror">Horror</option>
                                <option value="comedy">Comedy</option>
                                <option value="romantic">Romantic</option>
                                <option value="adult">Adult</option>
                            </select>

                            <input type="text" placeholder="Genre Name">
                            
                            <button>></button>
                        </div>
                    </div>
                </div>

                <div class="genre-grid">
                    <div class="grid-item">
                        <img src="res/uploads/genre_cover/adult.jpg" alt="adult">
                        <h3>Adult</h3>
                        <p>69 Books</p>
                    </div>

                    <div class="grid-item">
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
                    </div>

                </div>
            </div>
        </section> <!-- GENRE ENDS -->
    </div>
</body>
<?php include_once('footer.php'); ?>