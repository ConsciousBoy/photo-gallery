<?php
session_start();
require_once __DIR__ . '/../controllers/AuthController.php';
require_once __DIR__ . '/../controllers/PhotoController.php';

$authController = new AuthController();
$photoController = new PhotoController();

$authController->checkAuth();
$userData = $authController->getUserData($_SESSION['user_id']);

include 'header.php';
?>

<div class="profile-container">
    <div class="profile-header">
        <div class="profile-avatar">
            <i class="fas fa-user"></i>
        </div>
        <div class="profile-info">
           <h2><?php echo htmlspecialchars($userData['name']); ?></h2>
            <p class="username">@<?php echo htmlspecialchars($userData['username']); ?></p>
            <a href="editprofile.php" class="edit-profile-btn">
                <i class="fas fa-edit"></i>
                Edit Profile
            </a>
        </div>
    </div>

    <div class="profile-content">
        <div class="profile-section">
            <h2>Personal Information</h2>
            <div class="info-grid">
                <div class="info-item">
                    <i class="fas fa-envelope"></i>
                    <div class="info-details">
                        <label>Email</label>
                        <p><?php echo htmlspecialchars($userData['email']); ?></p>
                    </div>
                </div>
                <div class="info-item">
                    <i class="fas fa-birthday-cake"></i>
                    <div class="info-details">
                        <label>Age</label>
                        <p><?php echo htmlspecialchars($userData['age']); ?> years old</p>
                    </div>
                </div>
                <div class="info-item">
                    <i class="fas fa-calendar-alt"></i>
                    <div class="info-details">
                        <label>Member Since</label>
                        <p><?php echo date('F Y', strtotime($userData['created_at'])); ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="profile-section">
            <h2>Account Settings</h2>
            <div class="settings-grid">
                <a href="changepassword.php" class="settings-card">
                    <i class="fas fa-key"></i>
                    <h3>Change Password</h3>
                    <p>Update your password</p>
                </a>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?> 