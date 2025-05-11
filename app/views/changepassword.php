<?php
session_start();
require_once __DIR__ . '/../controllers/AuthController.php';

$authController = new AuthController();

$authController->checkAuth();
$userData = $authController->getUserData($_SESSION['user_id']);

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $currentPassword = $_POST['current_password'] ?? '';
    $newPassword = $_POST['new_password'] ?? '';
    $confirmPassword = $_POST['confirm_password'] ?? '';

    if(empty($currentPassword) || empty($newPassword) || empty($confirmPassword)) {
        $error = 'All fields are required';
    } elseif($newPassword !== $confirmPassword) {
        $error = 'New passwords do not match';
    } elseif(strlen($newPassword) < 6) {
        $error = 'New password must be at least 6 characters long';
    } else {
        if($authController->changePassword($_SESSION['user_id'], $currentPassword, $newPassword)) {
            $success = 'Password changed successfully';
        } else {
            $error = 'Current password is incorrect';
        }
    }
}

include 'header.php';
?>

<div class="edit-profile-container">
    <div class="edit-profile-box">
        <div class="edit-profile-header">
            <i class="fas fa-key"></i>
            <h2>Change Password</h2>
            <p>Update your account password</p>
        </div>

        <?php if($error): ?>
            <div class="error-message">
                <i class="fas fa-exclamation-circle"></i>
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <?php if($success): ?>
            <div class="success-message">
                <i class="fas fa-check-circle"></i>
                <?php echo $success; ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="" class="edit-profile-form">
            <div class="form-group">
                <label for="current_password">
                    <i class="fas fa-lock"></i>
                    Current Password
                </label>
                <input type="password" id="current_password" name="current_password" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="new_password">
                    <i class="fas fa-key"></i>
                    New Password
                </label>
                <input type="password" id="new_password" name="new_password" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="confirm_password">
                    <i class="fas fa-key"></i>
                    Confirm New Password
                </label>
                <input type="password" id="confirm_password" name="confirm_password" class="form-control" required>
            </div>

            <div class="form-actions">
                <button type="submit" class="save-button">
                    <i class="fas fa-save"></i>
                    Change Password
                </button>
                <a href="profile.php" class="cancel-button">
                    <i class="fas fa-times"></i>
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>

<?php include 'footer.php'; ?> 