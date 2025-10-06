<?php include_once('header.php'); ?>
<?php include_once('core/database.php'); ?>
<section class="login-container">
    <div class="login-card">
        <div class="branding">
            <img src="res/logo/favicon.png" alt="logo">
            <h3>BookHaven</h3>
        </div>
        <div class="login-form-container">
            <form action="core/auth.php" method="POST">
                <input type="email" name="email" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <div>
                    <button type="submit" name="login">Login</button>
                </div>
            </form>
        </div>
    </div>
</section>
<?php include_once('footer.php'); ?>