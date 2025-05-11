<?php
session_start();
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../controllers/PhotoController.php';
require_once __DIR__ . '/../controllers/AuthController.php';

$authController = new AuthController();
$photoController = new PhotoController();

$authController->checkAuth();

$photoId = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$photo = $photoController->getPhotoById($photoId);

if (!$photo) {
    header("Location: mainpage.php");
    exit();
}

include 'header.php';
?>

<div class="photo-detail-container">
    <div class="photo-detail-header">
        <a href="mainpage.php" class="back-button">
            <i class="fas fa-arrow-left"></i> Back to Gallery
        </a>
        <h1><?php echo htmlspecialchars($photo['title']); ?></h1>
    </div>

    <div class="photo-detail-image">
        <img src="../public/images/<?php echo basename(htmlspecialchars($photo['file_path'])); ?>" alt="<?php echo htmlspecialchars($photo['title']); ?>">
    </div>

    <div class="photo-detail-info">
        <h2>Photo Details</h2>
        <div class="info-grid">
            <div class="info-item">
                <i class="fas fa-calendar"></i>
                <div class="info-content">
                    <label>Upload Date</label>
                    <p><?php echo date('F j, Y', strtotime($photo['created_at'])); ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?> 