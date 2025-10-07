<?php include_once('header.php'); ?>

<body class="landing-body">
    <?php include_once('sidebar.php'); ?>

    <div class="content">
        <!-- CONTENT - MEMBERS -->
        <section id="members">
            <div class="top-bar">
                <h3>Total Members : <span id="totalMembers"></span></h3>

                <div class="search">
                    <svg width="64px" height="64px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15.7955 15.8111L21 21M18 10.5C18 14.6421 14.6421 18 10.5 18C6.35786 18 3 14.6421 3 10.5C3 6.35786 6.35786 3 10.5 3C14.6421 3 18 6.35786 18 10.5Z" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                    <input type="text" placeholder="Search Here">
                </div>

                <div class="sort-table">
                    <svg width="64px" height="64px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M13 12H21M13 8H21M13 16H21M6 7V17M6 17L3 14M6 17L9 14" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                    <select name="sort" id="sortMemberData">
                        <option value="default">Default</option>
                        <option value="full_name">Name</option>
                        <option value="member_id">ID</option>
                        <option value="join_date">Joined</option>
                        <option value="mostIssued">Most Issued</option>
                        <option value="status">Status</option>
                    </select>
                </div>

                <a href="addMember.php">Add Member</a>
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
                    <tbody id="memberTableBody">
                        <!-- <tr>
                            <td>1</td>
                            <td>John Doe</td>
                            <td>BHM125486</td>
                            <td>2022-01-01</td>
                            <td>5</td>
                            <td>01654782365</td>
                            <td>Active</td>
                            <td><button id="memberDetailsBtn">Details</button></td>
                        </tr> -->
                    </tbody>
                </table>
            </div>

        </section> <!-- MEMBERS ENDS -->
    </div>
</body>

<?php include_once('footer.php'); ?>

<script>

    // RENDER TABLE 
    function renderTable(data){
        if(!data){
            $.ajax({
                url : 'ajax/get_members.php',
                type : 'POST', 
                dataType : 'json', 
                contentType : 'application/json',
                data : JSON.stringify({"show" : "all"}),
                success : function(data){
                    renderTable(data);
                }, 
                error : function(err){
                    console.log(err);
                }
            })
        }else {
            console.log(data);

            let tableBody = $("#memberTableBody");
            tableBody.empty();
            let html = "";
            data.data.forEach((element, index) => {
                html += `
                    <tr>
                        <td>${index+1}</td>
                        <td>${element.full_name}</td>
                        <td style="${element.status == 'Inactive' ? 'color : tomato' : ''}">BHM${element.member_id}</td>
                        <td>${new Date(element.join_date).toLocaleDateString('en-GB')}</td>
                        <td>${element.issues}</td>
                        <td>${element.phone}</td>
                        <td style="${element.status == 'Inactive' ? 'color : tomato' : ''}">${element.status}</td>
                        <td><button><a href="memberDetails.php?id=${element.member_id}">Details</a></button></td>
                    </tr>
                `
            })
            tableBody.html(html).hide().fadeIn(200);
            $("#totalMembers").text(data.num_members);
            

        }
    }
    renderTable();


    // SEARCH
    $(".search input").on("input", function(){
        $.ajax({
            url : 'ajax/get_members.php',
            type : 'POST', 
            dataType : 'json', 
            contentType : 'application/json',
            data : JSON.stringify({"show" : "search", "value" : $(this).val()}),
            success : function(data){
                renderTable(data);
            }, 
            error : function(err){
                console.log(err);
            }
        })
    })


    // SORT
    $("#sortMemberData").on("change", function(){
        $.ajax({
            url : 'ajax/get_members.php',
            type : 'POST', 
            dataType : 'json', 
            contentType : 'application/json',
            data : JSON.stringify({"show" : "sort", "value" : $(this).val()}),
            success : function(data){
                renderTable(data);
            }, 
            error : function(err){
                console.log(err);
            }
        })
        if($(this).val() == "default"){
            renderTable();
        }
    })

    // ADD MEMBER 
    $("#addMember").click(function(){
        location.href = "addMember.php";
    })

    // TOASTIFY
        const params = new URLSearchParams(window.location.search);
        if (params.get('status') === '1') {
            Toastify({
                text: "Member added successfully!",
                duration: 5000,
                gravity: "top",
                position: "center",
                stopOnFocus: true

            }).showToast();

        }else if(params.get('status') === '3'){
            Toastify({
                text: "Member deleted successfully!",
                duration: 5000,
                gravity: "top",
                position: "center",
                stopOnFocus: true

            }).showToast();
        }
        
        history.replaceState(null, "", window.location.pathname);
    
    
</script>