<?php include_once('header.php'); ?>

<body class="landing-body">
    <?php include_once('sidebar.php'); ?>
    
    <div class="content">
        <!-- CONTENT - ISSUS -->
        <section id="issue">
            <div class="top-bar">
                <h3>Issue Book</h3>
                <p>Total Issued Books : <span>147</span></p>
            </div>

            <div class="issue-container">
                <div class="btn-bar">
                    <button id="selectBookBtn">Select Book</button>
                    <button id="selectMemberBtn">Select Member</button>
                    <button id="selectSummaryBtn">Summary</button>
                </div>

                <div class="searchbar">
                    <svg width="64px" height="64px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15.7955 15.8111L21 21M18 10.5C18 14.6421 14.6421 18 10.5 18C6.35786 18 3 14.6421 3 10.5C3 6.35786 6.35786 3 10.5 3C14.6421 3 18 6.35786 18 10.5Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                    <input type="text" placeholder="Search">
                </div>

                <div class="dynamic-table">
                    <div class="issue-book-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Book Name</th>
                                    <th>ISBN/Code</th>
                                    <th>Genre</th>
                                    <th>Author</th>
                                    <th>Status</th>
                                    <th>Select</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>End of the dawn C-1</td>
                                    <td>BHB13165</td>
                                    <td>Fantasy</td>
                                    <td>F. Kaolin</td>
                                    <td>Available</td>
                                    <td><button id="selectBookForIssue">Select</button></td>
                                </tr>
                                <tr>
                                    <td>End of the dawn C-2</td>
                                    <td>BHB13165</td>
                                    <td>Fantasy</td>
                                    <td>F. Kaolin</td>
                                    <td>Available</td>
                                    <td><button id="selectBookForIssue">Select</button></td>
                                </tr>
                                <tr>
                                    <td>End of the dawn C-3</td>
                                    <td>BHB13115</td>
                                    <td>Fantasy</td>
                                    <td>F. Kaolin</td>
                                    <td>Not Available</td>
                                    <td><button id="selectBookForIssue">Select</button></td>
                                </tr>
                                <tr>
                                    <td>End of the dawn C-3</td>
                                    <td>BHB13115</td>
                                    <td>Fantasy</td>
                                    <td>F. Kaolin</td>
                                    <td>Not Available</td>
                                    <td><button id="selectBookForIssue">Select</button></td>
                                </tr>
                                <tr>
                                    <td>End of the dawn C-3</td>
                                    <td>BHB13115</td>
                                    <td>Fantasy</td>
                                    <td>F. Kaolin</td>
                                    <td>Not Available</td>
                                    <td><button id="selectBookForIssue">Select</button></td>
                                </tr>
                                <tr>
                                    <td>End of the dawn C-3</td>
                                    <td>BHB13115</td>
                                    <td>Fantasy</td>
                                    <td>F. Kaolin</td>
                                    <td>Not Available</td>
                                    <td><button id="selectBookForIssue">Select</button></td>
                                </tr>
                                <tr>
                                    <td>End of the dawn C-3</td>
                                    <td>BHB13115</td>
                                    <td>Fantasy</td>
                                    <td>F. Kaolin</td>
                                    <td>Not Available</td>
                                    <td><button id="selectBookForIssue">Select</button></td>
                                </tr>
                                <tr>
                                    <td>End of the dawn C-3</td>
                                    <td>BHB13115</td>
                                    <td>Fantasy</td>
                                    <td>F. Kaolin</td>
                                    <td>Not Available</td>
                                    <td><button id="selectBookForIssue">Select</button></td>
                                </tr>
                                <tr>
                                    <td>End of the dawn C-3</td>
                                    <td>BHB13115</td>
                                    <td>Fantasy</td>
                                    <td>F. Kaolin</td>
                                    <td>Not Available</td>
                                    <td><button>Select</button></td>
                                </tr>
                                <tr>
                                    <td>End of the dawn C-3</td>
                                    <td>BHB13115</td>
                                    <td>Fantasy</td>
                                    <td>F. Kaolin</td>
                                    <td>Not Available</td>
                                    <td><button>Select</button></td>
                                </tr>
                                <tr>
                                    <td>End of the dawn C-3</td>
                                    <td>BHB13115</td>
                                    <td>Fantasy</td>
                                    <td>F. Kaolin</td>
                                    <td>Not Available</td>
                                    <td><button>Select</button></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="issue-member-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Member Name</th>
                                    <th>Member ID</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Select</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Aminul Islam</td>
                                    <td>BHM254136</td>
                                    <td>01456871232</td>
                                    <td>aminul451@gmail.com</td>
                                    <td>Active</td>
                                    <td><button id="selectMemberForIssue">Select</button></td>
                                </tr>
                                <tr>
                                    <td>Aminul Islam</td>
                                    <td>BHM254136</td>
                                    <td>01456871232</td>
                                    <td>aminul451@gmail.com</td>
                                    <td>Active</td>
                                    <td><button id="selectMemberForIssue">Select</button></td>
                                </tr>
                                <tr>
                                    <td>Aminul Islam</td>
                                    <td>BHM254136</td>
                                    <td>01456871232</td>
                                    <td>aminul451@gmail.com</td>
                                    <td>Active</td>
                                    <td><button id="selectMemberForIssue">Select</button></td>
                                </tr>
                                <tr>
                                    <td>Aminul Islam</td>
                                    <td>BHM254136</td>
                                    <td>01456871232</td>
                                    <td>aminul451@gmail.com</td>
                                    <td>Active</td>
                                    <td><button id="selectMemberForIssue">Select</button></td>
                                </tr>
                                <tr>
                                    <td>Aminul Islam</td>
                                    <td>BHM254136</td>
                                    <td>01456871232</td>
                                    <td>aminul451@gmail.com</td>
                                    <td>Active</td>
                                    <td><button id="selectMemberForIssue">Select</button></td>
                                </tr>
                                <tr>
                                    <td>Aminul Islam</td>
                                    <td>BHM254136</td>
                                    <td>01456871232</td>
                                    <td>aminul451@gmail.com</td>
                                    <td>Active</td>
                                    <td><button id="selectMemberForIssue">Select</button></td>
                                </tr>
                                <tr>
                                    <td>Aminul Islam</td>
                                    <td>BHM254136</td>
                                    <td>01456871232</td>
                                    <td>aminul451@gmail.com</td>
                                    <td>Active</td>
                                    <td><button id="selectMemberForIssue">Select</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="issue-summary">
                        <div>
                            <h3>Book Info</h3>
                            <p>End of the dawn C-3</p>
                            <p>by F. Kaolin</p>
                            <p>Genre : Fantasy</p>
                            <p>ISBN/Code : BHB13115</p>
                        </div>
                        <div>
                            <h3>Member Info</h3>
                            <p>Name : Aminul Islam</p>
                            <p>Member ID : BHM254136</p>
                            <p>Phone : 01456871232</p>
                            <p>Email : aminul451@gmail.com</p>
                        </div>
                        <div>
                            <h3>Issue Info</h3>
                            <p>Issue ID : BHI-----</p>
                            <p>Issue Date : 01/01/2022</p>
                            <p>Return Date : 01/01/2022</p>
                            <button>Issue</button>
                            <!-- <button id="resetIssue">Reset</button> -->
                        </div>
                    </div>
                </div>
            </div>
        </section> <!-- ISSUS ENDS -->
    </div>
</body>

<?php include_once('footer.php'); ?>