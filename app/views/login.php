<?php
session_start();
require_once __DIR__ . '/../controllers/AuthController.php';

$authController = new AuthController();

// If user is already logged in, redirect to gallery
if(isset($_SESSION['user_id'])) {
    header("Location: mainpage.php");
    exit();
}

// Let AuthController handle the login
$error = $authController->login();

// If we get here, it means we need to show the login form
include 'header.php';
?>

<div class="auth-container">
    <div class="auth-box">
        <div class="auth-header">
            <i class="fas fa-sign-in-alt auth-icon"></i>
            <h2>Welcome Back</h2>
            <p>Sign in to continue to Photo Gallery</p>
        </div>

        <?php if($error): ?>
            <div class="error-message">
                <i class="fas fa-exclamation-circle"></i>
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="" class="auth-form">
            <div class="form-group">
                <label for="username">
                    <i class="fas fa-user"></i>
                    Username
                </label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="password">
                    <i class="fas fa-lock"></i>
                    Password
                </label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>

            <button type="submit" class="auth-button">
                <i class="fas fa-sign-in-alt"></i>
                Sign In
            </button>
        </form>

        <div class="auth-footer">
            <p>Don't have an account? <a href="registration.php">Create Account</a></p>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?> 