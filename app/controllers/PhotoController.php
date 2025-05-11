<?php
require_once __DIR__ . '/../models/PhotoModel.php';

class PhotoController {
    private $photoModel;
    private $photosPerPage = 9;

    public function __construct() {
        $this->photoModel = new PhotoModel();
    }

    // Currently used methods for photo display
    public function getAllPhotos($page = 1) {
        $offset = ($page - 1) * $this->photosPerPage;
        return $this->photoModel->getAllPhotos($this->photosPerPage, $offset);
    }

    public function getTotalPages() {
        $totalPhotos = $this->photoModel->getTotalPhotos();
        return ceil($totalPhotos / $this->photosPerPage);
    }

    public function getPhotoById($id) {
        return $this->photoModel->getPhotoById($id);
    }
}
?> 