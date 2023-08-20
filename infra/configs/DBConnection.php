<?php
class DBConnection {
    private static $instance = null;
    private $connection;

    private function __construct() {
        $this->connection = new mysqli('localhost', 'root', '');

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }

        $createDbQuery = "CREATE DATABASE IF NOT EXISTS farmnote";
        if ($this->connection->query($createDbQuery) !== true) {
            die("Error creating database: " . $this->connection->error);
        }

        $this->connection->select_db('farmnote');

        if ($this->connection->connect_error) {
            die("Error selecting database: " . $this->connection->connect_error);
        }
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new DBConnection();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }

    public function closeConnection() {
        if ($this->connection) {
            $this->connection->close();
        }
    }
}


?>