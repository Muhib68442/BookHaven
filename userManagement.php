<?php 
include_once('header.php');
include_once('core/database.php');
?>
<body class="landing-body">
    <?php include_once('sidebar.php'); ?>
    <div class="content">
        <div class="userMgmtContainer">
            <h1>User Management</h1>
            <table>
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Full Name</th>
                        <th>Role</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>John Doe</td>
                        <td>John Doe</td>
                        <td>Admin</td>
                        <td>gXb0p@example.com</td>
                        <td>
                            <button class="editBtn">Edit</button>
                            <button class="deleteBtn">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
<?php include_once('footer.php'); ?>
<script>

</script>