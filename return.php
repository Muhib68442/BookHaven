<?php include_once('header.php'); ?>

<body class="landing-body">
    <?php include_once('sidebar.php'); ?>

    <div class="content">
        <!-- CONTENT - RETURN -->
        <section id="return">
            <div class="return-search-container">
                <div class="bar">
                    <h3>Return Book</h3>
                </div>
                <div class="body">
                    <div>
                        <p>Issue ID</p>
                        <input type="text" placeholder="BHI-----">
                    </div>
                    <div>
                        <p>Member ID</p>
                        <input type="text" placeholder="BHM-----">
                    </div>
                    <div>
                        <p>Book ID</p>
                        <input type="text" placeholder="BHB-----">
                    </div>
                    <button>Search</button>
                </div>
            </div>

            <div class="return-summary-container">
                <div class="bar">
                    <h3>Return Summary</h3>
                </div>
                <div class="body">
                    <div>
                        <h3>Book Name</h3>
                        <p>The Story of a Lonely Boy</p>
                    </div>
                    <div>
                        <h3>Author</h3>
                        <p>F. Kaolin</p>
                    </div>
                    <div>
                        <h3>Member Name</h3>
                        <p>Rahat Hossain</p>
                    </div>
                    <div>
                        <h3>Issue Date</h3>
                        <p>28 Aug 2025</p>
                    </div>
                    <button>Return</button>
                </div>
            </div>
        </section> <!-- RETURN ENDS -->
    </div>
</body>

<?php include_once('footer.php'); ?>
