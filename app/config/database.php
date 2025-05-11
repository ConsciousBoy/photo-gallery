<?php

class Database {
    private static $instance = null;
    private $connection;
    private $host;
    private $db_name;
    private $username;
    private $password;
    
    private function __construct() {
        // Load configuration from config.php
        require_once __DIR__ . '/config.php';
        
        $this->host = DB_HOST;
        $this->db_name = DB_NAME;
        $this->username = DB_USER;
        $this->password = DB_PASS;

        try {
            $this->connection = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                $this->username,
                $this->password
            );
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            die("Connection Error: " . $e->getMessage());
        }
    }
    // Get the single instance of the database connection
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    // Get the database connection
    public function getConnection() {
        return $this->connection;
    }

    // Prepare a query
    public function prepare($query) {
        if ($this->connection === null) {
            throw new Exception("Database connection not established");
        }
        return $this->connection->prepare($query);
    }

    // Query the database           
    public function query($query) {
        if ($this->connection === null) {
            throw new Exception("Database connection not established");
        }
        return $this->connection->query($query);
    }
}
?> 