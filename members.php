<?php include_once('header.php'); ?>

<body class="landing-body">
    <?php include_once('sidebar.php'); ?>

    <div class="content">
        <!-- CONTENT - MEMBERS -->
        <section id="members">
            <div class="top-bar">
                <h3>Total Members : <span>147</span></h3>

                <div class="search">
                    <svg width="64px" height="64px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15.7955 15.8111L21 21M18 10.5C18 14.6421 14.6421 18 10.5 18C6.35786 18 3 14.6421 3 10.5C3 6.35786 6.35786 3 10.5 3C14.6421 3 18 6.35786 18 10.5Z" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                    <input type="text" placeholder="Search Here">
                </div>

                <button id="addMemberBtn">Add Member</button>
            </div>

            <!-- MEMBERS - TABLE -->
            <div class="member-table">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>ID</th>
                            <th>Joined</th>
                            <th>Issued</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>John Doe</td>
                            <td>BHM125486</td>
                            <td>2022-01-01</td>
                            <td>5</td>
                            <td>01654782365</td>
                            <td>Active</td>
                            <td><button id="memberDetailsBtn">Details</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- MEMBERS - DETAILS -->
            <div id="memberDetailsContainer">
                <div class="top-barM">
                    <svg id="backBtnMemberDetails" width="64px" height="64px" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" fill="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <defs> <style>.cls-1{fill:none;stroke:#ffffff;stroke-linecap:round;stroke-linejoin:round;stroke-width:20px;}</style> </defs> <g data-name="Layer 2" id="Layer_2"> <g data-name="E421, Back, buttons, multimedia, play, stop" id="E421_Back_buttons_multimedia_play_stop"> <circle class="cls-1" cx="256" cy="256" r="246"></circle> <line class="cls-1" x1="352.26" x2="170.43" y1="256" y2="256"></line> <polyline class="cls-1" points="223.91 202.52 170.44 256 223.91 309.48"></polyline> </g> </g> </g></svg>
                    <h3>Member Information</h3>
                </div>
                <div class="member-info-container">
                    <div>
                        <img src="res/uploads/members/1.jpg" alt="member">
                        
                        <div class="member-info">
                            <p>Name: <span>John Doe</span></p>
                            <p>Phone: <span>01654782365</span></p>
                            <p>E-mail: <span>johndoe5211@gmail.com</span></p>
                            <p>Address: <span>Bhairab Bazar, Bhairab Kishoreganj</span></p>
                        </div>
                    </div>

                    <div class="member-mgmt">
                        <div>
                            <button>Edit</button>
                            <button>Inactive</button>
                            <button>Delete</button>
                        </div>
                        <p>Member ID : <span>BHM0001</span></p>
                        <p>Join Date : <span>29/8/2025</span></p>
                        <p>Renew Date : <span>29/8/2026</span></p>
                        <p>Pending Return : <span>2</span></p>
                    </div>
                </div>
                <div class="member-issue-table">
                    <div class="bar">
                        <div class="search">
                            <svg width="64px" height="64px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15.7955 15.8111L21 21M18 10.5C18 14.6421 14.6421 18 10.5 18C6.35786 18 3 14.6421 3 10.5C3 6.35786 6.35786 3 10.5 3C14.6421 3 18 6.35786 18 10.5Z" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                            <input type="text" placeholder="Search Here">
                        </div>

                        <div>
                            <button>Issue Books</button>
                            <button>Return Books</button>
                        </div>
                    </div>

                    <div class="member-details-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Book Name</th>
                                    <th>ISBN/Code</th>
                                    <th>Genre</th>
                                    <th>Issue Date</th>
                                    <th>Return Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Fifty Shades of Gay</td>
                                    <td>BHM25031</td>
                                    <td>Adult</td>
                                    <td>25 Aug 2025</td>
                                    <td>29 Aug 2025</td>
                                    <td><button>Details</button></td>
                                </tr>

                                <tr>
                                    <td>1</td>
                                    <td>Stepsister Chapter-1</td>
                                    <td>BHM25023</td>
                                    <td>Adult</td>
                                    <td>18 Aug 2025</td>
                                    <td>25 Aug 2025</td>
                                    <td><button>Details</button></td>
                                </tr>

                                <tr>
                                    <td>1</td>
                                    <td>69 Days Left</td>
                                    <td>BHM25084</td>
                                    <td>Adult</td>
                                    <td>10 Aug 2025</td>
                                    <td>18 Aug 2025</td>
                                    <td><button>Details</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- MEMBERS - ADD -->
            <div class="addMemberModal">
                 <div id="addBookFormContainer" class="form-container">
                    <div class="form-topbar">
                        <svg id="backBtnAddMemberForm" width="64px" height="64px" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" fill="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <defs> <style>.cls-1{fill:none;stroke:#ffffff;stroke-linecap:round;stroke-linejoin:round;stroke-width:20px;}</style> </defs> <g data-name="Layer 2" id="Layer_2"> <g data-name="E421, Back, buttons, multimedia, play, stop" id="E421_Back_buttons_multimedia_play_stop"> <circle class="cls-1" cx="256" cy="256" r="246"></circle> <line class="cls-1" x1="352.26" x2="170.43" y1="256" y2="256"></line> <polyline class="cls-1" points="223.91 202.52 170.44 256 223.91 309.48"></polyline> </g> </g> </g></svg>
                        <h3>Add Member</h3>
                    </div>
                    <div class="form-body">
                         <div class="uploadPreview">
                             <h3>Upload Cover</h3>
                             <label id="bookCoverUploadBtn" for="bookCoverUpload">Select</label>
                             <input type="file" id="bookCoverUpload">
     
                         </div>
                         <div class="form-fields">
                             <input type="text" placeholder="Member Name" required>
                             <input type="email" placeholder="Email">
                             <input type="number" placeholder="Phone" required>
                             <input type="text" placeholder="Address">

                             <select name="status" id="status">
                                 <option value="active">Active</option>
                                 <option value="inactive">Inactive</option>
                             </select>
                             <p>Member ID : BHM00005</p>
                             <p>Join Date : 29/8/2025</p>
                             <p>Renew Date : 29/8/2026</p>
                             <button>Add</button>
                         </div>
                    </div>
     
                 </div>
             </div>


        </section> <!-- MEMBERS ENDS -->
    </div>
</body>

<?php include_once('footer.php'); ?>