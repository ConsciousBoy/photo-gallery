<?php
require_once __DIR__ . '/../config/database.php';

class PhotoModel {
    private $db;
    private $imageDir;

    public function __construct() {
        $this->db = Database::getInstance();
        $this->imageDir = __DIR__ . '/../public/images/';
    }

    public function getAllPhotos($limit = null, $offset = null) {
        $query = "SELECT * FROM photos ORDER BY created_at DESC";
        if ($limit !== null) {
            $query .= " LIMIT :limit OFFSET :offset";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
            $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        } else {
            $stmt = $this->db->prepare($query);
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTotalPhotos() {
        $query = "SELECT COUNT(*) as total FROM photos";
        $stmt = $this->db->query($query);
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }

    public function getPhotoById($id) {
        $query = "SELECT * FROM photos WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
} 