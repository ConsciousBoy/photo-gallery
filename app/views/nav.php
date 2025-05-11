<nav class="nav-container">
    <div class="container nav-content">
        <a href="mainpage.php" class="nav-logo">Photo Gallery</a>
        <div class="nav-links">
            <a href="mainpage.php" class="nav-link">Home</a>
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="profile.php" class="nav-link">Profile</a>
                <a href="logout_handler.php" class="nav-link">Logout</a>
            <?php else: ?>
                <a href="login.php" class="nav-link">Login</a>
                <a href="registration.php" class="nav-link">Register</a>
            <?php endif; ?>
        </div>
    </div>
</nav> 