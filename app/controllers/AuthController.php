<?php
require_once __DIR__ . '/../models/UserModel.php';

class AuthController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            
            if (empty($username) || empty($password)) {
                return 'Please enter both username and password';
            }
            
            $user = $this->userModel->getUserByUsername($username);
            
            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                header('Location: mainpage.php');
                exit();
            }
            return 'Invalid username or password';
        }
        return null;
    }

    public function logout() {
        unset($_SESSION['user_id']);
        unset($_SESSION['username']);
        header("Location: login.php");
        exit();
    }

    public function register($username, $name, $age, $email, $password) {
        if ($this->userModel->checkUsernameExists($username)) {
            return "username_exists";
        }
        if ($this->userModel->checkEmailExists($email)) {
            return "email_exists";
        }
        return $this->userModel->createUser($username, $name, $age, $email, $password) ? true : false;
    }

    public function updateProfile($userId, $username, $name, $age, $email) {
        if ($this->userModel->checkUsernameExists($username, $userId)) {
            return false;
        }
        if ($this->userModel->checkEmailExists($email, $userId)) {
            return false;
        }
        return $this->userModel->updateUser($userId, $username, $name, $age, $email);
    }

    public function getUserData($userId) {
        $user = $this->userModel->getUserById($userId);
        return $user ?: [
            'id' => 0,
            'username' => '',
            'name' => '',
            'age' => 0,
            'email' => '',
            'created_at' => date('Y-m-d H:i:s')
        ];
    }

    public function changePassword($userId, $currentPassword, $newPassword) {
        $user = $this->userModel->getUserById($userId);
        if ($user && password_verify($currentPassword, $user['password'])) {
            return $this->userModel->updatePassword($userId, $newPassword);
        }
        return false;
    }

    public function checkAuth() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: login.php');
            exit();
        }
    }
} 