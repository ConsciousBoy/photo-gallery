<?php
session_start();
require_once __DIR__ . '/../controllers/AuthController.php';

$authController = new AuthController();
$error = '';

// If user is already logged in, redirect to gallery
if(isset($_SESSION['user_id'])) {
    header("Location: mainpage.php");
    exit();
}

// Handle registration
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $name = $_POST['name'] ?? '';
    $age = $_POST['age'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $result = $authController->register($username, $name, $age, $email, $password);
    
    if ($result === true) {
        header("Location: login.php");
        exit();
    } else if ($result === "username_exists") {
        $error = "Username already exists";
    } else if ($result === "email_exists") {
        $error = "Email already exists";
    } else {
        $error = "Registration failed";
    }
}

include 'header.php';
?>

<div class="auth-container">
    <div class="auth-box">
        <div class="auth-header">
            <i class="fas fa-user-plus auth-icon"></i>
            <h2>Create Account</h2>
            <p>Join our photo community</p>
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
                <input type="text" id="username" name="username" class="form-control" 
                       value="<?php echo htmlspecialchars($_POST['username'] ?? ''); ?>" required>
            </div>

            <div class="form-group">
                <label for="name">
                    <i class="fas fa-id-card"></i>
                    Full Name
                </label>
                <input type="text" id="name" name="name" class="form-control" 
                       value="<?php echo htmlspecialchars($_POST['name'] ?? ''); ?>" required>
            </div>

            <div class="form-group">
                <label for="age">
                    <i class="fas fa-birthday-cake"></i>
                    Age
                </label>
                <input type="number" id="age" name="age" class="form-control" 
                       value="<?php echo htmlspecialchars($_POST['age'] ?? ''); ?>" required>
            </div>

            <div class="form-group">
                <label for="email">
                    <i class="fas fa-envelope"></i>
                    Email
                </label>
                <input type="email" id="email" name="email" class="form-control" 
                       value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" required>
            </div>

            <div class="form-group">
                <label for="password">
                    <i class="fas fa-lock"></i>
                    Password
                </label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>

            <button type="submit" class="auth-button">
                <i class="fas fa-user-plus"></i>
                Create Account
            </button>
        </form>

        <div class="auth-footer">
            <p>Already have an account? <a href="login.php">Sign In</a></p>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?> 