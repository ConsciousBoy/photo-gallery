<?php
session_start();
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../controllers/PhotoController.php';
require_once __DIR__ . '/../controllers/AuthController.php';

$authController = new AuthController();
$photoController = new PhotoController();

$authController->checkAuth();

$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$photos = $photoController->getAllPhotos($currentPage);
$totalPages = $photoController->getTotalPages();

include 'header.php';
?>

<div class="main-container">
    <div class="hero-section">
        <div class="hero-content">
            <h1 style="text-align: center;">Discover Amazing Photos</h1>
            <p style="text-align: center;">Explore our collection of stunning photography</p>
        </div>
    </div>

    <div class="gallery-container">
        <div class="gallery-header">
            <h2>Featured Photos</h2>
        </div>

        <div class="gallery">
            <?php foreach ($photos as $photo): ?>
                <a href="photo.php?id=<?php echo $photo['id']; ?>" class="gallery-item">
                    <img src="../public/images/<?php echo basename(htmlspecialchars($photo['file_path'])); ?>" alt="<?php echo htmlspecialchars($photo['title']); ?>">
                </a>
            <?php endforeach; ?>
        </div>

        <?php if ($totalPages > 1): ?>
            <div class="pagination">
                <?php if ($currentPage > 1): ?>
                    <a href="?page=<?php echo $currentPage - 1; ?>" class="pagination-btn prev">
                        <i class="fas fa-chevron-left"></i> Previous
                    </a>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <a href="?page=<?php echo $i; ?>" class="pagination-btn <?php echo $i === $currentPage ? 'active' : ''; ?>">
                        <?php echo $i; ?>
                    </a>
                <?php endfor; ?>

                <?php if ($currentPage < $totalPages): ?>
                    <a href="?page=<?php echo $currentPage + 1; ?>" class="pagination-btn next">
                        Next <i class="fas fa-chevron-right"></i>
                    </a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php include 'footer.php'; ?>