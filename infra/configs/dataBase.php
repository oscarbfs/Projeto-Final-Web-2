<?php
class DatabaseConnection {
    private static $instance = null;
    private $conn;

    private function __construct() {
        $this->conn = new mysqli('localhost:3306', 'root', '', 'farmnote');
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new DatabaseConnection();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->conn;
    }
}

?>