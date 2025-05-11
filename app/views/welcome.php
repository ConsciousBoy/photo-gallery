<?php
session_start();
require_once __DIR__ . '/../controllers/AuthController.php';

$authController = new AuthController();
$isLoggedIn = isset($_SESSION['user_id']);

include 'header.php';
?>

<div class="about-container">
    <div class="about-hero">
        <div class="about-hero-content">
            <h1>Welcome to Yashar's Photo Gallery</h1>
            <?php if (!$isLoggedIn): ?>
                <div class="hero-buttons">
                    <a href="login.php" class="cta-button primary">
                        <i class="fas fa-sign-in-alt"></i>
                        Get Started
                    </a>
                    <a href="registration.php" class="cta-button secondary">
                        <i class="fas fa-user-plus"></i>
                        Create Account
                    </a>
                </div>
            <?php else: ?>
                <div class="hero-buttons">
                    <a href="mainpage.php" class="cta-button primary">
                        <i class="fas fa-images"></i>
                        View Gallery
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="about-content">
        <div class="about-section">
            <i class="fas fa-camera about-icon"></i>
            <h2>Discover Amazing Photos</h2>
            <p>Take a look at the captivating photos captured by Yashar Abbasieh. Discover unique perspectives and moments, all through Yashar's lens.</p>
        </div>

        <div class="about-section">
            <i class="fas fa-users about-icon"></i>
            <h2>Become a Member</h2>
            <p>Become a member safe and easy!</p>
        </div>

        <div class="about-section">
            <i class="fas fa-star about-icon"></i>
            <h2>Features</h2>
            <ul class="feature-list">
                <li><i class="fas fa-check"></i> Responsive design for all devices</li>
                <li><i class="fas fa-check"></i> User-friendly interface</li>
                <li><i class="fas fa-check"></i> Secure user authentication</li>
                <li><i class="fas fa-check"></i> Beautiful photo display</li>
            </ul>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?> 