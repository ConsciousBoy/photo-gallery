<?php
session_start();
require_once __DIR__ . '/../controllers/AuthController.php';

$authController = new AuthController();

$authController->checkAuth();
$userData = $authController->getUserData($_SESSION['user_id']);
$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $name = $_POST['name'] ?? '';
    $age = $_POST['age'] ?? '';
    $email = $_POST['email'] ?? '';

    if(empty($username) || empty($name) || empty($age) || empty($email)) {
        $error = 'All fields are required';
    } else {
        if($authController->updateProfile($_SESSION['user_id'], $username, $name, $age, $email)) {
            $success = 'Profile updated successfully';
            $userData = $authController->getUserData($_SESSION['user_id']); // Refresh user data
            header("Location: profile.php");
            exit();
        } else {
            $error = "Update failed. Username or email might already exist.";
        }
    }
}

include 'header.php';
?>

<div class="edit-profile-container">
    <div class="edit-profile-box">
        <div class="edit-profile-header">
            <i class="fas fa-user-edit"></i>
            <h2>Edit Profile</h2>
            <p>Update your personal information</p>
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
                <label for="username">
                    <i class="fas fa-user"></i>
                    Username
                </label>
                <input type="text" id="username" name="username" class="form-control" 
                       value="<?php echo htmlspecialchars($userData['username']); ?>" required>
            </div>

            <div class="form-group">
                <label for="name">
                    <i class="fas fa-id-card"></i>
                    Full Name
                </label>
                <input type="text" id="name" name="name" class="form-control" 
                       value="<?php echo htmlspecialchars($userData['name']); ?>" required>
            </div>

            <div class="form-group">
                <label for="age">
                    <i class="fas fa-birthday-cake"></i>
                    Age
                </label>
                <input type="number" id="age" name="age" class="form-control" 
                       value="<?php echo htmlspecialchars($userData['age']); ?>" required>
            </div>

            <div class="form-group">
                <label for="email">
                    <i class="fas fa-envelope"></i>
                    Email
                </label>
                <input type="email" id="email" name="email" class="form-control" 
                       value="<?php echo htmlspecialchars($userData['email']); ?>" required>
            </div>

            <div class="form-actions">
                <button type="submit" class="save-button">
                    <i class="fas fa-save"></i>
                    Save Changes
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